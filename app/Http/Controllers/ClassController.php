<?php

namespace App\Http\Controllers;
use App\Student;
use App\Level;
use Auth;
use App\Unit;
use App\Book;
use App\Reading;
use DB;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $students = DB::table('students')
       ->join('levels','students.kelas_id','=','levels.id')
       ->join('units','levels.units_id','=','units.id')
       ->where('users_id',Auth::user()->id)
       ->select('students.*','levels.nama_kelas','units.nama_unit')
       ->paginate(5);
        return view('kelas.index',compact('students'));
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
        return view('kelas.create', compact('units', 'levels'));
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
            'kelas_id'=>'required'
        ]);
        $kelas = new Student();
        $kelas->user()->associate(Auth::id());
        $kelas->kelas_id = $request->kelas_id;
        if ($kelas->save()) {
            toastr()->success('Data has been saved successfully!');
            return redirect('kelas');
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
        $students = Student::find($id);
        $units = Unit::all();
        $levels = Level::all();
        return view('kelas.edit',compact('students','units','levels'));
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
        'kelas_id' =>'required'
        ]);
        $updateData = new Student();
        if ($updateData->findOrFail($id)->update($request->all())) {
            toastr()->success('Data has been update successfully!');
            return redirect('kelas');
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
        $student = Student::where('id',$id)->get();
        // dd($student->pluck('users_id'));
        $buku    = Book::whereIn('users_id',$student->pluck('users_id'))->whereIn('kelas_id',$student->pluck('kelas_id'));
        $buku->delete();
        $reading = Reading::whereIn('users_id',$student->pluck('users_id'))->whereIn('kelas_id',$student->pluck('kelas_id'));
        $reading->delete();
        if (Student::findorFail($id)->delete()) {
            toastr()->success('Data has been delete successfully!');
            return redirect('kelas');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }
}
