<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    public function index(News $news)
    {
        $objects = $news->getObjects();
        return view('news.list', ['objects' => $objects]);
    }

    public function show(News $news, $alias)
    {
        $one_news = $news->geByAlias($alias);
        return $one_news->count() ? view('news.show', ['object' => $one_news[0]]) : view('404');
    }
}
