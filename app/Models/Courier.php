<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{

    protected $guarded = [];
    protected $fillable = ['api_url','api_key','api_secret','status','is_active'];
}