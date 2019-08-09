<?php

namespace Modules\Vueasgard\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Translatable;

    protected $table = 'vueasgard__articles';
    public $translatedAttributes = [];
    protected $fillable = [];
}
