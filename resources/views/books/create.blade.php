@extends('layouts.index')
@section('content')
@php
$rs = App\Category::all();
@endphp

<span class="section">Input Data Buku</span>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="user" method="POST" action="{{ route('books.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Buku <span>*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="title" value="{{ old('title') }}" class="form-control @error ('title') is-invalid @enderror">
          @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pengarang <span>*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="author" value="{{ old('author') }}" class="form-control @error ('author') is-invalid @enderror">
          @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Penerbit <span>*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="publisher" value="{{ old('publisher') }}" class="form-control @error ('publisher') is-invalid @enderror">
          @error('publisher') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Kategori <span>*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <select class="select2_single form-control @error ('category') is-invalid @enderror" name="category" tabindex="-1">
            <option value="">-- Pilih Kategori --</option>
            @foreach($rs as $cat)
            @php
                $sel = ( old('category') == $cat['id']) ? 'selected' : ''
            @endphp
                <option value="{{ $cat['id']}}" {{ $sel }}>{{ $cat['name']}}</option>
            @endforeach
          </select>
          @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Harga <span>*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="price" value="{{ old('price') }}" class="form-control @error ('price') is-invalid @enderror">
          @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Stok<span>*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="stock" value="{{ old('stock') }}" class="form-control @error ('stock') is-invalid @enderror">
          @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 label-align">Deskripsi <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <textarea  class="form-control @error ('description') is-invalid @enderror" rows="3" name="description" placeholder="Deskripsi tentang buku">{{old('description')}}</textarea>
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
  <button type='submit' class="btn btn-primary" name="proses" value="simpan">Simpan</button>
</div>
</div>
</div>
</form>
 @endsection