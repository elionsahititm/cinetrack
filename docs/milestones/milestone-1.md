# Milestone 1 — Layout & Routing

## Progress
Implemented the initial application skeleton for CineTrack (Movie & TV Show Tracking Platform). Created a custom shared Blade layout with responsive navigation and a dedicated footer. Built two reusable Blade components (`x-card` and `x-button`) used across all primary pages. Configured routing in `routes/web.php` for Discover, Browse, Title Details, Watchlist, Movie Roulette, Movie DNA, User Profile, and Admin Catalog. Functional database persistence, user authentication, and Livewire reactive logic remain incomplete and are planned for upcoming milestones.

## Technical Decisions
Adopted a modern Blade component architecture using `<x-layout>` with content slots (`{{ $slot }}`) to keep page templates lightweight and DRY. Applied Tailwind CSS following the "Physical Film Ledger" light theme (warm paper `#FAF7F2` canvas, terracotta `#A13E0C` accents, and custom typography). Centralized page routing in `routes/web.php` using named routes (`route()`) and highlighted active navigation states dynamically with `request()->routeIs()`.

## Challenges
Encountered confusion regarding the Git and GitHub Classroom workflow—specifically whether to push directly to a personal branch on the cloned starter repository or work within an assigned GitHub Classroom repository.

## Next Steps
Next milestone will focus on database schema design, migrations, factories, seeders (movies, genres, watchlists, reviews), and setting up authentication with role-based access control.

## Evidence
- Shared Blade Layout: `resources/views/components/layout.blade.php`
- Reusable Components: `resources/views/components/card.blade.php`, `resources/views/components/button.blade.php`
- Web Routes: `routes/web.php`
- Application Views: `resources/views/pages/` (`home.blade.php`, `browse.blade.php`, `title-details.blade.php`, `watchlist.blade.php`, `roulette.blade.php`, `dna.blade.php`, `profile.blade.php`, `admin-catalog.blade.php`)
