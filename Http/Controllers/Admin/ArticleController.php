<?php

namespace Modules\Vueasgard\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Vueasgard\Entities\Article;
use Modules\Vueasgard\Http\Requests\CreateArticleRequest;
use Modules\Vueasgard\Http\Requests\UpdateArticleRequest;
use Modules\Vueasgard\Repositories\ArticleRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ArticleController extends AdminBaseController
{
    /**
     * @var ArticleRepository
     */
    private $article;

    public function __construct(ArticleRepository $article)
    {
        parent::__construct();

        $this->article = $article;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$articles = $this->article->all();

        return view('vueasgard::admin.articles.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('vueasgard::admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateArticleRequest $request
     * @return Response
     */
    public function store(CreateArticleRequest $request)
    {
        $this->article->create($request->all());

        return redirect()->route('admin.vueasgard.article.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('vueasgard::articles.title.articles')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        return view('vueasgard::admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Article $article
     * @param  UpdateArticleRequest $request
     * @return Response
     */
    public function update(Article $article, UpdateArticleRequest $request)
    {
        $this->article->update($article, $request->all());

        return redirect()->route('admin.vueasgard.article.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('vueasgard::articles.title.articles')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        $this->article->destroy($article);

        return redirect()->route('admin.vueasgard.article.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('vueasgard::articles.title.articles')]));
    }
}
