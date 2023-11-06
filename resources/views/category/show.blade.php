<x-main>
    <h1 class="text-center mt-5">{{$category['name']}}</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4 w-75 m-auto mt-3" >
        @forelse ($category->articles as $article)
        <x-card_article :article="$article"/>
        @empty
        <div class="text-center m-auto mt-3">
            <h5 class="mt-2 mb-4">{{__('article.emptyArticles')}}</h5>
            <div>
                <a href="{{route('article.create')}}">
                    <button class="btn btn_orange">Crea tu il primo</button>
                </a>
            </div>
        </div>
        @endforelse
    </div>
</x-main>