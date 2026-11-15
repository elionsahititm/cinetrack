<?php

use App\Models\Episode;
use App\Models\EpisodeReview;
use App\Models\Title;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('seeds linked catalog, tracking and review data', function () {
    $this->seed();
    $user = User::where('email', 'test@example.com')->firstOrFail();
    $episode = Episode::firstOrFail();
    expect($user->role->name)->toBe('user')
        ->and($user->watchlistEntries)->toHaveCount(2)
        ->and($user->episodeReviews->first()->episode->id)->toBe($episode->id)
        ->and($user->episodeViewings->first()->episode->season->title->name)->toBe('The Expanse')
        ->and(Title::where('name', 'Interstellar')->firstOrFail()->genres)->toHaveCount(2);
});

it('prevents duplicate episode reviews by the same user', function () {
    $this->seed();
    $review = EpisodeReview::firstOrFail();
    EpisodeReview::create(['user_id' => $review->user_id, 'episode_id' => $review->episode_id, 'rating' => 7]);
})->throws(QueryException::class);
