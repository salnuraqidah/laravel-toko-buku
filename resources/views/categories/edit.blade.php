@extends('layouts.index')
@section('content')
@foreach ($data as $rs )

<span class="section">Edit Category</span>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="user" method="POST" action="{{ route('categories.update',$rs->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama <span>*</span>
        </label>
        @php $val = ($errors->isEmpty()) ? $rs->name : old('name'); @endphp
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="name" value="{{ $val }}" class="form-control @error ('name') is-invalid @enderror">
          @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
        

<div class="ln_solid">
    <div class="form-group">
      <div class="col-md-6 offset-md-3">
  <button type='submit' class="btn btn-warning" name="proses" value="edit">Edit</button>
</div>
</div>
</div>
</form>
@endforeach  
 @endsection