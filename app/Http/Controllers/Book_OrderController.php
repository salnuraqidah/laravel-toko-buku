<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Book_Order;

class Book_OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_book_order = DB::table('books')
            ->join('categories', 'categories.id', '=', 'books.categories_id')
            ->select('books.*', 'categories.name AS catag')
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
