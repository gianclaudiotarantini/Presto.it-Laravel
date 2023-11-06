@if (session()->has('article'))
<div class="alert alert-success text-center mt-3">
    {{ session('article') }}
</div>
@endif
<div class="container rounded p-0 w-75 mt-5">
    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide col-12 col-md-6 mt-5 rounded">
            <div class="carousel-indicators rounded">
                @if (!$article->images->isEmpty())
                @foreach ($article->images as $image)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}" class="@if ($loop->first) active @endif" aria-current="true" aria-label="Slide 1"></button>  
                @endforeach
                @endif
            </div>
            <div class="carousel-inner">
                @if (!$article->images->isEmpty())
                @foreach ($article->images as $image)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <img src="{{$image->getUrl(400, 400)}}" class="d-block w-100 rounded" alt="Immagine3">
                </div>  
                @endforeach
                @else
                
                <div class="carousel-item active">
                    <img src="\img\no-image_2.jpg" class="d-block w-100 rounded" alt="Immagine3">
                </div>
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="col-md-6 mt-5 d-flex flex-column align-items-around justify-content-around">
            <div>
                <span class="background_blue rounded p-1 text-white">{{$article->category->name}}</span>
            </div>
            <h3 class="mt-5">{{ $article->title }}</h3>
            <span>{{ $article->description }}</span>
            <h2 style="color: rgb(0, 167, 0)">€{{$article->price}}</h2>
            <hr class="w-75">
            <h6>Creato il {{$article->created_at->format('d/m/Y')}}, dall'utente <a href="{{route('user.show',['user'=>$article->user])}}">{{$article->user->name}} {{$article->user->surname}}</a></h6>
            <!-- Button trigger modal -->
            @if ($article->user!=Auth::user() && $article->is_accepted === 1)
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Contattami
            </button>
            @endif
            
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Richiesta informazioni</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                Verrà inviata una mail a {{$article->user->name}} {{$article->user->surname}} con i tuoi dati. <br>Verrai contattato direttamente dall'utente tramite email 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                @auth
                    <form action="{{route('article.contact',[$article,Auth::user()])}}" method="POST">
                    @method('POST')
                    @csrf
                    <button type="submit" class="btn btn-outline-success">Contattami</button>
                </form>
                @else
                <a href="{{route('login')}}"><button class="btn btn-outline-success">Accedi</button></a>
                @endauth
                
            </div>
        </div>
    </div>
</div>