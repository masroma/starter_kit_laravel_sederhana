<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:categories-list|categories-create|categories-edit|categories-delete', ['only' => ['index','show']]);
         $this->middleware('permission:categories-create', ['only' => ['create','store']]);
         $this->middleware('permission:categories-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:categories-delete', ['only' => ['destroy']]);

    }

    public function index()
    {
        echo "category index";
    }

    public function create()
    {
      echo "category create";
    }

    public function store(Request $request)
    {
        echo "category store";

    }

    public function show($id)
    {
        echo "category show";
    }

    public function edit($id)
    {
        echo "category edit";
    }

    public function update(Request $request, $id)
    {
        echo "category update";

    }

    public function destroy($id)
    {
        echo "category delete";
    }

}
