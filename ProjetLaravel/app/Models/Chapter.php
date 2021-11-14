<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $table = "chapters";
    protected $fillable = ['name','content','formation_id'];

    public function getFormation()
    {
        return $this->belongsTo(Formation::class, 'id', 'formation_id');
    }
}
