<x-main>
    
    @if (session()->has('access.denied'))
    <div class="alert alert-danger text-center mt-3">
        {{ session('access.denied') }}
    </div>
    @endif
    
    @if (session()->has('message'))
    <div class="alert alert-success text-center mt-3">
        {{ session('message') }}
    </div>
    @endif
    
    <x-form_ricerca />
    
    <x-header />
    <h2 class="text-center" style="color: #06145a">Per il tuo tempo libero</h2>
    <div class="w-75 container mt-3 mb-4">
        <div class="row">
            @foreach ($hobbies as $category)
            <x-card_home_category :category="$category" /> 
            @endforeach
        </div>
    </div>
    
    
    @foreach ($telephone as $telephone)
    <section class="w-75 m-auto my-5 border shadow_color">
        <div class="row">
            <div class="col-12 col-md-8"><img src={{$telephone->image ?? 'ciao'}} alt="Telefonia" class="img-fluid"></div>
            <div class="col-12 col-md-4 d-flex flex-column justify-content-center text-center fs-4">
                <p>Dai nuova vita alla tecnologia</p>
                <p>Acquista i nostri telefoni usati,</p>
                <p>qualità senza compromessi!</p>
                <a href="{{route('category.show',['category'=>$telephone])}}"><button class="btn btn_orange mb-2">Vai</button></a> 
            </div>
        </div>
    </section>  
    @endforeach
    
    @foreach ($computer as $computer)
    <section class="w-75 m-auto my-5 border shadow_color">
        <div class="row">
            <div class="col-12 col-md-4 d-flex flex-column justify-content-center text-center fs-4">
                <p>Per gli appassionati di gaming,</p>
                <p>guarda i nostri articoli in infomatica</p>
                <a href="{{route('category.show',['category'=>$computer])}}"><button class="btn btn_orange mb-2">Vai</button></a> 
            </div>
            <div class="col-12 col-md-8"><img src={{$computer->image}} alt="Telefonia" class="img-fluid"></div>
        </div>
    </section>  
    @endforeach
    
    
    <h2 class="text-center" style="color: #06145a">Per la tua casa</h2>
    <div class="w-75 container mt-3 mb-4">
        <div class="row">
            @foreach ($houses as $category)
            <x-card_home_category :category="$category" /> 
            @endforeach
        </div> 
    </div>
    
</x-main>