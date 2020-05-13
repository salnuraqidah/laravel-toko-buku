@extends('layouts.index')
@section('content')
@php
    $no = 1;
    $ar_judul = ['No','Judul Buku', 'Stok', 'Harga','Jumlah','Action'];
@endphp

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Detail Order Book</h2>
          <ul class="nav navbar-right panel_toolbox">
             <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
          </ul>
                <div class="clearfix"></div>
      </div>
            <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        @if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<a href="{{ route('member.create') }}" class="btn btn-info  btn-user">
  <i class="fa fa-plus"></i>&nbsp;Add User
</a>

<br/><br/>
<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        @foreach ($ar_judul as $judul)
        <th>{{ $judul }}</th>                    
        @endforeach
      </tr>
    </thead>
    <tbody>
      @foreach ($ar_book_order as $beli)
      <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $beli->judul }}</td>
          <td></td>
          <td></td>
          <td>{{$beli->quantity}}</td>
          <td>
            <form method="POST" action="{{ route('bookorder.destroy',$beli->id) }}">
              @csrf
              @method('DELETE')
              <a class="btn btn-info" href="{{ route('bookorder.show',$beli->id) }}"><i class="fa fa-folder"></i></a>&nbsp;
                <a class="btn btn-warning" href="{{ route('bookorder.edit',$beli->id) }}"><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this user permanently')" >
                <i class="fa fa-remove"></i>
              </button>
            </form>
          </td>
        </tr>          
      @endforeach
    </tbody>
  </table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection