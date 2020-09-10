<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
// use App\Unit;
use App\Level;
use App\Student;
use App\Reading;
use App\Review;
use Illuminate\Support\Facades\Auth;
// use Auth;
use Illuminate\Http\Request;

class ReadingsController extends Controller
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
        // $tb = Reading::select('total_baca')->get()->last();
        $books = Book::with('user', 'level', 'student')->where('users_id', Auth::user()->id)->paginate(10);
        $readings = Reading::where('users_id', Auth::user()->id)->get();
        $review = Review::all();
        return view('readings.index', compact('books', 'readings','review'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $books = Book::with('user', 'level')->where('users_id', Auth::user()->id)->where('id', $id)->get();
        $readings = Reading::where('users_id', Auth::user()->id)->get();
        // $end = Reading::select('end')->get()->last();
        return view('readings.create', compact('books', 'readings'));
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
            'kelas_id' => 'required',
            'books_id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'status' => '',
        ]);
        $addRiwayat = new Reading();
        $update = new Book();
        $addRiwayat->user()->associate(Auth::id());
        $addRiwayat->kelas_id = $request->kelas_id;
        $addRiwayat->books_id = $request->books_id;
        $addRiwayat->start = $request->start;
        $addRiwayat->end = $request->end;
        $thb = $request->jhb;
        if($addRiwayat->start == 1){
            $addRiwayat->total_baca = ($request->end - $request->start) + 1;
        }else{
            $addRiwayat->total_baca = $request->end - $request->start;
        }
       
        $update->status = $request->status;
        if ($addRiwayat->save()) {
            $update = Book::where('id',  $addRiwayat->books_id)
                ->update(['status' => $update->status]);
            toastr()->success('Data has been saved successfully!');
            return redirect('readings');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }
    // tambah kelas 
    public function tambahKelas(Request $request)
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
            return redirect('/home');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }
    /**<h6>Example heading <span class="badge badge-secondary">New</span></h6>
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $readings = Reading::where('books_id', $id)->where('users_id', Auth::user()->id)->get();
        return view('readings.show', compact('readings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Reading::find($id)->delete()) {
            toastr()->success('Data has been deleted successfully!');
            return back();
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }

    //  add review ()
    public function saveReview(Request $request){
        $request->validate([
            'books_id'=> '',
            'sinopsis'=>'required',
            'kelebihan'=>'required',
            'kekurangan'=>'required',
            'kesimpulan'=>'required',
        ]);

            if (Review::create($request->all())) {
                toastr()->success('Data has been saved successfully!');
                return redirect('readings');
            }
            toastr()->error('An error has occurred please try again later.');
            return back();
        
        // dd($request->all());
       
    }
}