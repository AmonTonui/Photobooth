<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rows = [
            [
                'name'           => 'Basic',
                'description'    => '2 hours, standard prints',
                'base_price'     => 40000.00,
                'duration_hours' => 2,
            ],
            [
                'name'           => 'Premium',
                'description'    => '3 hours, custom backdrop',
                'base_price'     => 60000.00,
                'duration_hours' => 3,   // ← fixed
            ],
        ];

        foreach ($rows as $r) {
            DB::table('packages')->updateOrInsert(
                ['name' => $r['name']],                          // match on name
                $r + ['updated_at' => now(), 'created_at' => now()] // set/refresh columns
            );
        }
    }
}
