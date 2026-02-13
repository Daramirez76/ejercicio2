<?php
namespace App\Repositories\Interfaces;

Interface SongInterface
{
    public function getAllSongs();
    public function getSongById($id);
    public function createSong(array $data);
    public function updateSong($id, array $data);
    public function deleteSong($id);
}