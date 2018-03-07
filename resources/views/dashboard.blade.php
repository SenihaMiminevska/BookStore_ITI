@extends('layouts.dashboard_nav')

@section('content')
        <div id="page-content-wrapper">
            <div class="container text-center">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <img src="{{url('/images/admincho.jpg')}}" alt="Image"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h1>Welcome <strong>{{ Auth::user()->name }} :)</strong></h1>
                    </div>
                </div>
            </div>
        </div>
@endsection