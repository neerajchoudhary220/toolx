<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class ActionButton extends Model
{
    use HasFactory;

    protected $fillable = ['action_path', 'img', 'action_name'];

    protected function actionName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value)
        );
    }
}
