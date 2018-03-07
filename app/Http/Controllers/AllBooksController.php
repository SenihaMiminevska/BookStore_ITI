<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Rating;
use App\Favorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;
use App\Book;

class AllBooksController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index(){

        $booksInfo = Book::where('is_active', 1)->paginate(16);

        return view('/all_books', compact('booksInfo'));
    }
    public function create(Request $request)
    {
        //Insert into DB
        Rating::insert([$request->all()]);
        return redirect()->back();
    }
    public function detail($id){

        $this_book = Book::where('id', $id)->get();

        $book_rate = Rating::where('book_id',$this_book[0]->id)->get();

        $all_comments = Comment::where('book_id', $id)->get();
        /*$existing_recors= [];*/
        $existing_recors = Favorite::where('book_id', $id)->pluck('user_id')->toArray();
        /*$favorite_books_userid = Favorite::where('book_id', $id)->pluck('user_id')->toArray();*/
        /*dd($existing_recors );*/


        $i=0;
        $vote=0;
        $votes = [];
        $vote_user = [];
        foreach ($book_rate as $item)
        {
            $i++;
            array_push($votes, $item->vote);
            array_push($vote_user, $item->user_id);
        }
        if ($i > 0){
            $vote = ((array_sum($votes)/$i)*20);
        }

        return view('/detail_page', compact('this_book', 'vote_user', 'vote', 'i', 'all_comments', 'existing_recors'));
    }
    public function comment(Request $request, $id)
    {
        // Validation
        $rules= [
            'book_id' => 'required|int',
            'user_id' => 'required|int|min:0',
            'user_name' => 'required|string|min:2|max:150',
            'notes' => 'string|min:2|max:200'
        ];
        $validator = Validator::make($request->all(),$rules);

        // Returning errors
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Comment::insert([$request->all()]);

       return redirect()->back();
    }

    public function destroy($id)
    {
        Comment::where('id', $id)->delete();
        return redirect()->back();
    }
    public function destroyFavorite($id, $book_id)
    {
        Favorite::where('user_id', $id)->where('book_id', $book_id)->delete();
        return redirect()->back();
    }
}
