<div class="col-md-7 panel panel-info hide" id="show-comments">
    <div class="panel-heading">Comments</div>
    <div class="panel-body">
        <ul class="list-group">
            @if($all_comments->isEmpty())
                <li class="list-group-item list-group-item-success">
                    <strong class="col-md-offset-2">No Comments</strong>
                </li>
            @else
                @foreach ($all_comments as $comment)
                    <li class="list-group-item">
                        @if(Auth::user() && Auth::user()->id == $comment->user_id )
                            {{ Form::open(array('url' => url('/all_books/detail_page/comment/delete/'.$comment->id), 'id'=> 'delete_comment', 'style'=>'display:none;'))}}
                            {{method_field('delete')}}
                            {{ Form::close() }}
                            <a class="delete-comment-btn" onclick="event.preventDefault();
                                                 document.getElementById('delete_comment').submit();">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        @endif
                        <strong class="col-md-2">{{ $comment->user_name }} say: </strong>
                        <span>{{ $comment->notes }}</span>
                    </li>
                @endforeach
            @endif
        </ul>
        @if( Auth::user())
            <div class="col-md-1 username-comment">
                {{ Auth::user()->name }}
            </div>
            {{ Form::open(array('url' => '/all_books/detail_page/{id}/comment', 'action' => 'AllBooksController@comment', 'id'=>'comment_form', 'class'=>'col-md-10 form-group has-success'))  }}
            {{ Form:: text('book_id',$this_book[0]->id, ['class' => 'hidden'])}}
            {{ Form:: text('user_id',Auth::user()->id, ['class' => 'hidden'])}}
            {{ Form:: text('user_name',Auth::user()->name, ['class' => 'hidden'])}}
            {{ Form::textarea('notes', null, ['size' => '120x3', 'class' => 'comment-field']) }}
            {{ Form::close() }}
        @else
            <p class="text-right">To add a comment for this book, you must be logged in!</p>
        @endif
    </div>
    <div class="alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>