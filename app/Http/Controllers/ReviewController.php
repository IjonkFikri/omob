<?php

namespace App\Http\Controllers;
use App\Book;
use App\Review;
use App\Recap;
use App\Unit;
use App\Level;
use App\User;
use DB;
use Auth;
use PDF;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->get('level');
        if (Auth::user()->role == 1) {
               $datas = Level::all();
        }else{
            // get data unit and levels from user recaps
            $datas = DB::table('recaps')
            ->join('users','users.id','=','recaps.users_id')
            ->join('units','units.id','=','recaps.units_id')
            ->join('levels','levels.units_id','=','units.id')
            ->where('recaps.users_id',Auth::user()->id)
            ->select('levels.*')
            ->get();   
        }
        if ($id) {
            $u = Level::find($id);
            $users = DB::table('units')
            ->join('levels','levels.units_id','=','units.id')
            ->join('students','students.kelas_id','=','levels.id')
            ->join('users','users.id','=','students.users_id')
            ->groupBy('users.id')
            ->where('levels.id',$id)
            ->select('students.*','users.*','levels.*')
            ->get();
            // dd($users);
            
        }else{
            $u = "";
            $users = DB::table('units')
            ->join('levels','levels.units_id','=','units.id')
            ->join('students','students.kelas_id','=','levels.id')
            ->join('users','users.id','=','students.users_id')
            ->groupBy('users.id')
            // ->where('levels.id',$id)
            ->select('students.*','users.*','levels.*')
            ->get();
        }
        $books = Book::all();
        $review = Review::all();
        return view('review.index',compact('datas','u','users','books','review'));
    }

    // print  data to pdf 
    public function printPdf($id)
    {
        $print =DB::table('books')
        ->join('review','review.books_id','=','books.id')
        ->join('users','users.id','=','books.users_id')
        ->join('levels','levels.id','=','books.kelas_id')
        ->where('books.id',$id)
        ->select('books.*','review.*','users.*','levels.*')
        ->first();
        // dd($print);
        $judul = "Resensi Buku ".$print->judul_buku.".pdf";
        // return view('review.print',compact('print'));
        $pdf = PDF::loadView('review.print', compact('print'))->setPaper('A4', 'landscape');
        return $pdf->stream($judul);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = explode('-',$id);
       $u = $data[0];
       $l = $data[1];
        $books  = Book::where('users_id',$u)
        ->where('kelas_id',$l)
        ->paginate(5);
        $reviews = Review::with('book')->whereIn('books_id',$books->pluck('id'))
        ->get();
        $users = User::find($u);
        return view('review.show',compact('reviews','users','books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = DB::table('books')
        ->join('review','review.books_id','=','books.id')
        ->where('books.id',$id)
        ->select('books.*','review.*')
        ->first();
        return view('review.edit',compact('books'));
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
            'sinopsis'=> 'required',
            'kelebihan'=>'required',
            'kekurangan'=>'required',
            'kesimpulan'=>'required'
        ]);

        if (Review::where('books_id',$id)->update($request->except(['_token','_method']))) {
            toastr()->success('Data has been updated successfully!');
            return redirect('/home');
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
        //
    }
}
