<?php

namespace App\Models\Models;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    use Translatable; // 2. To add translation methods
    protected $fillable = ['name'];
    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name']; // what we need to translate in the Section model.
}
