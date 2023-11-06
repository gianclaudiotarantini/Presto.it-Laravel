<x-main>
    <h1 class="mt-5 text-center">Modifica il tuo profilo</h1>
    <div class="p-5 container mt-5 shadow_color w-75 text-center">
    <form action="{{route('profile.update', ['user'=>$user->id])}}" method="post" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <div class="mb-3">
            <label for="surname" class="form-label">Modifica il tuo nome</label>
            <input type="form-control" name="name" class="form-control" required type="text" id="name" value="{{$user->name}}"placeholder="Modifica il tuo nome">
            @error('name')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Modifica il tuo cognome</label>
            <input type="form-control" name="surname" class="form-control" required id="surname" value="{{$user->surname}}"placeholder="Modifica il tuo cognome">
            @error('surname')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Inserisci la tua foto</label>
            <input type="file" name="photo" class="form-control" id="photo" value="{{ old('photo') }}"placeholder="Inserisci la tua foto">
            @error('photo')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Inserisci la tua data di nascita</label>
            
            <input type="date" name="birthday" class="form-control" id="birthday" value="{{$user->eta}}"placeholder="Inserisci la tua data di nascita">
            @error('birthday')
            <span class="text-danger">
                {{$message}}
            </span>
            @enderror
        </div>
        <button class="btn btn_orange" type="submit">Modifica profilo</button>
    </form>
    </div>
</x-main>