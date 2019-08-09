<?php

namespace Modules\Vueasgard\Repositories\Cache;

use Modules\Vueasgard\Repositories\ArticleRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheArticleDecorator extends BaseCacheDecorator implements ArticleRepository
{
    public function __construct(ArticleRepository $article)
    {
        parent::__construct();
        $this->entityName = 'vueasgard.articles';
        $this->repository = $article;
    }
}
