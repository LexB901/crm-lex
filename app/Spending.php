<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\project;

class Spending extends Model
{
    protected $fillable = ['name', 'date', 'project', 'currency', 'note', 'file', 'type'];
    protected $with = ['projects'];
    public function projects()
    {
        return $this->belongsTo(Project::class, 'project');
    }
}
