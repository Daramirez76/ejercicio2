<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\SongInterface;
use App\Models\Song;

class SongRepository implements SongInterface
{
    public function getAllSongs()
    {
        return Song::all();
    }

    public function getSongById($id)
    {
        return Song::find($id);
    }

    public function createSong(array $data)
    {
        return Song::create($data);
    }

    public function updateSong($id, array $data)
    {
        $song = Song::find($id);
        if ($song) {
            $song->update($data);
            return $song;
        }
        return null;
    }

    public function deleteSong($id)
    {
        $song = Song::find($id);
        if ($song) {
            $song->delete();
            return true;
        }
        return false;
    }
}


