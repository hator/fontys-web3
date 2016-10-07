<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use Image;
use Storage;
use App\Http\Requests;
use App\Article;
use PDF;
use View;
use App;

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
        if(Input::file('image')) {
            $article->image_path = $this->processAndUploadImage($article, Input::file('image'));
        }
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
        if(Input::file('image')) {
            $article->image_path = $this->processAndUploadImage($article, Input::file('image'));
        }
        $article->save();

        return redirect()->action('ArticlesController@show', ['id' => $article->id]);
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $this->authorize('delete', $article);

        // TODO delete files

        $article->delete();

        return redirect()->action('ArticlesController@index');
    }

    private function processAndUploadImage($article, $file) {
        $img = Image::make($file);
        $img->fit(300, 300, function ($constraint) {
            $constraint->upsize();
        });

        $this->addWatermark($img);
        $img->stream('jpg');
        $filepath = $this->articleImageFilepath($article, $img, 'jpg');
        Storage::put('public/'.$filepath, $img);

        $img->pixelate(5);
        $this->addWatermark($img);
        $img->stream('jpg');
        $filepath_pixelated = $filepath . '.pixelated.jpg';
        Storage::put('public/'.$filepath_pixelated, $img);

        return 'storage/'.$filepath;
    }

    private function articleImageFilepath($article, $img, $extension) {
        return 'article/' . sha1($article->id . $img->filesize() . time()) . '.' . $extension;
    }

    private function addWatermark($img) {
        $img->text('AwesomeCMS', 50, $img->height() - 20, function($font) {
            $font->file(3);
            $font->color('rgba(255, 255, 255, 0.75)');
            $font->align('center');
        });
    }

    public function download(Request $request)
    {
        $article = Article::find($request->id);
        $pdf = PDF::loadView('articles.download', array('article' => $article));
        return $pdf->download('htmltopdfview.pdf');
    }
}
