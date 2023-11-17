<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request){

    $students = Student::all();

    // Query Parameter
    $nama = $request->query('nama');
    $major = $request->query('major');
    $sort = $request->query('sort');
    $order = $request->query('order');

    if ($nama) {
        $students = Student::where('nama', 'like', '%'.$nama.'%')
        ->get();
    } else if ($major) {
        $students = Student::where('jurusan', 'like', '%'.$major.'%')
        ->get();
    }
    else {
        $students;
    }

    if ($sort){
        $students = Student::orderBy($sort, $order ?? 'asc')->get();
    } else {
        $students;
    }

    if ($students) {
        $data = [
            'message' => 'Get data successfully',
            'data' => $students
        ];

    return response()->json($data, 200);
    }
    else {
        $data = [
            'message' => 'No students found'
      ];
    return response()->json($data, 404);
    }

        // $students = Student::all();

        // if ($students) {
        //     $data = [
        //         'message' => 'Get all students',
        //         'data' => $students
        //     ];

        //     return response()->json($data, 200);
        // }
        // else {
        //     $data = [
        //         'message' => 'No students found'
        //     ];
        //     return response()->json($data, 404);
        // }
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'numeric|required',
            'email' => 'email|required',
            'jurusan' => 'required',
        ]);

        if ($validatedData) {

            $student = Student::create($validatedData);

            $data = ['message' => 'Student is created successfully', 'data' => $student,];

            return response()->json($data, 201);
        }
    }
    public function update(Request $request, $id){
        $student = Student::find($id);

        if ($student) {
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan,
            ];

        $student->update($input);

        $data = ['message' => 'Student is updated', 'data' => $student];

        return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Student not found',
            ];
            return response()->json($data, 404);
        }
    }
    public function destroy($id){
        $student = Student::find($id);

        if ($student) {

        $student->delete();

        $data = ['message' => 'Student is deleted'];

        return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Student not found',
            ];
            return response()->json($data, 404);
        }
    }
    public function getById($id){
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Student found',
                'data' => $student
            ];


            return response()->json($data, 200);
        }
        else {
            $data = ['message' => 'Student not found'];
            return response()->json($data, 404);
        }

    }
}
