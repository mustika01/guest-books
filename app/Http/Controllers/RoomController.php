<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $entries = Room::all();
        return view('room.lists', compact('entries'));
    }

    public function create()
    {
        $entries = Room::whereDate('created_at', today())->get();
        return view('room.create', compact('entries'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'quota' => 'required|integer|min:1',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('images', $imageName, 'public');
            $validatedData['image'] = $imagePath;
        }


        $newEntry = Room::create($validatedData);

        return redirect()->route('room')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $entry = Room::findOrFail($id);
        return view('room.edit', compact('entry'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'quota' => 'nullable|integer|min:1',
        ]);

        $entry = Room::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('images', $imageName, 'public');
            $validatedData['image'] = $imagePath;
        }

        $entry->update($validatedData);

        return redirect()->route('room')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $entry = Room::findOrFail($id);
        $entry->delete();
        return redirect()->route('room')->with('success', 'Data berhasil dihapus.');
    }
}
