<div class="col-md-3 col-5 m-auto mb-5 mt-2">
    <a href="{{route('category.show',['category'=>$category])}}"><img src="{{$category->icon}}" class="img-fluid" alt="..."></a>
    <div class="card-body">
        <a href="{{route('category.show', ['category'=>$category])}}"><h5 class="card-title">{{$category->name ?? 'motori'}}</h5></a>
        <p class="card-text">
            @if ($category->articles->count() == 1)
            Abbiamo 1 articolo in questa categoria 
            @elseif ($category->articles->count() > 1)
            Ci sono {{$category->articles->count()}} articoli in questa categoria
            @else
            Non abbiamo articoli in questa categoria
            @endif 
        </p>
    </div>
</div>