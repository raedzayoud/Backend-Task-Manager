<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    //
    public function addToFavorites($taskId)
    {
        if (Task::find($taskId)) {
            Auth::user()->favoriteTask()->syncWithoutDetaching($taskId);
            return response()->json(["message" => "Favourite added successfully"]);
        }
        return response()->json(["message" => "Favourite failure"]);
    }
    public function removeFromFavorites($taskId)
    {
        if (Task::find($taskId)) {
            Auth::user()->favoriteTask()->detach($taskId);
            return response()->json(["message" => "Favourite remove successfully"]);
        }
        return response()->json(["message" => "Favourite failure"]);
    }
    public function getFavoritesTask() {
        $tasks=Auth::user()->favoriteTask;
        return response()->json($tasks);
    }
}
