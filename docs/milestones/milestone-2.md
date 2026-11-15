# Milestone 2 — Database

## Progress
Created migrations and Eloquent models for roles, countries, titles, genres, people and credits, seasons and episodes, watchlist entries, reviews and viewing history. Seed data includes an administrator, a user, a film and a series with an episode. The pages remain static; CRUD, authorization and database-backed UI are future work.

## Technical Decisions
Titles have many genres and credits; seasons belong to titles and episodes belong to seasons. Users have one watchlist entry and one review per title, and one review per episode. Separate title and episode viewing records allow repeat watches and dated statistics; episode viewing records derive their title through the season. Log a show by its episodes to avoid counting both a show-level viewing and its episodes. Minutes watched is optional and can be used for accurate viewing totals. Rating values are intended to use a 0–10 scale and statuses planned, watching or watched; validation and authorization will be implemented with the UI. Existing Laravel authentication tables remain intact. A null role represents the default regular user until registration assigns a role.

## Challenges
The ERD needed a way to track individual episodes, reviews and repeat views. Separate episode reviews and viewing records keep those relationships clear without ambiguous nullable targets.

## Next Steps
Connect the catalog and tracking screens to the database, implement validation and access control, assign roles during registration, and build statistics from viewing records. Add episode-level UI and review moderation.

## Evidence
- [Database migration](../../database/migrations/2026_01_01_000000_create_cinetrack_tables.php)
- [Eloquent models](../../app/Models/)
- [Sample data seeder](../../database/seeders/DatabaseSeeder.php)
- [Database relationship tests](../../tests/Feature/CatalogDatabaseTest.php)
