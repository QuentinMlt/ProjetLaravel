<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationByTypes extends Model
{
    use HasFactory;
    
    protected $table = "formations_types";
    protected $fillable = ['type_id', 'formation_id'];
}
