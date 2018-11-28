<div id="carouselExampleSlidesOnly" class="carousel w-100 slide border-dark" data-ride="carousel">
    <div class="carousel-inner" id="carousel-inner">
        <?php
            $i = 0;
            $active = ' active';
        ?>
        @foreach($carousel as $item)
        <?php $file = str_replace('public', 'storage', $item); ?>
        <div class="carousel-item {{$active}}">
            <img class="d-block w-100" src="{{$file}}" alt="слайд" />
        </div>
        <?php
            $active = '';
            $i++;
        ?>
        @endforeach
     </div>
</div>

