<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionButton extends Model
{
    use HasFactory;

    protected $fillable =['action_path','img','action_name'];
}
