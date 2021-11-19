<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Project;
use Resources\Views\Expense\edit;

class Spending extends Model
{
    protected $fillable = ['name', 'date', 'project', 'currency', 'note', 'file', 'type', 'amount', 'status'];
    protected $with = ['projects'];
    public function projects()
    {
        return $this->belongsTo(Project::class, 'project');
    }
}
