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
        return view('collections.list', ['objects' => $collection->getAll()]);
    }
}
