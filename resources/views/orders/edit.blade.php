@extends('layouts.index')
@section('content')
@foreach ($data as $rs )
@php
$rs1 = App\Member::all();
@endphp
<span class="section">Edit Order</span>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="user" method="POST" action="{{ route('orders.update',$rs->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Invoice Number <span>*</span>
        </label>
        @php $val = ($errors->isEmpty()) ? $rs->invoice_number : old('invoice_number'); @endphp
        <div class="col-md-6 col-sm-6 ">
          <input disabled type="text" name="invoice_number" value="{{ $val }}" class="form-control @error ('invoice_number') is-invalid @enderror">
          @error('invoice_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Customer <span>*</span>
        </label>
       
        {{-- @php$val=($errors->isEmpty())?$rs->buyer:old('buyer');@endphp --}}
        <div class="col-md-6 col-sm-6 ">
          @php
               $val = ( Auth::user()->id == $rs->user_id) ?  Auth::user()->name : '';
          @endphp
          <input disabled type="text" name="buyer" value="{{ $val }}" class="form-control @error ('buyer') is-invalid @enderror">

          @error('buyert') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
       
      </div>
      

      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Total Price <span>*</span>
        </label>
        @php $val = ($errors->isEmpty()) ? $rs->total_price : old('total_price'); @endphp
        <div class="col-md-6 col-sm-6 ">
          <input disabled type="text" name="total_price" value="{{ $val }}" class="form-control @error ('author') is-invalid @enderror">
          @error('total_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Status <span>*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
          <select class="select2_single form-control @error ('status') is-invalid @enderror" name="status" tabindex="-1">
                 <option {{$rs->status == "PROCESS" ? "selected" : ""}}
                value="PROCESS">PROCESS</option>
                 <option {{$rs->status == "FINISH" ? "selected" : ""}}
                value="FINISH">FINISH</option>
                 <option {{$rs->status == "CANCEL" ? "selected" : ""}}
                value="CANCEL">CANCEL</option>
          </select>
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