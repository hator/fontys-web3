<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use Storage;

class Article extends Model
{
    /**
     * Get author of this article
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') 
        {
            $query->where(function ($query) use ($keyword) {
                $query->where("title", "LIKE","%$keyword%")
                    ->orWhere("content", "LIKE", "%$keyword%");
            });
        }
    }

}

class ArticleOutputDTO {
    public $title;
    public $content;
    public $author_id;
    public $updated_at;
    public $created_at;
    public $image_path;

    public static function fromArticle(Article $article)
    {
        $dto = new ArticleOutputDTO;
        $dto->title = $article->title;
        $dto->content = $article->content;
        $dto->author_id = $article->author_id;
        $dto->updated_at = $article->updated_at->format(\DateTime::RFC3339);
        $dto->created_at = $article->created_at->format(\DateTime::RFC3339);
        $dto->image_path = $article->image_path;
        return $dto;
    }
}

class ArticleImage
{
    public static function processAndUpload($article, $file) {
        $img = Image::make($file);
        $img->fit(300, 300, function ($constraint) {
            $constraint->upsize();
        });

        self::addWatermark($img);
        $img->stream('jpg');
        $filepath = self::articleImageFilepath($article, $img, 'jpg');
        Storage::put(self::getLocalPathStr($filepath), $img);

        $img->pixelate(5);
        self::addWatermark($img);
        $img->stream('jpg');
        $filepath_pixelated = self::getPixelatedPath($filepath);
        Storage::put(self::getLocalPathStr($filepath_pixelated), $img);

        $article->image_path = $filepath;
    }

    private static function articleImageFilepath($article, $img, $extension) {
        return 'article/' . sha1($article->id . $img->filesize() . time()) . '.' . $extension;
    }

    private static function addWatermark($img) {
        $img->text('AwesomeCMS', 50, $img->height() - 20, function($font) {
            $font->file(3);
            $font->color('rgba(255, 255, 255, 0.75)');
            $font->align('center');
        });
    }

    public static function getPublicPath(Article $article)
    {
        return 'storage/'.$article->image_path;
    }

    public static function getLocalPath(Article $article)
    {
        return self::getLocalPathStr($article->image_path);
    }

    public static function getImagesLocalPaths(Article $article)
    {
        if($article->image_path)
        {
            return [
                self::getLocalPathStr($article->image_path),
                self::getLocalPathStr(self::getPixelatedPath($article->image_path)),
            ];
        }
        else
        {
            return [];
        }
    }

    private static function getPixelatedPath(string $original)
    {
        return $original . '.pixelated.jpg';
    }

    private static function getLocalPathStr(string $path)
    {
        return 'public/'.$path;
    }
}
