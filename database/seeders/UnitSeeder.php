<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Units;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Units::create
        (
            [
                'units' => 'Kilometer',
            ],
        );
        Units::create
        (
            [
                'units' => 'Meter',
            ],
        );
        Units::create
        (
            [
                'units' => 'Pieces',
            ],
        );
    }
}
