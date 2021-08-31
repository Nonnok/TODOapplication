<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todotask extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'created_at', 'updated_at', 'now'];

    public static $rules = array(
        'content' => 'required|max:20',
    );
    
}
