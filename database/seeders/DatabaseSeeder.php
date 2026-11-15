<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Episode;
use App\Models\EpisodeReview;
use App\Models\EpisodeViewing;
use App\Models\Genre;
use App\Models\Person;
use App\Models\Review;
use App\Models\Role;
use App\Models\Season;
use App\Models\Title;
use App\Models\TitleCredit;
use App\Models\User;
use App\Models\Viewing;
use App\Models\WatchlistEntry;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $member = Role::create(['name' => 'user']);
        $country = Country::create(['name' => 'United States', 'code' => 'US']);
        $user = User::factory()->create(['name' => 'Test User', 'email' => 'test@example.com']);
        $user->role()->associate($member);
        $user->country()->associate($country);
        $user->save();
        $administrator = User::factory()->create(['name' => 'Admin User', 'email' => 'admin@example.com']);
        $administrator->role()->associate($admin);
        $administrator->save();
        $drama = Genre::create(['name' => 'Drama']);
        $scifi = Genre::create(['name' => 'Science Fiction']);
        $movie = Title::create(['name' => 'Interstellar', 'content_type' => 'movie', 'release_date' => '2014-11-07', 'runtime_minutes' => 169, 'country_id' => $country->id]);
        $show = Title::create(['name' => 'The Expanse', 'content_type' => 'tv', 'release_date' => '2015-12-14', 'country_id' => $country->id]);
        $movie->genres()->attach([$drama->id, $scifi->id]);
        $show->genres()->attach($scifi);
        $person = Person::create(['full_name' => 'Christopher Nolan']);
        TitleCredit::create(['title_id' => $movie->id, 'person_id' => $person->id, 'credit_type' => 'director']);
        $season = Season::create(['title_id' => $show->id, 'season_number' => 1]);
        $episode = Episode::create(['season_id' => $season->id, 'episode_number' => 1, 'name' => 'Dulcinea', 'runtime_minutes' => 43]);
        WatchlistEntry::create(['user_id' => $user->id, 'title_id' => $show->id, 'status' => 'watching', 'started_at' => now()]);
        WatchlistEntry::create(['user_id' => $user->id, 'title_id' => $movie->id, 'status' => 'watched', 'completed_at' => now()]);
        Review::create(['user_id' => $user->id, 'title_id' => $movie->id, 'rating' => 9, 'review_text' => 'An ambitious film.']);
        EpisodeReview::create(['user_id' => $user->id, 'episode_id' => $episode->id, 'rating' => 8, 'review_text' => 'A promising start.']);
        Viewing::create(['user_id' => $user->id, 'title_id' => $movie->id, 'watched_at' => now(), 'minutes_watched' => 169]);
        EpisodeViewing::create(['user_id' => $user->id, 'episode_id' => $episode->id, 'watched_at' => now(), 'minutes_watched' => 43]);
    }
}
