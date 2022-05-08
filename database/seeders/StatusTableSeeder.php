<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'status' => 'pending'
            ],
            [
                'status' => 'approved'
            ],
            [
                'status' => 'reject'
            ]
        ];
        DB::table('statuses')->insert($statuses);
    }
}
