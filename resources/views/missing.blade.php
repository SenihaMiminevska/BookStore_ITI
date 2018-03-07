@extends('layouts.app')
@section('content')
   <div class="container-fluid">
       <div class="col-md-offset-2 col-md-8 wrapper-404">
           <div class="w3l">
               <div class="text">
                   <h1 class="col-md-offset-1 error-404">404</h1>
                   <h1>PAGE NOT FOUND</h1>
                   <p>You have been tricked into click on a link that can not be found. Please check the url or go to <a href="#">main page</a> and see if you can locate what you are looking for</p>
               </div>
               <div class="image">
                   <img src="{{asset("images/smile.png")}}">
               </div>
               <div class="clear"></div>
           </div>
       </div>
   </div>
@endsection