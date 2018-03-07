@if(Auth::user() &&  in_array( Auth::user()->id, $existing_recors ))
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="deleteFavoriteBookModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmar</h4>
                </div>
                <div class="modal-body text-center">
                    <p>Are you sure you want to remove the book from favorites?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="modal-btn-si"
                            onclick="event.preventDefault();
                                 document.getElementById('delete_favorite_book').submit();">Yes</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">No</button>
                </div>
            </div>
        </div>
    </div>
    {{ Form::open(array('url' => url('/all_books/detail_page/favorite/delete/'.Auth::user()->id.'/'.$this_book[0]->id), 'id'=> 'delete_favorite_book', 'style'=>'display:none;'))}}
    {{method_field('delete')}}
    {{ Form::close() }}

@elseif (Auth::user())
    {{ Form::open(array('url' => '/all_books/detail_page/{id}/favorite','action' => 'FavoritesController@create', 'id'=>'favorite_form', 'class'=>'hidden'))  }}
    {{ Form:: text('book_id',$this_book[0]->id)}}
    {{ Form:: text('book_title',$this_book[0]->title)}}
    {{ Form:: text('user_id',Auth::user()->id)}}
    {{ Form::close() }}
@else
    <div class="container col-md-6 hide" id="favorite-msg">
        <span class="card-text"><small>You must be logged!</small></span>
    </div>
@endif
