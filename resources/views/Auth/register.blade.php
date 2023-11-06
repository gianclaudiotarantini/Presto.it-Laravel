<x-main>
    <h1 class="text-center mt-5">Registrati</h1>
    <div class="p-5 container mt-5 shadow_color w-75 text-center">
        <form action="{{route('register')}}" method="POST">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome utente</label>
                <input type="text" name="name" class="form-control" id="name" required value="{{ old('name') }}"placeholder="Inserisci nome utente">
                @error('name')
                <span class="text-danger">
                    Nome obbligatorio!
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Cognome utente</label>
                <input type="text" name="surname" class="form-control" id="surname" value="{{ old('surname') }}"placeholder="Inserisci cognome utente">
                @error('name')
                <span class="text-danger">
                    Cognome obbligatorio!
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email utente</label>
                <input type="email" name="email" class="form-control" id="email" required value="{{ old('email') }}"
                placeholder="Inserisci la tua email">
                @error('email')
                <span class="text-danger">
                    Email obbligatoria!
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Inserisci la tua data di nascita</label>
                <input type="date" name="birthday" class="form-control" id="birthday" value="{{ old('birthday') }}" placeholder="Inserisci la data di nascita">
                @error('birthday')
                <span class="text-danger">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Inserisci la password">
                @error('password')
                <span class="text-danger">
                    Password obbligatoria!
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Conferma password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Conferma la password">
            </div>
            <button type="submit" class="btn btn_orange">Registrati</button>
        </form>
        <p>Hai già un account? 
            <a href="{{route('login')}}">Accedi qui</a>
        </p>
    </div>
</x-main>
