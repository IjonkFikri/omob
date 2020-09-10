@extends('layouts.app')
@section('title','Data User')
@section('content')
<div class="alert alert-info top-border mt-4" role="alert">
    <label class="t-md mt-2">@yield('title')</label>   
    <div class="float-right">
        <a href="{{route('users.create')}}" class="font-weight-bold mt-2"><i class="fas fa-plus-circle text-info"></i> Tambah</a>
        <!-- Button trigger modal -->
        <a href="#" class="font-weight-bold text-success" data-toggle="modal" data-target="#importExcel">
            <i class="fas fa-file-import text-success"></i> Import Data
        </a>
    </div>
    
    
    <!-- Modal -->
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form method="post" action="{{url('/importUser')}}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    <p> <i class="fas fa-file-download text-info"></i> <a href="/download/importuser.xlsx">Download Format Import</a></p>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<table class="table table-striped my-2" id="data">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Nis / Nip</th>
            <th> <i class="fas fa-key text-light"></i> User Akses</th>
            <th><i class="fas fa-tools text-light"></i> Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td style="width:20%;">{{$user->name}}</td>
            <td>{{$user->nis}}</td>
            <td>
                @foreach ($roles->where('id',$user->role) as $role)
                    {{$role->nama_role}}
                @endforeach
            </td>
            <td style="width:12%">
                <form action="{{route('users.destroy',$user->id)}}" method="post"
                    onsubmit="return confirm('Do you want to delete this user?');">
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-info"><i class="fas fa-edit text-light"></i></a>
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt text-light"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
