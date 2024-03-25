<?php

namespace App\Http\Controllers;

use App\Models\GuestBook;
use App\Models\Room;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('guestBook', [
            'rooms' => $rooms
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'room' => 'required',
            'requirement' => 'required',
        ]);


        $guestBook = new GuestBook;
        $guestBook->name = $request->name;
        $guestBook->phone = $request->phone;
        $guestBook->room = $request->room;
        $guestBook->requirement = $request->requirement;
        $guestBook->save();

        return response()->json(['success' => true]);
    }

    public function admin()
    {
        $entries = GuestBook::whereDate('created_at', today())->get();
        return view('lists', compact('entries'));
    }
}
