@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row text-center">
            <h1>Books</h1>
        </div>
        <div class="col-md-offset-1">
        @foreach ($booksInfo as $bookInfo)
            <div class="card card-outline-info mb-3 text-center" style="width: 20rem; height: 48rem;">
                <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 280px; width: 100%; display: block;" src={{ asset('storage/' . $bookInfo->image) }} data-holder-rendered="true">
                <div class="card-block">
                    <h4 class="card-title">{{$bookInfo->title}}</h4>
                    <p class="card-text">{{$bookInfo->author}}</p>
                    <p class="card-text">{{number_format($bookInfo->price, 2)}}$</p>
                    <a href="{{ url('/all_books/detail_page/'.$bookInfo->id) }}" class="btn btn-primary">Details</a>
                </div>
            </div>
        @endforeach
        <div class="row text-center">
            {{ $booksInfo->render() }}
        </div>
    </div>
@endsection