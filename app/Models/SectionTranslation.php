<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionTranslation extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'full_text'];
    protected $fillable = ['name'];
    public $timestamps = false; // To disable timestamps cause we don't have it in this table [not needed].
}
