<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Photogallery extends Model
{
    use SoftDeletes;

    protected $table = 'photogalleries';

    protected $dates = ['deleted_at'];

    protected $fillable = ['active', 'alias', 'title', 'keywords', 'description', 'img', 'alt'];

    protected $hidden = [ 'deleted_at', 'created_at', 'updated_at'];

    protected static $rules = [
        'active' => 'boolean',
        'alias' => 'required|max:255|regex:([a-z0-9\-])|unique:photogalleries,alias',
        'title'  => 'required|max:255|unique:photogalleries,title',
        'keywords' => 'max:100',
        'description' => 'max:150',
        'img' => 'unique:photogalleries,img',
        'alt' => 'max:255',
    ];

    public function validator(array $data)
    {
        return Validator::make($data, self::$rules);
    }

    public function galleries(){
        return $this->hasMany('App\PhotogalleriesGallery')->get();
    }
    
    public function getAll() {
        return $this->revers()->get();
    }

    public function scopeRevers($query){
        $query->orderBy('id', 'desc');
    }
}
