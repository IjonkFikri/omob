<?php

namespace App\Http\Controllers;

use App\User;
use App\Unit;
use App\Level;
use App\Student;
use DB;
// use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $students = Student::with('user', 'level')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        $levels = Level::all();
        $users = User::where('role', 3)->get();
        return view('students.create', compact('units', 'levels', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'users_id' => 'required|not_in:0',
            'kelas_id' => 'required|not_in:0',
        ]);
        // insert user id kedalam table student 
        $data = new Student();
        $data->kelas_id = $request->kelas_id;
        $data->user()->associate(Auth::id());
        if ($data->save()) {
            toastr()->success('Data has been saved successfully!');
            return redirect('students');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $units = Unit::all();
        $levels = Level::all();
        $users = User::where('role', 3)->get();
        $students = Student::findOrFail($id);
        return view('students.edit', compact('units', 'levels', 'users', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas_id' => 'required',
        ]);
        $updateStudents = Student::findOrFail($id)->update($request->all());
        if ($updateStudents) {
            toastr()->success('Data has been update successfully!');
            return redirect('students');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku    = Book::whereIn('users_id',$student->pluck('users_id'))
                        ->whereIn('kelas_id',$student->pluck('kelas_id'));
                        $buku->delete();
        $reading = Reading::whereIn('users_id',$student->pluck('users_id'))
                        ->whereIn('kelas_id',$student->pluck('kelas_id'));
                        $reading->delete();
        $deleteStudent = Student::findOrFail($id)->delete();
        if ($deleteStudent) {
            toastr()->success('Data has been delete successfully!');
            return redirect('students');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }

    public function countStudents(){
        $data  = DB::table('levels')
        ->join('units','units.id','=','levels.units_id')
        ->join('students','students.kelas_id','=','levels.id')
        ->where('units.id',2)
        ->get();
        dd($data->count());
    }
}
