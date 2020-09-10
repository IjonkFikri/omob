@extends('layouts.app')
@section('title','Export Report')
@section('content')
<div class="card top-border card-sm">
    <div class="my-4 mx-4">
        <h4>Export Data Omomb</h4>
        <form action="export_excel" method="post">
            @csrf
            <div class="form-group">
              <label for="">Data Kelas</label>
              <select class="form-control mr-1" name="kelas_id" id="" style="width:9em;">
                <option value="">Kelas</option>
                @foreach ($units as $unit)
                <optgroup label="{{$unit->nama_unit}}">
                    @foreach ($levels->where('units_id',$unit->id) as $level)
                    <option value="{{$level->id}}" {{old('units_id')==$unit->id ?'selected':''}}>{{$level->nama_kelas}}</option>
                    @endforeach
                </optgroup>
                @endforeach
            </select>
            </div>
           <div class="form-group">
             <label for="">Tanggal</label>
             <div id="reportrange"  class="font-weight-bold" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; font-size:.8em !important;">
                <i class="fa fa-calendar"></i>&nbsp;
                <span></span> <i class="fa fa-caret-down"></i>
            </div>
            <input type="hidden" name="daterange" id="date">
           </div>
          
                <input type="submit" value="Export" class="btn btn-info text-light">
        </form>
    </div>
</div>
@endsection
