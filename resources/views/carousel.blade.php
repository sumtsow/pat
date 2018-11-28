<div id="carouselExampleSlidesOnly" class="carousel w-100 slide border-dark" data-ride="carousel">
    <div class="carousel-inner" id="carousel-inner">
        @foreach($carouselFiles as $key => $file)
        <div class="carousel-item @if(!$key) active @endif">
            <img class="d-block w-100" src="{{str_replace('public', 'storage', $file)}}" alt="Слайд {{++$key}}" />
        </div>
        @endforeach
     </div>
</div>

