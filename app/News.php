<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';

    protected $dates = ['deleted_at'];

    protected $fillable = ['alias', 'title', 'keywords', 'description', 'text', 'img', 'alt'];

    protected $hidden = [ 'deleted_at', 'created_at', 'updated_at'];

    protected static $rules = [
        'alias' => 'required|regex:([a-z0-9\-])|unique:news,alias',
        'title'  => 'required|max:255|unique:news,title',
        'keywords' => 'max:100',
        'description' => 'max:150',
        'text' => 'required',
        'img' => 'unique:news,img',
        'alt' => 'max:255',
    ];

    public function validator(array $data)
    {
        return Validator::make($data, self::$rules);
    }

    public function galleries(){
        return $this->hasMany('App\NewsGallery')->get();
    }
    
    public function getObjects() {
        return $this->revers()->paginate(10);
    }

    public function scopeRevers($query){
        $query->orderBy('id', 'desc');
    }
    
    public function geByAlias($alias){
        return $this->where('alias', $alias)->get();
    }
}