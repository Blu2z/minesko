<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photogallery;

class PhotogalleryController extends Controller
{
    public function index(Photogallery $photogallery)
    {
        return view('photogalleries.list', ['objects' => $photogallery->getAll()]);
    }
}
