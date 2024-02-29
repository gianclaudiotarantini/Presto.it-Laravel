<x-main>
    <h1 class="text-center mt-5 ">{{__('ui.accedilogin')}}</h1>
    <div class="p-5 container mt-5 shadow_color w-75 text-center">
        <form action="{{route('login')}}" method="POST">
            @method('POST')
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                @error('email')
                <span class="text-danger">
                    Email o password sbagliata!
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                <span class="text-danger">
                    Email o password sbagliata!
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn_orange">Accedi</button>
        </form>
        <div class="my-3">
            <span>OPPURE ACCEDI TRAMITE</span>
        </div>
        <a href="{{ route('socialite.login') }}" class="btn btn-dark m-2 "><span>GitHub</span> <i class="fa-brands fa-github"></i></a>
        <a href="{{ route('google.login') }}" class="btn btn-light m-2 "><span>Google</span> <i class="fa-brands fa-google"></i></a>
        <p>Non hai ancora un account? 
            <a href="{{route('register')}}">Registrati qui</a>
        </p>
    </div>
</x-main>