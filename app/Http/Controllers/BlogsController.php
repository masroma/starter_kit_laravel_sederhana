<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:blogs-list|blogs-create|blogs-edit|blogs-delete', ['only' => ['index','show']]);
         $this->middleware('permission:blogs-create', ['only' => ['create','store']]);
         $this->middleware('permission:blogs-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:blogs-delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        echo "blog index";
    }

    public function create()
    {
      echo "blog create";
    }

    public function store(Request $request)
    {
        echo "blog store";

    }

    public function show($id)
    {
        echo "blog show";
    }

    public function edit($id)
    {
        echo "blog edit";
    }

    public function update(Request $request, $id)
    {
        echo "blog update";

    }

    public function destroy($id)
    {
        echo "blog delete";
    }


}
