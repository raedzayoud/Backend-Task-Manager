<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['title', 'description', 'pirority', 'user_id'];
    protected $table = "tasks";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, "category_task");
    }

    public function favoriteUser()
    {
        return $this->belongsToMany(User::class, "favorites");
    }
}
