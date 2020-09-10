<?php

namespace App\Http\Controllers;

use App\Book;
use App\Level;
use App\Reading;
use App\Recap;
use App\Review;
use App\Student;
use App\Teacher;
use App\Unit;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 1) {
            $books = Book::all();
            $readings = Reading::all();
            $students = Student::all();
            $review = Review::all();
            $levels = Level::with('unit')->get();
            return view('dashboard.admin', compact('books', 'readings', 'students', 'levels', 'review'));
        }
        if (Auth::user()->role == 2) {

            $teachers = Teacher::where('users_id', Auth::user()->id)->get();
            $books = Book::all();
            $readings = Reading::all();
            $students = Student::all();
            $review = Review::all();

            if ($teachers->count() == 0) {
                return redirect(404);
            }
            return view('dashboard.teacher', compact('teachers', 'books', 'readings', 'students', 'review'));
        }
        if (Auth::user()->role == 4) {
            $books = Book::all();
            $recaps = Recap::with('unit')->where('users_id', Auth::user()->id)->get();
            $students = Student::all();
            $levels = Level::with('unit')->get();
            $review = Review::all();
            return view('dashboard.recap', compact('recaps', 'books', 'levels', 'students', 'review'));
            // $data = DB::table('recaps')
            // ->join('users','users.id','=','recaps.users_id')
            // ->join('levels','levels.units_id' ,'=','recaps.units_id')
            // ->join ('students','students.kelas_id','=','levels.id')
            // // ->where('levels.units_id','=','recaps.units_id')
            // ->where('recaps.users_id',Auth::user()->id)
            // // ->select('students.*')
            // ->get();
            // dd($data);
        }

        if (Auth::user()->role == 3) {
            $units = Unit::all();
            $levels = Level::all();
            $books = Book::where('users_id', Auth::user()->id)->get();
            $review = Review::with('book')->get();
            $readings = Reading::where('users_id', Auth::user()->id)->get();
            $students = Student::where('users_id', Auth::user()->id)->get();
            return view('dashboard.student', compact('books', 'readings', 'students', 'units', 'levels', 'review'));
        }
    }
}
