<x-main>
    <h1 class="text-center m-5">{{__('article.allArticles')}}</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 w-75 m-auto">
        
    @forelse ($articles as $article)
    
        <x-card_article :article="$article"/>
    @empty
    <h3>{{__('article.emptyArticles')}}</h3>
    @endforelse
    </div>
    <div class="text-center m-5 d-flex justify-content-center">{{ $articles->links()}}</div>
</x-main>