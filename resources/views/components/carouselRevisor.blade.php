@if (session()->has('article'))
<div class="alert alert-success text-center mt-3">
    {{ session('article') }}
</div>
@endif
<div class="container rounded p-0 w-75 mt-5">
    <div class="row">
        {{-- Carosello --}}
        <div id="carouselExampleIndicators" class="carousel slide col-12 mt-5 rounded">
            <div class="carousel-indicators rounded">
                @if (!$article->images->isEmpty())
                @foreach ($article->images as $image)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}" class="@if ($loop->first) active @endif" aria-current="true" aria-label="Slide 1"></button>  
                @endforeach
                @else
                @endif
            </div>
            <div class="carousel-inner">
                @if (!$article->images->isEmpty())
                @foreach ($article->images as $image)
                <div class="carousel-item @if ($loop->first) active @endif container">
                    <div class="row">
                        <div class="col-6"><img src="{{$image->getUrl(400, 400)}}" class="d-block w-100 rounded" alt="Immagine3"></div>
                        <div class="col-6">
                            <div class="row">
                                {{-- controllo --}}
                                <div class="col-6">
                                    <h5>Tags</h5>
                                    <div>
                                        @if ($image->labels)
                                        @foreach ($image->labels as $label)
                                        <p>{{$label}}</p>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <div class="card-body">
                                            <h5 class="tc-accent">Revisione immagini</h5>
                                            <p>Adulti: <span class="{{$image->adult}}"></span></p>
                                            <p>Satira: <span class="{{$image->spoof}}"></span></p>
                                            <p>Medicina: <span class="{{$image->medical}}"></span></p>
                                            <p>Violenza: <span class="{{$image->violence}}"></span></p>
                                            <p>Contenuto osè: <span class="{{$image->racy}}"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                
                <div class="carousel-item active d-flex justify-content-center">
                    <img src="\img\no-image_2.jpg" class="d-block w-25 rounded" alt="Immagine3">
                </div>
                @endif
                
                {{-- Pulsanti carosello --}}
                @if (!$article->images->isEmpty())
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" style="" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                @endif
            </div>
            
            
        </div>
        
        {{-- Dati articolo --}}
        <div class="col-12 mt-5 text-center">
            <div>
                <span class="background_blue rounded p-1 text-white">{{$article->category->name}}</span>
            </div>
            <h3 class="mt-5">{{ $article->title }}</h3>
            <span>{{ $article->description }}</span>
            <h2 style="color: rgb(0, 167, 0)">€{{$article->price}}</h2>
            <hr class="w-75 m-auto mb-3">
            <h6>Creato il {{$article->created_at->format('d/m/Y')}}, dall'utente <a href="{{route('user.show',['user'=>$article->user])}}">{{$article->user->name}} {{$article->user->surname}}</a></h6>            
        </div>
    </div>
</div>