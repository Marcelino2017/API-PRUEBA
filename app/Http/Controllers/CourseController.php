<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::all();

        return response()->json($course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        //return  $request->category_id;
        $course = new Course();
        $course->name = $request->name;
        $course->slug = $request->slug;
        $course->descripcion = $request->descripcion;
        $course->category_id  = $request->category_id;
        $res = $course->save();

        if($res){
            return response()->json(['message' => 'Datos Guardado']);
        }
        return response()->json(['message' => 'Datos No Guardado']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $courses, $id)
    {
        $course = $courses->findOrFail($id);
        return response()->json($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $courses, $id)
    {
        $course = $courses->findOrFail($id);

        $course->name = $request->name;
        $course->slug = $request->slug;
        $course->descripcion = $request->descripcion;
        $course->category_id  = $request->category_id;
        $res = $course->save();
        if($res){
            return response()->json($course);
        } else {
            return response()->json(['message' => 'Datos No Guardado']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $courses, $id)
    {
        $course = $courses->findOrFail($id);
        $res = $course->delete();

        if ($res) {
            return response()->json(['message' => 'El Curso Fue Eliminado']);
        } else {
            return response()->json(['message' => 'El Curso  No Pudo ser Elimino']);
        }
    }
}
