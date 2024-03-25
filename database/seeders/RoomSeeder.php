<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'name' => 'Room A',
                'description' => 'This is Room A',
                'image' => '/images/room-meeting.jpeg',
                'quota' => 10,
            ],
            [
                'name' => 'Room B',
                'description' => 'This is Room B',
                'image' => '/images/room-meeting.jpeg',
                'quota' => 15,
            ],
            [
                'name' => 'Room C',
                'description' => 'This is Room C',
                'image' => '/images/room-meeting.jpeg',
                'quota' => 20,
            ],
            [
                'name' => 'Room D',
                'description' => 'This is Room D',
                'image' => '/images/room-meeting.jpeg',
                'quota' => 12,
            ],
            [
                'name' => 'Room E',
                'description' => 'This is Room E',
                'image' => '/images/room-meeting.jpeg',
                'quota' => 8,
            ],

        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
