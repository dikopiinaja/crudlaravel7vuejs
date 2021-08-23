<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::all();

        $response = [
            'message' => 'List Siswa',
            'data' => $students
        ];
        // return response()->json($response, Response::HTTP_OK);
        return $students->toJson();

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = new Student([
            "name" => $request->name
        ]);

        $data->save();

        return response()->json([
            "data" => $data,
            "message" => "Tambah data berhasil !!!"
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $data = Student::find($request->id);
        $data->name = $request->name;

        $data->save();
        return response()->json([
            "data" => $data,
            "message" => "Update data berhasil !!!"
        ]);
    }

    public function destroy($id)
    {
        // $data = Student::find($request->id);
        // $data->delete();

        // return response()->json([
        //     "message" => "Hapus data berhasil !!!"
        // ]);
        $student = \App\Student::find($id);
        if(!empty($student)){
            $student->delete();
            $msg = [
                'success' => true,
                'message' => 'Student deleted successfully!'
            ];
            return response()->json($msg);
        } else {
            $msg = [
                'success' => false,
                'message' => 'Student deleted failed!'
            ];
            return response()->json($msg);
        }
    }

    public function getStudent($id) // for edit and show
    {
        $student = \App\Student::find($id);
 
        return $student->toJson();
    }
}
