<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Suggestie extends Model
{
    protected $fillable = ['suggestietitle', 'suggestie'];
}
