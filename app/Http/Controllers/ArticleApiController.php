<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Article;
use App\ArticleOutputDTO;

class ArticleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return response()->json($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article;
        $email = $request->input('email');
        $password = $request->input('password');

        if($article) {
            if(Auth::once(['email' => $email, 'password' => $password])) {
                if(Auth::user()->can('create', $article)) {
                    $article->title = $request->title;
                    $article->content = $request->content;
                    Auth::user()->articles()->save($article);

                    $dto = ArticleOutputDTO::fromArticle($article);
                    return $this->responseCreated($dto);
                } else {
                    return $this->responseForbidden();
                }
            } else {
                return $this->responseUnauthorized();
            }
        } else {
            return $this->responseNotFound();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        if($article) {
            return response()->json($article);
        } else {
            return response()->json($article, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $email = $request->input('email');
        $password = $request->input('password');

        if($article) {
            if(Auth::once(['email' => $email, 'password' => $password])) {
                if(Auth::user()->can('update', $article)) {
                    $article->title = $request->title;
                    $article->content = $request->content;
                    $article->save();

                    $dto = ArticleOutputDTO::fromArticle($article);
                    return $this->responseOk($dto);
                } else {
                    return $this->responseForbidden();
                }
            } else {
                return $this->responseUnauthorized();
            }
        } else {
            return $this->responseNotFound();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $article = Article::find($id);
        $email = $request->input('email');
        $password = $request->input('password');

        if($article) {
            if(Auth::once(['email' => $email, 'password' => $password])) {
                if(Auth::user()->can('delete', $article)) {

                    Storage::delete(ArticleImage::getImagesLocalPaths($article));
                    $article->delete();

                    return $this->responseOk();
                } else {
                    return $this->responseForbidden();
                }
            } else {
                return $this->responseUnauthorized();
            }
        } else {
            return $this->responseNotFound();
        }
    }

    private function responseOk($returnValue = []) {
        return response()->json((object)$returnValue);
    }

    private function responseCreated($returnValue) {
        return response()->json((object)$returnValue, 201);
    }

    private function responseForbidden() {
        return response()->json((object)[], 403);
    }

    private function responseUnauthorized() {
        return response()->json((object)[], 401);
    }

    private function responseNotFound() {
        return response()->json((object)[], 404);
    }
}
