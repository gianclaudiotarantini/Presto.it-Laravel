<x-main>
    @if (session('success')) 
    Salvato correttamente
    @endif
    <h1 class="text-center m-4">Le nostre categorie</h1>
    <div class="container text-center">
        <div class="row">
            @foreach($categories as $category)
            <x-card_category :$category/>
            @endforeach
        </div>
    </div>
    
</x-main>