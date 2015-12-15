<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Banner;
use App\Service;
use App\Page;
use App\PhotogalleriesGallery;

class MainController extends Controller
{
    public function index(Page $page, PhotogalleriesGallery $photogalleriesGallery, Banner $banner, Service $service)
    {
        $about = $page->geByTitle('about');
        $banners = $banner->getByWeight();
        $services = $service->getOnTop();
        $gallery = $photogalleriesGallery->random();
        return view('index', [
            'banners' => $banners,
            'services' => $services,
            'about' => $about[0],
            'gallery' => $gallery
        ]);
    }
}
