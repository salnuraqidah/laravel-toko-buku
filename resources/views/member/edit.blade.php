@extends('layouts.index')
@section('content')
@foreach ($data as $rs )
@php
$ar_role = [
    'Administrator' => 'ADMIN',
    'User' => 'USER',
];
$ar_status = [
    'Active' => 'ACTIVE',
    'Inactive' => 'INACTIVE',
];
@endphp
<span class="section">Edit USer</span>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="user" method="POST" action="{{ route('member.update',$rs->id)}}" enctype="multipart/form-data">
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
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Email <span>*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            @php $val = ($errors->isEmpty()) ? $rs->email : old('email'); @endphp
          <input type="text" name="email" value="{{ $val }}" class="form-control @error ('email') is-invalid @enderror">
          @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Role<span>*</span></label>
        <div class="col-md-6 col-sm-6 ">
          <div class="btn-group" data-toggle="buttons">
            @foreach ($ar_role as $label => $role)
            @php
            $cek = ($role ==  $rs->roles) ? 'checked' : '';
            $css = ($role ==  'ADMIN') ? 'primary' : 'warning'; 
            @endphp
            <label class="btn btn-{{ $css }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input type="radio" {{ $cek }}  class="flat @error ('roles') is-invalid @enderror" name="roles" 
                value="{{ $role }}"/>&nbsp; {{ $label }}
            </label>
            @endforeach
          </div>
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Status<span>*</span></label>
        <div class="col-md-6 col-sm-6 ">
          <div id="gender" class="btn-group" data-toggle="buttons">
            @foreach ($ar_status as $label => $status)
            @php
            $cek = ($status ==  $rs->status) ? 'checked' : '';
            $css = ($status ==  'ACTIVE') ? 'primary' : 'danger'; 
            @endphp
            
            <label class="btn btn-{{ $css }}" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                <input type="radio" {{ $cek }}  class="flat @error ('status') is-invalid @enderror" name="status" 
                value="{{ $status }}"/>&nbsp; {{ $label }}
            </label>
            @endforeach
          </div>
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">No Telp <span>*</span>
        </label>
        @php $val = ($errors->isEmpty()) ? $rs->phone : old('phone'); @endphp
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="phone" value="{{ $val }}" class="form-control @error ('phone') is-invalid @enderror">
          @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat <span>*</span>
        </label>
        @php $val = ($errors->isEmpty()) ? $rs->address : old('address'); @endphp
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="address" value="{{ $val }}" class="form-control @error ('address') is-invalid @enderror">
          @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label  class="col-form-label col-md-3 col-sm-3 label-align">Foto</label>
        <div class="col-md-6 col-sm-6 ">
          <input type="file"  class="form-control @error ('avatar') is-invalid @enderror"  name="avatar">
          @error('avatar') <div class="invalid-feedback">{{ $message }}</div> @enderror
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