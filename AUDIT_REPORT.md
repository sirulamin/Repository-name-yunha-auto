# Yunha Auto - Full Project Audit

## Scope

The review covered application structure, routes, controllers, models, migrations, authentication, authorization, customer pages, admin pages, payment/reservation flow, uploads, configuration, tests, and production readiness.

## Findings addressed

### Critical / high impact

1. **Duplicate customer reservation routes**
   - The same reservation endpoints existed in multiple middleware groups.
   - Consolidated into one customer route group.

2. **Customer/admin separation**
   - Customer routes were previously protected only by `auth`.
   - Added `customer` middleware so admin accounts do not accidentally operate customer workflows.

3. **Admin resource routes without corresponding views**
   - Admin car and brand resources exposed `show` routes although the corresponding view was not present.
   - Resource routes now expose only implemented actions.

4. **Test drive status mismatch**
   - Database uses lowercase `pending`, `approved`, `completed`, `cancelled`, while controllers/admin UI used uppercase and even `Rejected`.
   - Controller and views now use the database values consistently.

5. **Payment was automatically marked Paid**
   - Customer payment creation previously stored `Paid` immediately.
   - It now creates a `Pending` payment; an admin must verify it before the status becomes `Paid`.

6. **Reservation double-booking risk**
   - Reservation creation now locks the car row inside a database transaction and rejects another active reservation for the same unit.
   - Reservation status changes also synchronize the car status.

7. **Mass-assignment hardening for user roles**
   - `role` was removed from the user model's `$fillable` list.
   - Registration remains customer-only.

### Medium impact

8. **Business validation**
   - Added validation for phone numbers, year, price, mileage, image count, image type/size, and query filters.
   - Test drive date/time is checked against the current time.
   - Test drive slot collisions are rejected.

9. **Image cleanup**
   - Deleting a car now also removes its stored images from the public disk.

10. **Brand deletion safety**
    - A brand with existing cars can no longer be deleted through the admin controller.

11. **Operational indexes**
    - Added indexes for car status/brand/price, test-drive scheduling, reservations, and payment lookup.
    - Payment `reservation_id` is unique to match the one-to-one model relationship.

12. **Customer UI consistency**
    - Repeated page-level `YUNHA AUTO` headers were removed.
    - Customer pages use the global navigation.
    - Wishlist was converted to the shared customer layout.
    - Navigation is responsive on mobile.

13. **Profile data**
    - Customer profile can now update phone number.
    - Registration accepts an optional phone number.

14. **Error pages**
    - Basic branded 403/404/409/419/429/500 pages were added.

15. **Admin payments**
    - Added an admin payment list and status-verification workflow.

16. **Testing**
    - Added feature tests covering admin/customer separation, reservation ownership, test-drive status, and payment status.

## Remaining production blockers

1. **Laravel version**
   - The project is still based on Laravel 10.
   - Laravel 10 security support ended February 4, 2025.
   - Upgrade to a supported Laravel release is required before production deployment.

2. **PHP runtime**
   - The development baseline is PHP 8.1.
   - Laravel 13 requires PHP 8.3+.
   - Upgrade PHP as part of the framework upgrade.

3. **Real payment integration**
   - The current payment workflow is an internal verification workflow, not a real payment gateway.
   - A real gateway such as the company's selected provider must be integrated and verified before treating a payment as externally settled.

4. **Infrastructure**
   - Production HTTPS, web-server configuration, backups, monitoring, mail delivery, queue workers, and secret management still need to be configured for the actual company environment.

## Validation performed

- PHP syntax lint: passed for application PHP, routes, migrations, and tests.
- Blade source compilation: passed using Laravel's Blade compiler.
- Route registration: 62 routes loaded without duplicate route names during static bootstrap validation.
- Full PHPUnit execution could not be completed in the audit container because PHP extensions `dom`, `mbstring`, and `xmlwriter` are unavailable there.
