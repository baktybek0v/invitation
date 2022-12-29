<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $table = 'translations';

    protected $guarded = ['id'];

    protected $fillable = [
        'key',
        'ky',
        'ru',
        'en',
    ];

    // Title
    public static function getAll()
    {
        $array = Translation::all()->pluck(app()->getLocale(), 'key');
        return $array;
    }
}
