<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name', 'srclang', 'tgtlang', 'gensystem',
    ];

    public function entries(){
    	return $this->hasMany(Entry::class);
    }

    public function latestEntry(){
    	return $this->hasOne(Entry::class)->latest();
    }
}
