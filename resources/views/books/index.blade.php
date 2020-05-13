@extends('layouts.index')
@section('content')
@php
    $no = 1;
    $ar_judul = ['No','Judul', 'Pengarang',
    'Penerbit','Kategori','Cover','Action'];
@endphp

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>List Book</h2>
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
@if (Auth::user()->roles == 'ADMIN')
<a href="{{ route('books.create') }}" class="btn btn-info  btn-user">
  <i class="fa fa-plus"></i>&nbsp;Add Book
</a>
@endif
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
      @foreach ($ar_books as $book)
      <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $book->title }}</td>
          <td>{{ $book->author }}</td>
          <td>{{ $book->publisher }}</td>
          <td>{{ $book->catag }}</td>
          @if (!empty($book->cover))
          <td><img src="{{ asset('images/book')}}/{{ $book->cover }}" width="70px"/></td>
          @else
          <td><img src="{{ asset('images')}}/no_cover.jpeg" width="70px"/></td>
          @endif

          <td>
            <form method="POST" action="{{ route('books.destroy',$book->id) }}">
              @csrf
              @method('DELETE')
              <a class="btn btn-info" href="{{ route('books.show',$book->id) }}"><i class="fa fa-info"></i></a>&nbsp;
              @if (Auth::user()->roles == 'ADMIN')
                <a class="btn btn-warning" href="{{ route('books.edit',$book->id) }}"><i class="fa fa-pencil-square-o"></i></a>&nbsp;
                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this user permanently')" >
                <i class="fa fa-remove"></i>
                @endif
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