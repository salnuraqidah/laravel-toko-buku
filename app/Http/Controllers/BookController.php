<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Book;
use Validator, File, Redirect, Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_books = DB::table('books')
            ->join('categories', 'categories.id', '=', 'books.categories_id')
            ->select('books.*', 'categories.name AS catag')
            ->get();
        return view('books.index', compact('ar_books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required',
            'publisher' => 'publisher',
            'stok' => 'required',
            'category' => 'required',
            'cover' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        if (!empty($request->cover)) {
            $fileName = $request->title . '.' . $request->cover->extension();
            $request->cover->move(public_path('images/book'), $fileName);
        } else {
            $fileName = '';
        }

        DB::table('books')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'cover' => $fileName,
            'price' => $request->price,
            'stock' => $request->stock,
            'categories_id' => $request->category,
        ]);
        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ar_books = DB::table('books')
            ->join('categories', 'categories.id', '=', 'books.categories_id')
            ->select('books.*', 'categories.name AS catag')
            ->where('books.id', '=', $id)
            ->get();
        return view('books.show', compact('ar_books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Book::where('id', $id)->get();
        return view('books.edit', compact('data'));
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
        $validasi = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required',
            'publisher' => 'publisher',
            'stok' => 'required',
            'category' => 'required',
            'cover' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $cover = DB::table('books')->select('cover')
            ->where('id', $id)->get();
        foreach ($cover as $f) {
            $namaFile = $f->cover;
        }
        if (!empty($request->cover)) {
            //hapus fisik foto lama di folder img
            File::delete(public_path('images/book/' . $namaFile));
            //proses upload file foto baru
            $request->validate([
                'cover' => 'image|mimes:png,jpg,jpeg|max:2048',
            ]);
            $fileName = $request->title . '.' . $request->cover->extension();
            $request->cover->move(public_path('images/book'), $fileName);
        } else { //tidak ganti foto
            $fileName = $namaFile;
        }

        DB::table('books')->where('id', $id)->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'cover' => $fileName,
                'price' => $request->price,
                'stock' => $request->stock,
                'categories_id' => $request->category,
            ]
        );
        return redirect('/books')->with('status', 'Book
        succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cover = DB::table('books')->select('cover')
            ->where('id', $id)->get();
        foreach ($cover as $cov) {
            $namaFile = $cov->cover;
        }
        File::delete(public_path('images/books/' . $namaFile));
        DB::table('books')->where('id', $id)->delete();
        return redirect('/books')->with('status', 'Book
        succesfully deleted');
    }
}
