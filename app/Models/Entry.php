<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
    	'task_id', 'imageid', 'x', 'y', 'width', 'height', 'srctext', 'tgttext', 'manualtext',
    ];

    public function task(){
    	return $this->belongsTo(Task::class);
    }

}
