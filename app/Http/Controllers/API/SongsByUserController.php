<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Song;
use App\Models\User;

class SongsByUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $user_id
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $user_id)
    {
        $songs = [];
        $songs_by_user = Song::where('user_id', $user_id)->get();
        $user = User::find($user_id);

        foreach($songs_by_user as $song) {
            array_push($songs, $song);
        }

        return response()->json([
            'artist_id' => $user->id,
            'artist_name' => $user->first_name . ' ' . $user->last_name,
            'songs' => $songs
        ], 200);
    }
}
