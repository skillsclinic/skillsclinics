<?php

use App\Session;
use App\Subject;
use App\Tutee;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Subject::truncate();
        Tutee::truncate();
        Session::truncate();

//        $usersQuantity = 200;
        $subjectsQuantity = 20;
//        $tuteesQuantity = 50;
//        $sessionsQuantity = 100;

//        factory(User::class, $usersQuantity)->create();
        factory(Subject::class, $subjectsQuantity)->create();
//        factory(Tutee::class, $tuteesQuantity)->create();
//        factory(Session::class, $sessionsQuantity)->create();
    }
}
