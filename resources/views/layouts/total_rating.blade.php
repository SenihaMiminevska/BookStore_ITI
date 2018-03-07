<div class="rating-container rating-md rating-animate">
    <div class="rating-stars">
                            <span class="empty-stars">
                                <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                                <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                                <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                                <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                                <span class="star"><i class="glyphicon glyphicon-star-empty"></i></span>
                            </span>
        <span class="filled-stars" style="width: {{$vote}}%;">
                                <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                                <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                                <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                                <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                                <span class="star"><i class="glyphicon glyphicon-star"></i></span>
                            </span>
        <input id="input-2" name="input-2" class="rating rating-input" data-min="0" data-max="5" data-step="0.1">
    </div>
    <span class="card-text"><small>{{$i}} voted</small></span>
</div>