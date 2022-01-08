<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Course;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $res = $category->save();

        if($res){
            return response()->json(['message' => 'Datos Guardado']);
        } else {
            return response()->json(['message' => 'Datos No Guardado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $res = $category->save();

        if ($res) {
            return response()->json($category);
        } else {
            return response()->json(['message' => 'Dato no actualizado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
/*     public function destroy(Category $category)
    {

        //$course = Course::where('category_id', $category->id)->get();
        $category->id->course()->dissociate();

        return $category->delete();



        if ($res) {
            return response()->json(['message' => 'Categoria eliminada']);
        } else {
            return response()->json(['message' => 'La Categoria no se pudo eliminada']);
        }

    } */
}
