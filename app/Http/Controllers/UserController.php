<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function getprofile($id)
    {
        $profile =  User::find($id)->profile;
        return response()->json($profile);
    }

    public function getusertasks($id){
       $tasks=User::find($id)->tasks;
       return response()->json($tasks);
    }

    public function gettaskbyuserid($iduser){
       $user=Task::find($iduser)->user;
       return response()->json($user);
    }


}
