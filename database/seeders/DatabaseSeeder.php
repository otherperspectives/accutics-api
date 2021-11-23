<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Input;
use Database\Factories\CampaignFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Campaign::factory()
            ->hasAttached(
                Input::factory()->count(4)
                    ->state(new Sequence(
                        ['type' => 'channel'],
                        ['type' => 'source'],
                        ['type' => 'campaign_name'],
                        ['type' => 'target_url'],
                    ))
            )->count(50)->create();
    }
}
