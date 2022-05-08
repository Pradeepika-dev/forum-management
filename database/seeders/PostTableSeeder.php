<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
                'user_id' => 1,
                'status_id' => 1,
                'title' => 'Title1',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed metus ex. Nullam ac pharetra diam, nec tincidunt felis. Donec sit amet mollis ligula, sit amet blandit justo. Curabitur aliquet risus nibh, nec semper metus pretium ac. Duis eu sollicitudin orci. Donec eget orci felis. Nulla facilisis elementum magna, pretium fermentum orci efficitur id. Sed sed commodo mauris. Fusce et nulla vitae ante volutpat auctor. Aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec ipsum erat.'
            ],
            [
                'user_id' => 2,
                'status_id' => 1,
                'title' => 'Title2',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed metus ex. Nullam ac pharetra diam, nec tincidunt felis. Donec sit amet mollis ligula, sit amet blandit justo. Curabitur aliquet risus nibh, nec semper metus pretium ac. Duis eu sollicitudin orci. Donec eget orci felis. Nulla facilisis elementum magna, pretium fermentum orci efficitur id. Sed sed commodo mauris. Fusce et nulla vitae ante volutpat auctor. Aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec ipsum erat.'
            ],
            [
                'user_id' => 2,
                'status_id' => 2,
                'title' => 'Title3',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed metus ex. Nullam ac pharetra diam, nec tincidunt felis. Donec sit amet mollis ligula, sit amet blandit justo. Curabitur aliquet risus nibh, nec semper metus pretium ac. Duis eu sollicitudin orci. Donec eget orci felis. Nulla facilisis elementum magna, pretium fermentum orci efficitur id. Sed sed commodo mauris. Fusce et nulla vitae ante volutpat auctor. Aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec ipsum erat.'
            ],
            [
                'user_id' => 2,
                'status_id' => 3,
                'title' => 'Title4',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed metus ex. Nullam ac pharetra diam, nec tincidunt felis. Donec sit amet mollis ligula, sit amet blandit justo. Curabitur aliquet risus nibh, nec semper metus pretium ac. Duis eu sollicitudin orci. Donec eget orci felis. Nulla facilisis elementum magna, pretium fermentum orci efficitur id. Sed sed commodo mauris. Fusce et nulla vitae ante volutpat auctor. Aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec ipsum erat.'
            ]
        ];
        DB::table('posts')->insert($posts);
    }
}
