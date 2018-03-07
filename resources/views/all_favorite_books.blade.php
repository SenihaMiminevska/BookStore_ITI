@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row text-center">
            <h1>Favorite Books</h1>
        </div>
        <div class="col-md-offset-1">
            @foreach ($all_favorite_books as $all_favorite_book)
                <div class="card card-outline-secondary mb-3 col-md-12 text-center">
                    <div class="card-block" >
                        <div class="pull-left" style="width: 125px;display: inline-block;"><img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 200px; width: 100%; display: inline-block;" src={{ asset('storage/' . $all_favorite_books_images[0]) }} data-holder-rendered="true"></div>
                        <p>{{$all_favorite_book->book_title}}</p>
                        <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection