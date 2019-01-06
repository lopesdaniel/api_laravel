<?php

/**
 * @SWG\Swagger(
 *     basePath="/api/",
 *     schemes={"http"},
 *     host="http://localhost:8000",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="API Escola (Teste)",
 *         description="Projeto de API do curso de Laravel do TreinaWeb",
 *         @SWG\Contact(
 *             email="viana.daniel02@gmail.com"
 *         ),
 *     )
 * )
 */

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\Student as StudentResources;
use App\Http\Resources\Students as StudentCollection;

class StudentController extends Controller
{

        /**
     * @SWG\Get(
     *      path="/students",
     *      operationId="getStudentList",
     *      tags={"students"},
     *      summary="Get list of students",
     *      description="Returns list of students",
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @SWG\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of students
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            new StudentCollection(Student::get()), 
            Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        return Student::create($request->all());
    }

    /**
     * @SWG\Get(
     *      path="/students/{id}",
     *      operationId="getStudentById",
     *      tags={"Students"},
     *      summary="Get student information",
     *      description="Returns student data",
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @SWG\Response(response=400, description="Bad request"),
     *      @SWG\Response(response=404, description="Resource Not Found"),
     *      security={
     *         {
     *             "oauth2_security_example": {"write:students", "read:students"}
     *         }
     *     },
     * )
     *
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
    //    return $student;
        return new StudentResources($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        
            $student->update($request->all());
            return [];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
            $student->delete();
            
            return [];
        
    }
}
