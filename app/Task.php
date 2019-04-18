<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'progress'];

    public function user(){
        $this->belongsTo(User::class);
    }
}
