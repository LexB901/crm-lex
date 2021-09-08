<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categorie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Weetje extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['title', 'weetje', 'categorie', 'user_id', 'created_at'];
    protected $with = ['categorien', 'user'];
    public function categorien()
    {
        return $this->belongsTo(Categorie::class, 'categorie');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
