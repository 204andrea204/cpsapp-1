@extends('layouts.admin')
@section('title')
Cek Absensi
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col md-8">
          <div class="table-responsive">
          <table class="table" id="example">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jam Masuk</th>
              <th>Gambar</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $i= 1;
              $cekabsensi = \App\CekAbsensi::all();
              ?>
              @foreach($cekabsensi as $q)
            <tr>
            <th scope="row">{{$i++}}</th>
              <td>{{$q->nama}}</td>
              <td>{{$q->created_at}}</td>
              <td><img src="{{url('uploads/'.$q->foto)}}" style="width: 50%;height: 50%;"></td>
              <td>
                @if(Auth::user()->role == 1)
                 <a href="{{url('cekabsensi/delete/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" 
                 class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
                @elseif(Auth::user()->role == 2)
                <a href="{{url('cekabsensi/delete/'.$q->id)}}" onclick="return confirm('anda yakin untuk menghapusnya ?')" 
                 class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
                @endif
              </td>
          </div>
            </tr>
            @endforeach
          </tbody>
        </table>
          </div>
            <div style="float:right; ">
            <a href="{{ url('form/cekabsensi/pdf')}}">
             <button class="btn btn-outline-primary">Download PDF</button></a>
          </div>
        </div>
        <hr>
      </div>
    </div>
@endsection