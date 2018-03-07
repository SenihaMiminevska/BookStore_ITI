<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Genre;
use App\Book;


class NewItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $item = null;
        $genres = Genre::all()->pluck('value','key');
        $languages = Language::all()->pluck('value', 'key');
        return view('new_item',compact('genres', 'languages', 'item'));
    }

    public function create(Request $request)
    {
        // Validation
        $rules= [
            'provider' => 'required|string|min:2|max:150',
            'email' => 'required|email|min:5|max:60',
            'title' => 'required|string|min:2|max:150',
            'author' => 'required|string|min:5|max:150',
            'genre' => 'required|exists:genre,key',
            'language' => 'required|exists:languages,key',
            'price' => 'required|numeric|between:0,999.99',
            'year_of_issue' => 'required|date',
            'publishing_house' => 'required|string|min:5|max:150',
            'ISBN' => 'required|unique:books|digits:13',
            'type_cover' => 'required|in:soft_cover,hard_cover',
            'number_of_pages' => 'required|int|min:3|max:700',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif',
            'is_active' => 'int'
        ];

        $validator = Validator::make($request->all(),$rules);

        // Returning errors
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Upload image file
        // Get original name to image file,because otherwise it appears with encrypted
        $imageName = $request->file('image')->getClientOriginalName();
        //We specify the exact directory in which the file should be uploaded
        $request->file('image')->storeAs('public', $imageName);
        $imageTempName = $request->file('image');


        $genreKey = $request->get('genre');
        $genreName = DB::table('genre')->select('value')->where('key',$genreKey)->get();
        $languageKey = $request->get('language');
        $languageName = DB::table('languages')->select('value')->where('key',$languageKey)->get();


        //Insert into DB
        $model = $request->all();
        $model['image'] =  $imageName;
        $model['genre'] = $genreName[0]->value;

        Book::insert([$request->all()]);

        //Update image value
        //Book::where('image', $imageTempName)->update(['image' => $imageName]);

        //Update genre value
        //Book::where('genre', $genreKey)
         //   ->update(['genre' =>$genreName[0]->value]);

        //Update language value
        Book::where('language', $languageKey)
            ->update(['language' =>$languageName[0]->value]);

        //Update type cover value
        Book::where('type_cover', 'soft_cover')
            ->update(['type_cover' => 'Soft Cover']);
        Book::where('type_cover', 'hard_cover')
            ->update(['type_cover' => 'Hard Cover']);

        $bookInfo=$request->all();
        return view('layouts/modals',compact('imageName', 'bookInfo'));
    }

    public function show()
    {
        $data = Book::paginate(12);
        return view('datatable', compact('data'));
    }

    public function edit($id)
    {
        $item = Book::with('genre1')->find($id);
        dd($item->genre1);
        die();
        $item_genre = Genre::where('value', $item->genre)->pluck('key')->toArray();
        $item_language = Language::where('value', $item->language)->pluck('key')->toArray();
        $genres = Genre::all()->pluck('value','key');
        $languages = Language::all()->pluck('value', 'key');

        return view('new_item',compact('genres', 'languages', 'item', 'item_genre', 'item_language'));
    }

    public function update(Request $request, $id)
    {
// Validation
        $rules= [
            'provider' => 'required|string|min:2|max:150',
            'email' => 'required|email|min:5|max:60',
            'title' => 'required|string|min:2|max:150',
            'author' => 'required|string|min:5|max:150',
            'genre' => 'required|exists:genre,key',
            'language' => 'required|exists:languages,key',
            'price' => 'required|numeric|between:0,999.99',
            'year_of_issue' => 'required|date',
            'publishing_house' => 'required|string|min:5|max:150',
            'ISBN' => 'required|digits:13',
            'type_cover' => 'required|in:soft_cover,hard_cover',
            'number_of_pages' => 'required|int|min:3|max:700',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif',
            'is_active' => 'int'
        ];

        $validator = Validator::make($request->all(),$rules);

        // Returning errors
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Upload image file
        // Get original name to image file,because otherwise it appears with encrypted
        $imageName = $request->file('image')->getClientOriginalName();
        //We specify the exact directory in which the file should be uploaded
        $request->file('image')->storeAs('public', $imageName);
        $imageTempName = $request->file('image');


        $genreKey = $request->get('genre');
        $genreName = DB::table('genre')->select('value')->where('key',$genreKey)->get();
        $languageKey = $request->get('language');
        $languageName = DB::table('languages')->select('value')->where('key',$languageKey)->get();

        Book::find($id)->fill($request->all())->save();

        //Update image value
        Book::where('image', $imageTempName)->update(['image' => $imageName]);

        //Update genre value
        Book::where('genre', $genreKey)
            ->update(['genre' =>$genreName[0]->value]);

        //Update language value
        Book::where('language', $languageKey)
            ->update(['language' =>$languageName[0]->value]);

        //Update type cover value
        Book::where('type_cover', 'soft_cover')
            ->update(['type_cover' => 'Soft Cover']);
        Book::where('type_cover', 'hard_cover')
            ->update(['type_cover' => 'Hard Cover']);

        $data = Book::paginate(12);
          return view('/datatable', compact('data'))->with('success','Item updated successfully');
        /*return redirect()->back()->with('success','Item updated successfully');*/
    }

    public function destroy($id)
    {
        Book::where('id', $id)->delete();
        return redirect()->back();
    }
}
