<?php

namespace App\Http\Controllers;

use App\Book;
use App\Book_Order;
use App\Order;
use Auth;
use Illuminate\Http\Request;
use DB;


class OrderController extends Controller
{

    public function index()
    {
        $orders = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.name AS nama_user')
            ->get();
        return view('orders.index', compact('orders'));
    }


    public function pesan(Request $request, $id)
    {
        //mengambil buku berdasarkan id
        $buku = Book::where('id', $id)->first();
        //validasi melebihi stok
        if ($request->jumlah_pesan > $buku->stock) {
            return redirect('orders/' . $id);
        }

        //cek validasi
        $cek_pesanan = Order::where('user_id', Auth::user()->id)->where('status', 'PROCESS')->first();
        if (empty($cek_pesanan)) {
            //simpan ke dalam database orders
            $pesanan = new Order;
            $pesanan->total_price = 0;
            $pesanan->invoice_number = mt_rand(100, 999);
            $pesanan->status = 'PROCESS';
            $pesanan->user_id = Auth::user()->id;
            $pesanan->save();
        }

        //mengambil id order yang telah diinput diatas
        $pesanan_baru = Order::where('user_id', Auth::user()->id)->where('status', 'PROCESS')->first();


        $cek_pesanan_detail = Book_Order::where('book_id', $buku->id)->where('order_id', $pesanan_baru->id)->first();
        if (empty($cek_pesanan_detail)) {
            //simpan ke database Book_order
            $pesanan_detail = new Book_Order;
            $pesanan_detail->book_id = $buku->id;
            $pesanan_detail->order_id = $pesanan_baru->id;
            $pesanan_detail->quantity = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $buku->price * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = Book_Order::where('book_id', $buku->id)->where('order_id', $pesanan_baru->id)->first();

            $pesanan_detail->quantity = $pesanan_detail->quantity + $request->jumlah_pesan;

            //harga sekarang
            $harga_pesanan_detail_baru = $buku->price * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }
        //jumlah total
        $pesanan = Order::where('user_id', Auth::user()->id)->where('status', 'PROCESS')->first();
        $pesanan->total_price = $pesanan->total_price + $buku->price * $request->jumlah_pesan;
        $pesanan->update();

        return redirect('/books');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Order::where('id', $id)->get();
        return view('orders.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = \App\Order::findOrFail($id);
        $order->status = $request->get('status');
        $order->save();
        return redirect('/orders')->with(
            'status',
            'Order status succesfully updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('orders')->where('id', $id)->delete();
        return redirect('/orders');
    }
}
