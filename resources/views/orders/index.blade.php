@extends('layouts.index')
@section('content')
@php
    $no = 1;
    $ar_judul = ['No','Invoice number', 'Status', 'Customer',
    'Order Date','Total Price','Action'];
@endphp

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>List Order</h2>
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

<table id="datatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        @foreach ($ar_judul as $judul)
        <th>{{ $judul }}</th>                    
        @endforeach
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
      <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $order->invoice_number }}</td>
          <td>{{ $order->status }}</td>
          <td>{{$order->nama_user}}</td>
          <td>{{$order->created_at}}</td>
          <td>{{$order->total_price}}</td>
          <td>
            <form method="POST" action="{{ route('orders.destroy',$order->id) }}">
              @csrf
              @method('DELETE')
              <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}"><i class="fa fa-folder"></i></a>&nbsp;
                <a class="btn btn-warning" href="{{ route('orders.edit',$order->id) }}"><i class="fa fa-pencil-square-o"></i></a>&nbsp;
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