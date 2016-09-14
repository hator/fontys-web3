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
