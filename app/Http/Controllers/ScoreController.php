<?php

namespace App\Http\Controllers;

use App\Score;
use App\Student;
use App\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScoreController extends Controller
{

    public function index()
    {
        // $scores = Score::orderBy('id', 'desc')->get();
        $scores = Score::select([
            'scores.id',
            'student.id as id_student',
            'student.name',
            'subject.id as id_subject',
            'subject.name as name_subject',
            'score'
        ])->leftJoin('student', 'scores.student_id', "=" , 'student.id')
        ->leftJoin('subject', 'scores.subject_id', "=" , 'subject.id')
        ->orderBy('scores.id', 'desc')->get();
        
        
        return view('scores.index', compact('scores'));
    }


    public function create()
    {
        $student = DB::table('student')->get();
        $subject = DB::table('subject')->get();
        return view('scores.create', ['student' => $student, 'subject' => $subject]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'student_id' => 'required',
            'subject_id' => 'required',
            'score' => 'required',
        ]);
        Score::create($request->all());
        return redirect()->route('scores.index')->with('success','Data berhasil di input');
    }

    public function storeapi(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'subject_id' => 'required',
            'score' => 'required'
        ]);

        $data = new Score([
            "student_id" => $request->student_id,
            "subject_id" => $request->subject_id,
            "score" => $request->score,
        ]);

        $data->save();

        return response()->json([
            "data" => $data,
            "message" => "Tambah data berhasil !!!"
        ]);
    }

    public function show(Score $score)
    {
        $scores = Score::select([
            'scores.id',
            'student.id as id_student',
            'student.name',
            'subject.id as id_subject',
            'subject.name as name_subject',
            'score'
        ])->leftJoin('student', 'scores.student_id', "=" , 'student.id')
        ->leftJoin('subject', 'scores.subject_id', "=" , 'subject.id')
        ->orderBy('scores.id', 'desc')->get();

        return view('scores.show',compact('scores'));
    }

    public function edit(Score $score)
    {
        $student = DB::table('student')->get();
        $subject = DB::table('subject')->get();
        return view('scores.edit',['student' => $student, 'subject' => $subject ], compact('score'));
    }

    public function update(Request $request, Score $score)
    {
        $request->validate([
            'student_id' => 'required',
            'subject_id' => 'required',
            'score' => 'required',
        ]);
        $score->update($request->all());
        return redirect()->route('scores.index')->with('success','Scores berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        $score->delete();
        return redirect()->route('scores.index')->with('success','Nilai berhasil dihapus');
    }
}
