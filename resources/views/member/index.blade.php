@extends('layouts.index')
@section('content')
@php
    $no = 1;
    $ar_judul = ['No','Nama', 'Email', 'Role','Status','Foto','Action'];
@endphp

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>List User</h2>
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
      @foreach ($ar_member as $member)
      <tr>
          <td>{{ $no++ }}</td>
          <td>{{ $member->name }}</td>
          <td>{{ $member->email }}</td>
          <td>{{ $member->roles }}</td>
          @php
              $css = ($member->status == 'ACTIVE') ? 'success':'danger';
          @endphp
          <td><span class="badge badge-{{ $css }}">{{ $member->status }}</span></td>
          @if (!empty($member->avatar))
          <td><img src="{{ asset('images/member')}}/{{ $member->avatar }}" width="70px"/></td>
          @else
          <td><img src="{{ asset('images')}}/no_photo.png" width="70px"/></td>
          @endif
          <td>
            <form method="POST" action="{{ route('member.destroy',$member->id) }}">
              @csrf
              @method('DELETE')
              <a class="btn btn-info" href="{{ route('member.show',$member->id) }}"><i class="fa fa-folder"></i></a>&nbsp;
                <a class="btn btn-warning" href="{{ route('member.edit',$member->id) }}"><i class="fa fa-pencil-square-o"></i></a>&nbsp;
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