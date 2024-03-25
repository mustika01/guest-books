<?php

namespace Database\Seeders;

use App\Models\GuestBook;
use Illuminate\Database\Seeder;
use App\Models\Room;

class GuestBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'name' => 'User A',
                'phone' => '0812345678910',
                'requirement' => 'Room meeting needed',
                'room' => 'Room A',
            ],
            [
                'name' => 'User B',
                'phone' => '0812345678910',
                'requirement' => 'Room meeting needed',
                'room' => 'Room B',
            ],
            [
                'name' => 'User C',
                'phone' => '0812345678910',
                'requirement' => 'Room meeting needed',
                'room' => 'Room C',
            ],
            [
                'name' => 'User D',
                'phone' => '0812345678910',
                'requirement' => 'Room meeting needed',
                'room' => 'Room D',
            ],
            [
                'name' => 'User E',
                'phone' => '0812345678910',
                'requirement' => 'Room meeting needed',
                'room' => 'Room E',
            ],
            [
                'name' => 'User F',
                'phone' => '0812345678910',
                'requirement' => 'Room meeting needed',
                'room' => 'Room F',
            ],
            [
                'name' => 'User G',
                'phone' => '0812345678910',
                'requirement' => 'Room meeting needed',
                'room' => 'Room E',
            ],
        ];

        foreach ($datas as $data) {
            GuestBook::create($data);
        }
    }
}
