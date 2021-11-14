<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationByCategories extends Model
{
    use HasFactory;

    protected $table = "formations_categories";
    protected $fillable = ['category_id', 'formation_id'];
}
