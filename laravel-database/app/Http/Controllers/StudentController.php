<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        // echo "tes";
        return response()->json($data, 200);
    }
    public function store(Request $request){
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        $student = Student::create($input);

        $data = ['message' => 'Student is created successfully', 'data' => $student,];

        return response()->json($data, 201);
    }
    public function update(Request $request){
        $student = Student::find(3);

        $student->nama = 'Vicky Prasetyo';

        $student->save();

        $data = ['message' => 'Student is updated successfully', 'data' => $student];

        return response()->json($data, 201);
    }
    public function destroy(){
        $student = Student::find(2);

        $student->delete();

        $data = ['message' => 'Student is deleted successfully', 'data' => $student];

        return response()->json($data, 201);
    }
}
