<?php

namespace App\Http\Controllers;

use App\Book;
use App\Unit;
use App\Level;
use App\Student;
use App\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BooksController extends Controller
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
        $books = Book::with('user', 'level')->where('users_id', Auth::user()->id)->get();
        $readings = Reading::where('users_id', Auth::user()->id)->get();
        return view('books.index', compact('books', 'readings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $students = Student::where('users_id', $user_id)->get();
        return view('books.create', compact('students'));
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
            'jumlah_halaman' => 'required | numeric | min:1',
            'penulis'=>'required',
            'penerbit'=>'required',
            'tempat_terbit'=>'required',
            'judul_buku' => 'required',
        ]);
        $data = new Book();
        $data->user()->associate(Auth::id());
        $data->kelas_id = $request->kelas_id;
        $data->jumlah_halaman = $request->jumlah_halaman;
        $data->penulis = $request->penulis;
        $data->penerbit = $request->penerbit;
        $data->tempat_terbit = $request->tempat_terbit;
        $data->judul_buku = $request->judul_buku;
        if ($data->save()) {
            toastr()->success('Data has been saved successfully!');
            return redirect('books');
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
        $books = Book::findOrFail($id);
        return view('books.edit', compact('books'));
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
            'jumlah_halaman' => 'required | numeric',
            'judul_buku' => 'required',
            'penulis'=>'required',
            'penerbit'=>'required',
            'tempat_terbit'=>'required',
        ]);
        $updateBooks = Book::findOrFail($id)->update($request->all());
        if ($updateBooks) {
            toastr()->success('Data has been update successfully!');
            return redirect('books');
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
        $deleteBooks = Book::findOrFail($id)->delete();
        if ($deleteBooks) {
            toastr()->success('Data has been delete successfully!');
            return redirect('books');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }
}
