@extends('layouts.dashboard_nav')

@section('content')
    <div id="page-content-wrapper" >
        <div class="container text-center">
            <div class="row text-left">
                <div class="alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="alert-success">
                    <ul>
                        @if(session()->has('success'))
                            @foreach(session('success') as $success)
                                <li>{{ $success }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                {{ Form::open(['files' => true], ($item != null) ? ['action' => "NewItemController@update", $item->id] : null) }}
                @if($item != null)
                    {{ method_field('PATCH') }}
                @endif
                <div class="row">
                    <h1 class="text-center">{{$item != null ? 'Edit Item' : 'Create New Item'}}</h1>
                </div>

                {{--PROVIDER--}}
                <div class="row form-group">
                    {{  Form::label('provider', 'Provider *',
                                    [ 'class' => 'col-md-2 text-right control-label'])
                    }}
                    <div class="col-md-8">
                        {{  Form:: text('provider',
                                   old('provider', isset($item->provider) ? $item->provider : null),
                                   ['class' => 'form-control', 'placeholder' => 'Username'])
                        }}
                    </div>
                </div>

                {{--EMAIL--}}
                <div class="row form-group">
                    {{  Form::label('email', 'Vendor Email *',
                                    ['class' => 'col-md-2 text-right control-label'])  }}
                    <div class="col-md-8">
                        {{  Form:: email('email',
                                   old('email', isset($item->email) ? $item->email : null),
                                   ['class' => 'form-control', 'placeholder' => 'bookstore@bookstore.com'])
                        }}
                    </div>
                </div>

                {{--TITLE--}}
                <div class="row form-group">
                    {{  Form::label('title', 'Title *',
                                    ['class' => 'col-md-2 text-right control-label'])
                    }}
                    <div class="col-md-8">
                        {{  Form:: text('title',
                                   old('title', isset($item->title) ? $item->title : null),
                                   ['class' => 'form-control', 'placeholder' => 'Title'])
                        }}
                    </div>
                </div>

                {{--AUTHOR--}}
                <div class="row form-group">
                    {{  Form::label('author', 'Author *',
                                    ['class' => 'col-md-2 text-right control-label']) }}
                    <div class="col-md-8">
                    {{  Form:: text('author',
                               old('author', isset($item->author) ? $item->author : null),
                                        ['class' => 'form-control', 'placeholder' => 'Author']) }}
                    </div>
                </div>

                {{--GENRE--}}
                <div class="row form-group">
                    {{  Form::label('genre', 'Genre *',
                                    ['class' => 'col-md-2 text-right control-label']) }}
                    <div class="col-md-8">
                        {{  Form:: select('genre',$genres,
                                        old('genre', isset($item_genre) ? $item_genre : null),
                                        ['class' => 'form-control']) }}
                    </div>
                </div>

                {{--LANGUAGE--}}
                <div class="row form-group">
                    {{  Form::label('language', 'Language *',
                                    ['class' => 'col-md-2 text-right control-label']) }}
                    <div class="col-md-8">
                    {{  Form:: select('language', $languages,
                                old('language', isset($item_language) ? $item_language : null),
                                ['class' => 'form-control'])}}
                    </div>
                </div>

                {{--PRICE--}}
                <div class="row form-group">
                    {{  Form::label('price', 'Price *',
                                    ['class' => 'col-md-2 text-right control-label']) }}
                    <div class="col-md-8">
                    {{  Form:: text('price',
                                old('price', isset($item->price) ? number_format($item->price, 2) : null),
                                ['class' => 'form-control', 'placeholder' => '20.00']) }}
                    </div>
                </div>

                {{--YEAR OF ISSUE--}}
                <div class="row form-group">
                    {{  Form::label('year_of_issue', 'Year Of Issue *',
                                    ['class' => 'col-md-2 text-right control-label']) }}
                    <div class="col-md-8">
                    {{  Form:: date('year_of_issue',
                                old('year_of_issue', isset($item->year_of_issue) ? date('Y-m-d',strtotime($item->year_of_issue)) : null)
                    ,
                                ['class' => 'form-control']) }}
                    </div>
                </div>

                {{--PUBLISHING HOUSE--}}
                <div class="row form-group">
                    {{  Form::label('publishing_house', 'Publishing House *',
                                    ['class' => 'col-md-2 text-right control-label']) }}
                    <div class="col-md-8">
                    {{  Form:: text('publishing_house',
                                old('publishing_house', isset($item->publishing_house) ? $item->publishing_house : null),
                                ['class' => 'form-control', 'placeholder' => 'Publishing House']) }}
                    </div>
                </div>

                {{--EAN--}}
                <div class="row form-group">
                    {{  Form::label('EAN', 'EAN',
                                    ['class' => 'col-md-2 text-right control-label']) }}
                    <div class="col-md-8">
                    {{  Form:: text('EAN',
                                old('EAN', isset($item->EAN) ? $item->EAN : null),
                                ['class' => 'form-control', 'placeholder' => 'EAN']) }}
                    </div>
                </div>

                {{--ISBN--}}
                <div class="row form-group">
                    {{  Form::label('ISBN', 'ISBN *',
                                    ['class' => 'col-md-2 text-right control-label']) }}
                    <div class="col-md-8">
                    {{  Form:: text('ISBN',
                                old('ISBN', isset($item->ISBN) ? $item->ISBN : null),
                                ['class' => 'form-control', 'placeholder' => 'ISBN']) }}
                    </div>
                </div>

                {{--TYPE COVER--}}
                <div class="row form-group">
                    {{  Form::label('type_cover', 'Type Cover *',
                                     ['class' => 'col-md-2 text-right control-label']) }}

                    {{-- Създаваме условие: ако $item == null т.е. отворена е Create new item формата, да добави
                         class="is_active" по подразбиране на Hard cover, в противен случай в зависимост от стоййноста
                         на $item->type_cover да добави на съответния радио бутон class="is_active"--}}

                    <div class="col-md-2">
                        {{  Form:: radio('type_cover','hard_cover',true, ($item == null) ? ['class' => 'is_active']: $item->type_cover === 'Hard Cover' ? ['class' => 'is_active'] : null) }}
                        {{  Form::label('hard_cover', 'Hard cover',
                                            ['class' => 'text-right mt-radiobutton mt-radiobutton-outline control-label']) }} <span></span>
                    </div>

                    <div class="col-md-2">
                        {{  Form:: radio('type_cover','soft_cover',true, ($item == null) ? null: $item->type_cover === 'Soft Cover' ? ['class' => 'is_active'] : null) }}
                            {{  Form::label('soft_cover', 'Soft cover',
                                            ['class' => 'text-right mt-radiobutton mt-radiobutton-outline control-label']) }} <span></span>
                    </div>
                </div>

                {{--NUMBER OF PAGES--}}
                <div class="row form-group">
                    {{  Form::label('number_of_pages', 'Number Of Pages *',
                                    ['class' => 'col-md-2 text-right control-label']) }}
                    <div class="col-md-8">
                    {{  Form:: text('number_of_pages',
                                old('number_of_pages', isset($item->number_of_pages) ? $item->number_of_pages : null),
                                ['class' => 'form-control', 'placeholder' => '200']) }}
                    </div>
                </div>

                {{-- Трябва да се попълва автоматично при отваряне на edit формата,
                    т.е. да бъде селектирано изображението, което е подадено преди това
                 $item != null ? ['value' => old('image', asset("storage/$item->image")), 'accept'=> 'image/*', 'class' => 'default-text-hidden']: ['accept'=> 'image/*']

                 <span style="position: relative;top: -22px;left: 100px;">{{$item != null ? $item->image : null}}</span>
                 --}}

                {{--
                    That is a security risk and you can't set it using JavaScript or PHP.
                                        *** STACKOVERFLOW ***
                                                                                                    --}}
                {{-- UPLOAD FILE--}}
                <div class="row form-group">
                    {{  Form::label('image', 'Attach A File *',
                                    ['class' => 'col-md-2 text-right control-label']) }}
                    <div class="col-md-8 image-upload">
                    {{  Form:: file('image', ['accept'=> 'image/*']) }}
                    </div>
                </div>

                {{--IS ACTIVE--}}
                <div class="row form-group">
                    {{ Form::hidden('is_active', 0) }}
                    {{ Form::checkbox('is_active', 1,null, ($item == null) ? null: $item->is_active == 1 ? ['class' => 'is_active'] : null) }}
                    {{  Form::label('is_active', 'Is Active',
                                    ['class' => 'col-md-2 text-right mt-checkbox mt-checkbox-outline control-label']) }}<span></span>
                </div>

                <div class="row form-group text-center">
                    @if($item == null)
                        {{  Form:: submit('Create', ['class' => 'btn btn-success']) }}
                    @elseif($item != null)
                        {{  Form:: submit('Update', ['class' => 'btn btn-success']) }}
                    @endif
                        {{  Form:: reset('Clear', ['class' => 'btn btn-danger']) }}
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection