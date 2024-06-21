<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory,
    Translatable; //**To add translation methods**//
    
    public $translatedAttributes = ['name', 'appointments'];
    protected $fillable = ['email','email_verified_at','password','phone','price','name','appointments'];
    /**
     * Get the doctor's image.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    
}
