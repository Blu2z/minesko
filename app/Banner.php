<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Banner extends Model
{
    use SoftDeletes;

    protected $table = 'banners';

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'weight', 'url', 'img'];

    protected $hidden = [ 'deleted_at', 'created_at', 'updated_at'];

    protected static $rules = [
        'title' => 'required|max:255|unique:banners,title',
        'weight' => 'required|integer|unique:banners,weight',
        'url' => 'required|max:255|regex:([a-z0-9])|unique:banners,url',
        'img' => 'required|unique:banners,img',
    ];

    public function validator(array $data)
    {
        return Validator::make($data, self::$rules);
    }
    
    public function getByWeight(){
        return $this->orderBy('weight')->get();
    }
}
