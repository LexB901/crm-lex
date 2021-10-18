<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Project;

class Spending extends Model
{
    protected $fillable = ['name', 'date', 'project', 'currency', 'note', 'file', 'type', 'amount'];
    protected $with = ['projects'];
    public function projects()
    {
        return $this->belongsTo(Project::class, 'project');
    }
}
