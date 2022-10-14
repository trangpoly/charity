<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\GiverService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GiverController extends Controller
{
    public $giverService;

    public function __construct(GiverService $giverService)
    {
        $this->giverService = $giverService;
    }

    public function showGiverPosts()
    {
        $userId = Auth::id();
        $posts = $this->giverService->getAllGiverPost($userId);

        return view('client.giver.subscribe-giver', ['posts' => $posts]);
    }
}
