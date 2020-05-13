@extends('layouts.index')
@section('content')
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
<span class="section">Create New User</span>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="user" method="POST" action="{{ route('member.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama <span>*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="name" value="{{ old('name') }}" class="form-control @error ('name') is-invalid @enderror">
          @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Email <span>*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="email" name="email" value="{{ old('nama') }}" class="form-control @error ('nama') is-invalid @enderror">
          @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Password <span>*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="password" name="password" value="{{ old('password') }}" class="form-control @error ('password') is-invalid @enderror">
          @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Role<span>*</span></label>
        <div class="col-md-6 col-sm-6 ">
          <div id="gender" class="btn-group" data-toggle="buttons">
            @foreach ($ar_role as $label => $role)
            @php
            $cek = (old('role') ==  $role) ? 'checked' : '' ;
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
            $cek = (old('status') ==  $status) ? 'checked' : '' ;
            $css = ($status ==  'ACTIVE') ? 'primary' : 'danger';
            //$css = ($role ==  '') ? 'secondary' : 'primary'; 
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
        <label class="col-form-label col-md-3 col-sm-3 label-align">No Telp
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error ('phone') is-invalid @enderror">
          @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="control-label col-md-3 col-sm-3 label-align">Alamat <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <textarea  class="form-control @error ('address') is-invalid @enderror" rows="3" name="address" placeholder="Alamat Lengkap">{{old('address')}}</textarea>
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
  <button type='submit' class="btn btn-primary" name="proses" value="simpan">Simpan</button>
</div>
</div>
</div>
</form>
 @endsection