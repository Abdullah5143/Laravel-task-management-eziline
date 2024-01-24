<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = ['task_id', 'comment'];
    protected $table = 'feedbacks';

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
