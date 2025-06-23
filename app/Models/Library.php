<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;


class Library extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
        'name',
        'class',
        'booktitle',
        'author',
        'date',
        'return_date',
        'teacher',
    ];
}
