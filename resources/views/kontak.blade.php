@extends('layouts.index')
@section('content')
<center><h1>Hubungi Kami</h1>
    <h5>Email   : codebookstore@info.com</h5>
    <h5>Website : codebookstore.com</h5></center>
<br>
<form action="">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="" value="" class="form-control">
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Email
        </label>
        <div class="col-md-6 col-sm-6 ">
          <input type="text" name="" value="" class="form-control">
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Pesan
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" name="" value="" class="form-control">
        </div>
      </div>
        <div class="form-group">
          <div class="col-md-6 offset-md-3">
            <button type='submit' class="btn btn-primary" name="proses" value="ubah">&nbsp;Kirim</button>
    </div>
    </div>


</form>
@endsection