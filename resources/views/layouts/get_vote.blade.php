<div class="container col-md-6 hide" id="show-stars">
    @if(Auth::user() && in_array( Auth::user()->id, $vote_user ))
        <span class="card-text"><small>You have already voted for this book!</small></span>
    @elseif (Auth::user())
        <div class="row lead" onclick="event.preventDefault();
                                                 document.getElementById('rating_form').submit();">
            <div id="stars" class="starrr"></div>
        </div>
        <div class="row"><small>You gave a rating of <span id="count">0</span> star(s)</small></div>
        {{ Form::open(array('id'=>'rating_form', 'style'=>'display:none;')) }}
        {{ Form:: text('book_id',$this_book[0]->id)}}
        {{ Form:: text('title',$this_book[0]->title)}}
        {{ Form:: text('vote',null)}}
        {{ Form:: text('user_id',Auth::user()->id)}}
        {{ Form::close() }}
    @else
        <span class="card-text"><small>You must be logged!</small></span>
    @endif
</div>