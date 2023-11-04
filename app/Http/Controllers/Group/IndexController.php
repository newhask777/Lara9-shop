<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $groups = \App\Models\Group::all();
        return view("groups.index", compact("groups"));
    }
  
}
