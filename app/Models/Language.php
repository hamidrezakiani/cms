<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table = 'languages';

    protected $fillable = [
        'model_id',
        'model_type',
        'title',
        'content',
        'lang',
    ];


    public function languageable()
    {
        return $this->morphTo('model');
    }
}
