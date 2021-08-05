<?php

namespace App\Http\Controllers;

use App\Room;
use App\Http\Requests\RoomStoreRequest;
use App\Http\Requests\RoomUpdateRequest;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms', [
            'rooms' => $rooms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\RoomStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomStoreRequest $request)
    {
        $data = $request->only( 'name', 'active', 'qty');

        $data["slug"] = str_slug($data["name"]);

        try {
            Room::create($data);
        } catch (\Exception $e) {
            return redirect()->route('rooms')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }
        return redirect()->route('rooms')->with('success', 'Operazione completata con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $room_id
     * @return \Illuminate\Http\Response
     */
    public function show($room_id)
    {
        $room = Room::find($room_id);
        return view("room", [
            "room" => $room,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\RoomUpdateRequest $request
     * @param  int  $room_id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomUpdateRequest $request, $room_id)
    {
        $data = $request->only('name', 'active', 'qty');

        try {
            Room::find($room_id)->update($data);
        } catch (\Exception $e) {
            return redirect()->route('rooms')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('rooms')->with('success', 'Operazione completata con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $room_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($room_id)
    {
        $room = Room::find($room_id);
        if (empty($room)) {
            return redirect()->route('rooms')->with('error', 'Hotel non esiste');
        }

        try {
            $room->delete();
        } catch (\Exception $e) {
            return redirect()->route('rooms')->with('error', 'Qualcosa è andato storto:' . $e->getMessage());
        }

        return redirect()->route('rooms')->with('success', 'Operazione completata con successo');
    }
}
