<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RoleUser extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id', 'role_id'];
    protected $with = ['user', 'rollen'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function rollen()
    {
        return $this->hasMany(Role::class, 'role');
    }
}
