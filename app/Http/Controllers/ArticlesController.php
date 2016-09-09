<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

class ArticlesController extends Controller
{
  /**
   * Display all articles
   *
   * @return Response
   */
  public function index()
  {
    $articles = Article::all();
    return view('articles.index', array('articles' => $articles));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $article = Article::find($id);
      return view('articles.show', array('article' => $article));
  }
}
