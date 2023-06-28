<?php

use Illuminate\Database\Seeder;
use App\User;
// use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $token = Str::random(60);
        $token = '538UzO206268r059e707Ni0IU59e7W2X23eT4ru9T200hs3222b3Y3Jqs21U';
        User::insert([
            'name' => 'Aeternum Vale'
            , 'email' => 'crosalesc@gmail.com'
            , 'password' => bcrypt('123456789')
            , 'api_token' => hash('sha256', $token)
            , 'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            , 'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
        ]);
    }
}

