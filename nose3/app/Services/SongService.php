<?php
namespace App\Services;
use App\Repositories\Interfaces\SongInterface;

class SongService
{
    protected $songRepository;

    public function __construct(SongInterface $songRepository)
    {
        $this->songRepository = $songRepository;
    }

    public function getAllSongs()
    {
        return $this->songRepository->getAllSongs();
    }

    public function getSongById($id)
    {
        return $this->songRepository->getSongById($id);
    }

    public function createSong(array $data)
    {
        return $this->songRepository->createSong($data);
    }

    public function updateSong($id, array $data)
    {
        return $this->songRepository->updateSong($id, $data);
    }

    public function deleteSong($id)
    {
        return $this->songRepository->deleteSong($id);
    }
}




