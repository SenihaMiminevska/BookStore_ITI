@extends('layouts.dashboard_nav')

@section('content')
    <div id="page-content-wrapper">
        <div class="container text-center">
            <div class="row text-left">
                <div class="container" id="datatable">
                    <div class="row">
                        <h2 class="text-center">{{$data != null ? 'Datatable' : 'Sorry, you do not have any books yet!'}}</h2>
                    </div>
                    @if($data != null)
                    <div class="row">
                        <div class="col-md-12" >
                            <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th>Active</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Price</th>
                                    <th>Publishing House</th>
                                    <th>Year Of Issue</th>
                                    <th>Provider</th>
                                    <th>Email</th>
                                    <th>ISBN</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>
                                        @if($item->is_active == 1)
                                            <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->author}}</td>
                                    <td>{{number_format($item->price, 2)}}$</td>
                                    <td>{{$item->publishing_house}}</td>
                                    <td>{{date('d/m/Y',strtotime($item->year_of_issue))}}</td>
                                    <td>{{$item->provider}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->ISBN}}</td>
                                    <td>
                                        <button class="btn btn-primary btn-xs">
                                            <a href="{{ url('dashboard/new_item/'. $item->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" style="color:#fff;"></span></a>
                                        </button>

                                        {{ Form::open(array('url' => url('dashboard/datatable/' .$item->id . '/delete'), 'id'=> 'delete_book', 'style'=>'display:none;'))}}
                                        {{method_field('delete')}}
                                        {{ Form::close() }}
                                        <button class="btn btn-danger btn-xs" >
                                            <a onclick="event.preventDefault();
                                                 document.getElementById('delete_book').submit();"><span class="glyphicon glyphicon-trash" style="color:#fff;"></span>
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row text-center">
                                {{ $data->render() }}
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <a href="{{ url('dashboard/new_item') }}">New Item</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection