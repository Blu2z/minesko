<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionsGallery extends Model
{
    protected $table = 'collections_gallery';

    public function collection(){
        return $this->belongsTo('App\Collection');
    }
}
