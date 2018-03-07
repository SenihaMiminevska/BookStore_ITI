<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Favorite;
use App\Book;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $all_favorite_books = Favorite::where('user_id', $id)->get();

        $all_favorite_books_images = Book::where('id', $all_favorite_books[0]->book_id)->pluck('image');
        /*dd($all_favorite_books_images[0]);*/
        return view('/all_favorite_books', compact('all_favorite_books', 'all_favorite_books_images'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        // Validation
        $rules= [
            'book_id' => 'required|int',
            'book_title' => 'required|string',
            'user_id' => 'required|int'
        ];
        $validator = Validator::make($request->all(),$rules);

        // Returning errors
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //Insert into DB
        Favorite::insert([$request->all()]);
        return redirect()->back();
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
