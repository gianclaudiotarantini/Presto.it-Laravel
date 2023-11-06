<nav class="navbar navbar-expand-md nav_color shadow_color" style="width:100%">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}"><img src="/Presto.it_2.jpg" alt=""height="40rem"></a> 
        <a class="navbar-brand text-white bold" href="{{route('home')}}">Presto.it</a>
        <button class="navbar-toggler collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
            <div class="navbar-toggler-icon bg-light">
            </div>
        </button>
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white bold" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">{{__('ui.annunci')}}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('article.create') }}">Crea un annucio</a></li>
                        <li><a class="dropdown-item " href="{{ route('article.index') }}">Elenco annunci</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white bold" aria-current="page" href="{{route('article.index')}}">Annunci</a>
                </li>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white bold" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Categorie</a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item " href="{{ route('category.show', ['category'=>$category]) }}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>   
            </ul>
            <div class="d-flex ms-auto">
                <div class="input-group">
                    @auth
                    <li class="nav-item dropdown" style="list-style-type: none">
                        <a class="nav-link dropdown-toggle text-white bold" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Benvenuto {{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu">
                            @if (Auth::user()->is_revisor)
                            <li><a class="dropdown-item" href="{{route('revisor.index')}}">sei un revisore</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{route('user.index')}}">Miei annunci</a></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}"onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                            <form id="form-logout" method="POST" action="{{ route('logout') }}" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item dropdown " style="list-style-type: none">
                        <a class="nav-link dropdown-toggle text-white bold" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Benvenuto utente</a>
                        <ul class="dropdown-menu ul ">
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                        </ul>
                    </li>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>