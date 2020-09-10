@extends('layouts.app')
@section('title','Tambah Riwayat')
@section('content')
<div class="card top-border card-sm">
        <div class="my-4 mx-4">
<h4>Tambah Riwayat</h4>

<form action="{{route('readings.store')}}" method="post">
    @foreach ($books as $book)
    @php  $readings = App\Reading::where('books_id',$book->id)->get(); @endphp
    @csrf
   @include('inc/form/_formReadingCreate')
   <input type="hidden" name="status" id="status">
    <div class="form-group my-2">
        <input type="submit" value="Simpan" class="btn btn-info text-light float-right mt-4">
    </div>
    @endforeach
</form>
        </div>
</div>
@endsection
<script>
     function endData(){
        var end = document.getElementById("end").value;
        var jhb = document.getElementById("jhb").value;
        if (end ==jhb) {
            document.getElementById("status").value=1;
        }else{
            document.getElementById("status").value=0;
        }
    }
    
</script>