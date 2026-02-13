<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SongService;

class SongController extends Controller
{
    protected $songService;
    public function __construct(SongService $songService)
    {
        $this->songService = $songService;
    }
    public function index()
    {
        $songs = $this->songService->getAllSongs();
        return response()->json($songs);
    }
    public function show($id)
    {
        $song = $this->songService->getSongById($id);
        if ($song) {
            return response()->json($song);
        } else {
            return response()->json(['message' => 'Song not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'nullable|string',
            'year' => 'required|integer',
        ]);
        $song = $this->songService->createSong($data);
        return response()->json($song, 201);
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'sometimes|required|string',
            'author' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'year' => 'sometimes|required|integer',
        ]);
        $song = $this->songService->updateSong($id, $data);
        if ($song) {
            return response()->json($song);
        } else {
            return response()->json(['message' => 'Song not found'], 404);
        }
    }
    public function destroy($id)
    {
        $deleted = $this->songService->deleteSong($id);
        if ($deleted) {
            return response()->json(['message' => 'Song deleted successfully']);
        } else {
            return response()->json(['message' => 'Song not found'], 404);
        }
    }
}
