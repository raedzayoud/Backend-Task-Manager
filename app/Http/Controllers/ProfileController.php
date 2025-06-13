<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileTaskRequest;
use App\Http\Requests\UpdateProfileTaskRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function show($id){
    $profile = Profile::where("user_id", $id)->first();
    return response()->json($profile);
    }
    public function store(ProfileTaskRequest $profileTaskRequest)
    {
        $userId=Auth::user()->id;
        $validated= $profileTaskRequest->validated();
        $validated['user_id']=$userId;
        if($profileTaskRequest->hasFile('image')){
          $path=$profileTaskRequest->file('image')->store('myPhoto','public');
          $validated['image']=$path;
        }
        $profile = Profile::create($validated);
        return response()->json([
            'message' => 'Profile created successfully',
            'profile' => $profile
        ]);
    }

    public function update(UpdateProfileTaskRequest $profileTaskRequest,$id){
        $profile=Profile::where("user_id",$id)->first();
        $profile->update($profileTaskRequest->validated());
        return response()->json([
            "message"=> "Profile updated successfully",
            "profile"=> $profile
        ]);
    }

}
