<?php

namespace Modules\Task\Infrastructure\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class DeliverySeeder
 * @package Deka\Delivery\Infrastructure\Seeds
 */
class TaskSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        DB::table('task')->delete();
        DB::table('task')->insert([
            [
                'name' => 'Проснуться пораньше',
                'description' => 'Не забыть поставить будильник',
                'status' => 'finished',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Написать CRUD',
                'description' => 'Laravel + Vue',
                'status' => 'finished',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Получить вакансию в Abelohost',
                'description' => '',
                'status' => 'in_work',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Проснуться пораньше',
                'description' => 'Не забыть поставить будильник',
                'status' => 'finished',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Написать CRUD',
                'description' => 'Laravel + Vue',
                'status' => 'finished',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Получить вакансию в Abelohost',
                'description' => '',
                'status' => 'in_work',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
