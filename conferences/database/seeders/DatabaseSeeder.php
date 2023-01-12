<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\Country;
use App\Models\Type;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        $countries = [
            [
                'name' => 'France'
            ],
            [
                'name' => 'Spain'
            ],
            [
                'name' => 'USA'
            ],
            [
                'name' => 'China'
            ],
            [
                'name' => 'Italy'
            ],
            [
                'name' => 'Mexico'
            ],
            [
                'name' => 'United Kingdom'
            ],
            [
                'name' => 'Japan'
            ],
            [
                'name' => 'Ukraine'
            ],
            [
                'name' => 'Canada'
            ],
            [
                'name' => 'South Korea'
            ],
            [
                'name' => 'Nederland'
            ],
        ];
        $types = [
            [
                'name' => 'listener',
            ],
            [
                'name' => 'announcer',
            ],
            [
                'name' => 'admin',
            ],
        ];
        Country::insert($countries);
        Type::insert($types);
        User::factory(10)->create();
        Conference::factory(20)->create();
    }
}
