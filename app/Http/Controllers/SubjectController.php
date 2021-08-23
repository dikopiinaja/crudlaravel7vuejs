<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        $response = [
            'message' => 'List Subject',
            'data' => $subjects
        ];
        // return response()->json($response, Response::HTTP_OK);
        return $subjects->toJson();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $data = new Subject([
            "name" => $request->name
        ]);

        $data->save();

        return response()->json([
            "data" => $data,
            "message" => "Tambah data berhasil !!!"
        ]);
    }

    public function getSubject($id) // for edit and show
    {
        $subject = \App\Subject::find($id);
 
        return $subject->toJson();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $data = Subject::find($request->id);
        $data->name = $request->name;

        $data->save();
        return response()->json([
            "data" => $data,
            "message" => "Update data berhasil !!!"
        ]);
    }

    public function destroy($id)
    {

        $subject = \App\Subject::find($id);
        if(!empty($subject)){
            $subject->delete();
            $msg = [
                'success' => true,
                'message' => 'Subject deleted successfully!'
            ];
            return response()->json($msg);
        } else {
            $msg = [
                'success' => false,
                'message' => 'Subject deleted failed!'
            ];
            return response()->json($msg);
        }
    }
}
