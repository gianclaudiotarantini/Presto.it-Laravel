<x-main>
    @if (session()->has('article'))
<div class="alert alert-success text-center mt-3">
    {{ session('article') }}
</div>
@endif

<div id="success-message" style="display: none;">
    {{ session('article') }}
</div>

<div id="success-message" style="display: none;">
    {{ session('success') }}
</div> 
    <h1 class="mt-5 text-center"> I miei articoli online</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 w-75 mt-5 m-auto">
        @foreach($articles as $article)
        @if ($article->is_accepted===1)
        <x-card_article :$article/>
        @endif 
        @endforeach
    </div>
    <h1 class="mt-5 text-center"> I miei articoli in revisione</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 w-75 mt-5 m-auto">
        @foreach($articles as $article)
        @if ($article->is_accepted=== null)
        <x-card_article :$article/>
        @endif 
        @endforeach
    </div>
    <h1 class="mt-5 text-center"> I miei articoli venduti</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 w-75 mt-5 m-auto">
        @foreach($articles as $article)
        @if ($article->is_accepted=== 2)
        <x-card_article :$article/>
        @endif 
        @endforeach
    </div>
    <h1 class="mt-5 text-center"> I miei articoli rifiutati</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 w-75 mt-5 m-auto">
        @foreach($articles as $article)
        @if ($article->is_accepted===0)
        <x-card_article :$article/>
        @endif 
        @endforeach
    </div>
</x-main>