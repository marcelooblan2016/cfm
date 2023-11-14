<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Google\Interfaces\GoogleInterface;
use App\Models\User;

class LoadAvailableFoldersController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = User::whereId($request->get('accountId'))->first();
        if (empty($user)) abort(403);

        $accessToken = $user->google_access_token;
        $googleService = app(GoogleInterface::class, [$accessToken]);
        $folders = $googleService->listFiles();
        
        return response()->json($folders, 200);
    }
}
