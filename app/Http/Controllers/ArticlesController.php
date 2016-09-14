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

  public function create()
  {
    return view('articles.create');
  }

  public function store(Request $request)
  {
    // Validate the request...
    $article = new Article;
    $article->title = $request->title;
    $article->content = $request->content;
    $user = Auth::user();
    $article->author = $user->id;


    $article->save();
  }
}
