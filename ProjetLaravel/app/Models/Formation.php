<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $table = "formations";
    protected $fillable = ['name', 'description', 'picture', 'price'];

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'formation_id', 'id');
    }

}
