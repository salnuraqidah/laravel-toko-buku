@extends('layouts.index')
@section('content')

@foreach ($ar_member as $member)
@php
    $ar_judul = ['Nama Lengkap'=> $member->name,'Role' => $member->roles,
    'Status'=> $member->status,'No Telp'=> $member->phone,'Address'=> $member->address];
    $no=1;
@endphp
<div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>My Profile</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          @if (!empty($member->avatar))
                          <img src="{{ asset('images/member')}}/{{ $member->avatar }}" class="img-responsive avatar-view" width="200px" alt="Avatar"/>
                          @else
                          <img class="img-responsive avatar-view" src="{{ asset('images/no_photo.png') }}" width="200px" alt="Avatar" title="Change the avatar">  
                          @endif
                        </div>
                      </div>
                      <br>
                      <h4>{{ $member->name}}</h4>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-envelope user-profile-icon"></i> {{  $member->email }}
                        </li>
                        
                      </ul>

                      <a class="btn btn-dark" href="{{ route('member.index') }}"><i class="fa fa-arrow-circle-left m-right-xs"></i>&nbsp;Go Back</a>
                      <br />

                    </div>
                    <div class="col-md-9 col-sm-9 ">
                      <table class="data table table-striped no-margin">
                        <tbody>
                          @foreach ($ar_judul as $judul => $field)
                          <tr>  
                            <td>{{ $no++ }}</td>
                            <td>{{ $judul }}</td>
                            <td>{{ $field }}</td>
                            @endforeach
                          </tr>
                          
                        </tbody>
                      </table>

                    
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
  @endforeach

  @endsection