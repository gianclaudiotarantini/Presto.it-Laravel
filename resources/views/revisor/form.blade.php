<x-main>
    @if (Auth::user()->is_revisor===1)
    <div class="text-center mt-5">
        <h3>Ciao {{Auth::user()->name}}, sei già un revisore</h3>
        <div>Revisiona qualche articolo</div>
        <a href="{{route('revisor.list')}}"><button class="btn btn_orange mt-3">Vai alla lista</button></a>
    </div>
    
    @else
    <div class="p-5 container mt-5 shadow_color w-75 text-center">
        <form action="{{route('revisor.become')}}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="name" class="form-label">Nome*</label>
                <input type="text" id="name" name="name" placeholder="Nome" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Cognome*</label>
                <input type="text" id="surname" value="{{old('surname')}}" class="form-control @error('surname') is-invalid @enderror" name="surname" placeholder="Cognome">
                @error('surname')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Parlaci di te*</label>
                <input type="text" id="description" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Una breve descrizione">
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Numero di telefono*</label>
                <div class="input-group">
                    <span class="input-group-text" id="phone">+39</span>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{old('phone')}}" placeholder="Numero di telefono">
                </div>
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn_orange">Invia candidatura</button>
        </form>
    </div>
    @endif
</x-main>