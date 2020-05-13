<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Book_Order;
use App\Order;

class Book_OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $order = Order::where('id', $id)->first();
        $ar_book_order = DB::table('book_order')
            ->join('books', 'books.id', '=', 'book_order.book_id')
            ->join('orders', 'orders.id', '=', 'book_order.order_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('book_order.*', 'books.title AS judul', 'users.name as name')
            ->get();
        return view('bookorder.index', compact('ar_book_order'));
        /*
        $ar_book_order = DB::table('book_order')
            ->join('books', 'books.id', '=', 'book_order.book_id')
            ->join('orders', 'orders.id', '=', 'book_order.order_id')
            ->select('books.*', 'books.title AS judul')
            ->get();
        return view('bookorder.index', compact('ar_book_order'));
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $ar_book_order = DB::table('book_order')
            ->join('books', 'books.id', '=', 'book_order.book_id')
            ->join('orders', 'orders.id', '=', 'book_order.order_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->select('book_order.*', 'books.title AS judul', 'users.name as name')
            ->where('book_order.id', '=', $id)
            ->get();
        return view('bookorder.show', compact('ar_book_order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
