<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsGallery extends Model
{
    use SoftDeletes;

    protected $table = 'news_gallery';

    public function news(){
        return $this->belongsTo('App\News');
    }
}
