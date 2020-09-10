<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use App\Level;
use App\Student;
use App\Reading;
use App\Teacher;
use App\Unit;
use App\Recap;
use App\Review;
use DB;
use App\Exports\ReportOmob;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $teachers = Teacher::all();
        $books    = Book::with('user', 'level')->get();
        $students = Student::with('user', 'level')->get();
        $readings = Reading::all();
        $units = Unit::all();
        $review= Review::all();
        // dd($books);
        return view('reports.index', compact('teachers', 'students', 'books', 'readings', 'units','review'));
    }
    public function detail($id, $kelas)
    {
        $teachers = Teacher::all();
        $students = Student::with('user', 'level')->where('users_id', $id)->where('kelas_id', $kelas)->get();
        $books = Book::with('user', 'level')->where('users_id', $id)->get();
        return view('reports.show', compact('students', 'books', 'teachers'));
    }

    public function store(Request $request)
    {

        
        $date = $request->input('daterange');
        $explodeDate = explode(" / ", $date);
        $d1 = $explodeDate[0];
        $d2 = $explodeDate[1];
        $tanggal = $request->input('tanggal');
        $now = $request->input('tgl_sekarang');
        $kelas = $request->input('kelas_id');
        $teachers = Teacher::where('users_id', Auth::user()->id)->get();
        $books = Book::where('kelas_id',$kelas);
        // query data ranking
        $students = DB::table('students')
        ->join('users','users.id','=','students.users_id')
        ->join('levels','levels.id','=','students.kelas_id')
        ->where('students.kelas_id',$kelas)
        ->get();
        $readings = Reading::with('level')->where('kelas_id', $students->pluck('kelas_id'))
        ->whereBetween('created_at', [$d1, $d2])
            ->groupBy('users_id')->orderByRaw('SUM(total_baca) DESC');
        $review = Review::all();
        return view('reports.ranking', compact('students', 'books', 'teachers','review','readings'));
    }

    // recap controller 
    public function recap()
    {
        $recaps   = Recap::where('users_id', Auth::user()->id)->paginate(10);
        $books    = Book::with('user', 'level')->get();
        $students = Student::with('user', 'level')->get();
        $readings = Reading::all();
        $units = Unit::all();
        $levels = Level::all();
        $review = Review::all();
        return view('reports.recap', compact('recaps', 'students', 'books', 'readings', 'units', 'levels','review'));
    }

    public function adminrecap()
    {
        // $recaps   = Recap::where('users_id', Auth::user()->id)->paginate(10);
        $books    = Book::with('user', 'level')->get();
        $students = Student::with('user', 'level')->get();
        $readings = Reading::all();
        $units = Unit::all();
        $levels = Level::all();
        return view('reports.adminrecap', compact('students', 'books', 'readings', 'units', 'levels'));
    }

    public function export_excel(Request $request)
    {
    //     $date = $request->daterange;
    //     $kelas = $request->kelas_id;
    //     $explodeDate = explode(" / ", $date);
    //     $d1 = $explodeDate[0];
    //     $d2 = $explodeDate[1];
    //    $data = DB::table('recaps')
    //         ->join('users','users.id','=','recaps.users_id')
    //         ->join('levels','levels.units_id' ,'=','recaps.units_id')
    //         ->join ('students','students.kelas_id','=','levels.id')
    //         ->where('students.kelas_id',$kelas)
    //         ->select('students.name')
    //         ->get();
    //         dd($data);
        // dd($request->all());
        // return Excel::download(new ReportOmob($request->daterange, $request->kelas_id), 'Report_OMOB.xls');
     
    }

    public function export()
    {
        $recaps = Recap::where('users_id', Auth::user()->id)->get();
        $units = Unit::all();
        $levels = Level::all();
        return view('recaps.export', compact('recaps', 'levels', 'units'));
    }
}
