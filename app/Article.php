<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * Get author of this article
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
}

class ArticleOutputDTO {
    public $title;
    public $content;
    public $author_id;
    public $updated_at;
    public $created_at;
    public $image_path;

    public static function fromArticle(Article $article) {
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
