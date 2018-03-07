@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row text-center">
            <h1> Detail Books</h1>
        </div>
        <div class="card card-outline-info mb-3 text-center" style="width: 50rem;display: block;margin: 0 auto;">
            <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180"
                 style="height: 660px; width: 100%; display: block;"
                 src={{ asset('storage/' . $this_book[0]->image) }} data-holder-rendered="true">
            <div class="card-block text-left" style="background: #5bc0de; color:#fff;display: block;">
                <div class="col-md-offset-3">
                    <h4 class="card-title">Title: {{$this_book[0]->title}}</h4>
                    <p class="card-text">Author: {{$this_book[0]->author}}</p>
                    <p class="card-text">Genre: {{$this_book[0]->genre}}</p>
                    <p class="card-text">Type cover: {{$this_book[0]->type_cover}}</p>
                    <p class="card-text">Price: {{number_format($this_book[0]->price, 2)}}$</p>
                    <p class="card-text">Number of pages: {{$this_book[0]->number_of_pages}}</p>
                    <p class="card-text">Language: {{$this_book[0]->language}}</p>
                    <p class="card-text">Publishing House: {{$this_book[0]->publishing_house}}</p>
                    <p class="card-text">ISBN: {{$this_book[0]->ISBN}}</p>

                    {{--*** SHOW TOTAL RATING FOR THIS BOOK ***--}}
                    @include('layouts.total_rating')

                    {{--*** GET VOTE FROM USER ***--}}
                    @include('layouts.get_vote')

                    {{--*** MAKE FAVORITE BOOK ***--}}
                    @include('layouts.favorite_book')

                    <div class="col-md-offset-1">
                        <a class="btn btn-primary show-stars" ><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-primary show-comments"><i class="fa fa-comments-o" aria-hidden="true"></i></a>
                        <a class="btn btn-primary add-favorite" onclick="event.preventDefault();
                                                 document.getElementById('favorite_form').submit();">
                            @if(Auth::user() &&  in_array( Auth::user()->id, $existing_recors ))
                                <i class="fa fa-heart" aria-hidden="true" data-toggle="modal" data-target="#deleteFavoriteBookModal"></i>
                            @else
                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                            @endif
                        </a>
                        <a class="btn btn-primary add-favorite" href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        {{--*** OPEN COMMENT PANEL ***--}}
        @include('layouts.comments_panel')
    </div>

@endsection