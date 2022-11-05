<?php

namespace Database\Seeders;

use App\Http\Repositories\UserRepository;
use Illuminate\Database\Seeder;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new UserRepository())->factory([
            'email' =>'admin@example.com'
        ])->admin()->create();
    }
}
