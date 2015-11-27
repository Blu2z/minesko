<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Page extends Model
{
    use SoftDeletes;
    
    protected $table = 'pages';

    protected $dates = ['deleted_at'];

    protected $fillable = ['active', 'title', 'text'];

    protected $hidden = [ 'deleted_at', 'created_at', 'updated_at'];

    protected static $rules = [
        'active' => 'boolean',
        'title'  => 'required|max:100',
        'text'   => 'required',
    ];

    public function validator(array $data)
    {
        return Validator::make($data, self::$rules);
    }
    
    public function geByTitle($title){
        return $this->where('title', $title)->get();
    }
}
