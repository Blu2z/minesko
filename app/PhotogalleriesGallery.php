<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PhotogalleriesGallery extends Model
{
    protected $table = 'photogalleries_gallery';

    public function photogallery(){
        return $this->belongsTo('App\Photogallery');
    }

    public function random(){
        return $this->rand()->get();
    }

    public function scopeRand($query)
    {
        return $query->orderBy(DB::raw('RAND()'));
    }
}
