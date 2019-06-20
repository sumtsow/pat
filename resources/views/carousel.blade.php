<div id="carouselExampleSlidesOnly" class="carousel w-100 slide border-dark" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleSlidesOnly" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleSlidesOnly" data-slide-to="1"></li>
      <li data-target="#carouselExampleSlidesOnly" data-slide-to="2"></li>
      <li data-target="#carouselExampleSlidesOnly" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" id="carousel-inner">
        @foreach($carouselFiles as $key => $file)
        <div class="carousel-item @if(!$key) active @endif" data-interval="3000">
            <img class="d-block w-100" src="{{str_replace('public', '/storage', $file)}}" alt="Слайд {{++$key}}" />
        </div>
        @endforeach
    </div>

    <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
  </a>
  
    <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

</div>

