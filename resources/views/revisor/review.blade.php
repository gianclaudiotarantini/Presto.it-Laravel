<x-main>
    <div>
        <h1 class="mt-5 text-center">
            {{ $article_to_check ? "Ecco l'annuncio selezionato" : 'Non ci sono annunci da revisionare' }}
        </h1>
    </div>
    @if (session()->has('message'))
    <h5 class="alert alert-success w-25 mt-3 m-auto text-center">
        {{ session('message') }}
    </h5>
    @endif
    @if ($article_to_check && Auth::user()->id != $article_to_check->user->id)
    
            <x-carouselRevisor :article="$article_to_check" />
            
    <div class="container">
        <div class="row">
            <div class="col-md-4 mt-5 d-flex align-item-center justify-content-center">
                <form action="{{ route('revisor.accept_article', ['article' => $article_to_check]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success shadow"> <i class="fa-solid fa-check" style="color: #ffffff;"></i> Accetta</button>
                </form>
            </div>
            <div class="col-md-4 mt-5 d-flex align-item-center justify-content-center">
                <form action="{{ route('revisor.null_article', ['article' => $article_to_check]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-secondary shadow"> <i class="fa-solid fa-pause" style="color: #ffffff;"></i> Sospendi</button>
                </form>
            </div>
            <div class="col-md-4 mt-5 d-flex align-item-center justify-content-center">
                <form action="{{ route('revisor.reject_article', ['article' => $article_to_check]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-danger shadow"> <i class="fa-solid fa-xmark" style="color: #ffffff;"></i> Rifiuta</button>
                </form>
            </div>
        </div>
    </div>
    @else
    <div>Non puoi revisionare un articolo creato da te!</div>
    @endif
</x-main>