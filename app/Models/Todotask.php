<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todotask extends Model
{
    use HasFactory;

    protected $fillable = ['content'];

    public static $rules = array(
        'content' => ['required', 'digits:20'],
    );
}
