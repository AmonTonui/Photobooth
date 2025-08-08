<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach ([
            ['name'=>env('ADMIN1_NAME','Yahya'),'email'=>env('ADMIN1_EMAIL'),'password'=>env('ADMIN1_PASSWORD')],
            ['name'=>env('ADMIN2_NAME','Maintainer'),'email'=>env('ADMIN2_EMAIL'),'password'=>env('ADMIN2_PASSWORD')],
        ] as $adm) {
            if (empty($adm['email']) || empty($adm['password'])) continue;

            $user = User::firstOrCreate(
                ['email' => $adm['email']],
                ['name' => $adm['name'] ?? 'Admin', 'password' => Hash::make($adm['password'])]
            );

            if ($user->role !== 'admin') { $user->role = 'admin'; $user->save(); }
            if (is_null($user->email_verified_at)) { $user->forceFill(['email_verified_at'=>now()])->save(); }
        }
    }
}
