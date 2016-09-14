<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

  /**
   * Display the article creation form.
   *
   * @return Response
   */
  public function create()
  {
    $this->authorize('create', Article::class);
    return view('articles.create');
  }

  /**
   * Add new article.
   *
   * @param  Request  $request
   * @return Response
   */
  public function store(Request $request)
  {
    $this->authorize('create', Article::class);

    // TODO Validate the request...

    $article = new Article;
    $article->title = $request->title;
    $article->content = $request->content;
    Auth::user()->articles()->save($article);

    return redirect()->action('ArticlesController@show', ['id' => $article->id]);
  }

  public function edit($id)
  {
    $article = Article::find($id);
    $this->authorize('update', $article);

    return view('articles.edit', array('article' => $article));
  }

  public function update(Request $request, $id)
  {
     $article = Article::find($id);
     $this->authorize('update', $article);

     $article->title = $request->title;
     $article->content = $request->content;
     $article->save();

     return redirect()->action('ArticlesController@show', ['id' => $article->id]);
  }

  public function destroy($id)
  {
      $article = Article::find($id);
      $this->authorize('delete', $article);

      $article->delete();

      return redirect()->action('ArticlesController@index');
  }

}
