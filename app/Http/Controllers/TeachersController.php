<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use App\Unit;
use App\Level;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::with('user', 'level')->paginate(25);
        // dd($teachers);
        return view('teachers.index', compact('teachers'));
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
        $users = User::Where('role', 2)->get();
        return view('teachers.create', compact('units', 'levels', 'users'));
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
            'users_id' => 'required|not_in:0',
            'kelas_id' => 'required|not_in:0',
        ]);
        $teachers = Teacher::create($request->all());
        if ($teachers) {
            toastr()->success('Data has been saved successfully!');
            return redirect('teachers');
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
        $users = User::where('role', 2)->get();
        $teachers = Teacher::findOrFail($id);
        return view('teachers.edit', compact('units', 'levels', 'users', 'teachers'));
        // dd($teachers);
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
        $updateTeachers = Teacher::findOrFail($id)->update($request->all());
        if ($updateTeachers) {
            toastr()->success('Data has been update successfully!');
            return redirect('teachers');
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
        $deleteTeachers = Teacher::findOrFail($id)->delete();
        if ($deleteTeachers) {
            toastr()->success('Data has been delete successfully!');
            return redirect('teachers');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }
}
