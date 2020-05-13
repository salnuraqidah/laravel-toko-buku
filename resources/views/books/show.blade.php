@extends('layouts.index')
@section('content')

@foreach ($ar_books as $buku)
@php
    $ar_judul = ['Pengarang'=> $buku->author,
    'Penerbit'=> $buku->publisher,
    'Stok'=> $buku->stock,
    'Harga'=> $buku->price,
    'Kategori'=> $buku->catag,'Deskripsi'=> $buku->description,];
    $no=1;
@endphp
<div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail buku</h2>
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
                          @if (!empty($buku->cover))
                          <img src="{{ asset('images/book')}}/{{ $buku->cover }}" class="img-responsive avatar-view" width="200px" alt="Avatar"/>
                          @else
                          <img class="img-responsive avatar-view" src="{{ asset('images/no_cover.jpeg') }}" width="200px" alt="Avatar" title="Change the avatar">  
                          @endif
                        </div>
                      </div>
                      <br>
                      <h4>{{ $buku->title}}</h4>


                      <a class="btn btn-dark" href="{{ route('books.index') }}"><i class="fa fa-arrow-circle-left m-right-xs"></i>&nbsp;Go Back</a>
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
                          <tr>
                            <td>Jumlah Pesan</td>
                            <td>:</td>
                            <td>
                                 <form method="post" action="{{ url('orders') }}/{{ $buku->id }}" >
                                @csrf
                                    <input type="text" name="jumlah_pesan" class="form-control" required="">
                                    <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                                </form>
                            </td>
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