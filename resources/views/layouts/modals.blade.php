@extends('layouts.dashboard_nav')
@section('content')
    <div id="talkbubble" class="bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <a type="button" class="close" aria-label="Close" href="{{ url('dashboard/new_item') }}">
            <span aria-hidden="true">&times;</span>
        </a>
        <div class="modal-dialog modal-sm text-center">
            <div class="img-wrapper">
                <img src={{asset("storage/$imageName")}} alt="book-cover" class="img-rounded">
            </div>
            <div class="info">
               <p>Title: {{$bookInfo['title']}}</p>
                <p>Author: {{$bookInfo['author']}}</p>
                <p>Price: {{number_format($bookInfo['price'], 2)}}$</p>
                <hr>
            </div>
            {{ Auth::user()->name }},
            You successfully uploaded a new book!
        </div>
    </div>
@endsection