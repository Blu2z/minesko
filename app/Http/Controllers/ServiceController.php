<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Service;

class ServiceController extends Controller
{
    public function index(Service $service)
    {
        return view('services.list', ['objects' => $service->notOnTop()->toArray()]);
    }

    public function show(Service $service, $alias)
    {
        $object = $service->geByAlias($alias);
        return $object->count() ? view('services.show', ['object' => $object[0]]) : view('404');
    }
}
