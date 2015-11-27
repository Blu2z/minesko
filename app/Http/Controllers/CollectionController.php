<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Collection;

class CollectionController extends Controller
{
    public function index(Collection $collection)
    {
        return view('collections.list', ['objects' => $collection->getActive()]);
    }

    public function show(Collection $collection, $alias)
    {
        $object = $collection->getByAlias($alias);
        return $object->count() ? view('collections.show', ['object' => $object[0]]) : view('404');
    }
}
