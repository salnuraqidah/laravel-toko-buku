@extends('layouts.index')
@section('content')
@foreach ($data as $rs )
@php
$rs1 = App\Category::all();
@endphp
<span class="section">Edit Data Buku</span>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="user" method="POST" action="{{ route('books.update',$rs->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Buku <span>*</span>
        </label>
        @php $val = ($errors->isEmpty()) ? $rs->title : old('titile'); @endphp
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="title" value="{{ $val }}" class="form-control @error ('title') is-invalid @enderror">
          @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pengarang <span>*</span>
        </label>
        @php $val = ($errors->isEmpty()) ? $rs->author : old('author'); @endphp
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="author" value="{{ $val }}" class="form-control @error ('author') is-invalid @enderror">
          @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      
     
     
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Penerbit <span>*</span>
        </label>
        @php $val = ($errors->isEmpty()) ? $rs->publisher : old('publisher'); @endphp
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="publisher" value="{{ $val }}" class="form-control @error ('publisher') is-invalid @enderror">
          @error('publisher') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Katagori <span>*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <select class="select2_single form-control @error ('category') is-invalid @enderror" name="category" tabindex="-1">
            <option value="">-- Pilih Kategori --</option>
            @foreach($rs1 as $cata)
            @if($errors->isEmpty())
            @php
                $sel = ( $cata['id'] == $rs->categories_id) ? 'selected' : ''
            @endphp
                <option value="{{ $cata['id']}}" {{ $sel }}>{{ $cata['name']}}</option>
            @else
                <option value="{{ $cata['id']}}">{{ $cata['name']}}</option>
            @endif
            @endforeach
          </select>
          @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Harga <span>*</span>
        </label>
        @php $val = ($errors->isEmpty()) ? $rs->price : old('price'); @endphp
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="price" value="{{ $val }}" class="form-control @error ('price') is-invalid @enderror">
          @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Stok <span>*</span>
        </label>
        @php $val = ($errors->isEmpty()) ? $rs->stock : old('stock'); @endphp
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="stock" value="{{ $val }}" class="form-control @error ('stock') is-invalid @enderror">
          @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi <span>*</span>
        </label>
        @php $val = ($errors->isEmpty()) ? $rs->description : old('description'); @endphp
        <div class="col-md-6 col-sm-6 ">
          <textarea class="form-control @error ('description') is-invalid @enderror" name="description" id="" cols="30" rows="10">{{ $val }}</textarea>
          @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="item form-group">
        <label  class="col-form-label col-md-3 col-sm-3 label-align">Cover</label>
        <div class="col-md-6 col-sm-6 ">
          <input type="file"  class="form-control @error ('cover') is-invalid @enderror"  name="cover">
          @error('cover') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

    
<div class="ln_solid">
    <div class="form-group">
      <div class="col-md-6 offset-md-3">
        <button type='submit' class="btn btn-warning" name="proses" value="ubah"><i class="fa fa-pencil-square-o"></i>&nbsp;Edit</button>
</div>
</div>
</div>
</form>
@endforeach
@endsection