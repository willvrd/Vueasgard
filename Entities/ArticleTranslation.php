<?php

namespace Modules\Vueasgard\Entities;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'vueasgard__article_translations';
}
