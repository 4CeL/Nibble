<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    // 1. Menentukan nama tabel 
    protected $table = 'testimonials';

    // 2. Mass Assignment 
    protected $fillable = [
        'name',
        'text',
        'year',
    ];
}