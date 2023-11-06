<nav class="navbar navbar-expand-md nav_color shadow_color" style="width:100%">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="/Presto.it.png" alt=""height="40rem"></a>
        <a class="navbar-brand text-white bold" href="{{ route('home') }}">Presto.it</a>
        <button class="navbar-toggler collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
            <div class="navbar-toggler-icon bg-light">
            </div>
        </button>
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav mr-auto mb-0 mb-lg-0">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white bold" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.annunci_nav')}}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('article.create') }}">{{__('ui.crea_annuncio')}}</a></li>
                        <li><a class="dropdown-item " href="{{ route('article.index') }}">{{__('ui.elenco_annunci')}}</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link text-white bold" aria-current="page"
                    href="{{ route('article.index') }}">{{__('ui.annunci_nav')}}</a>
                </li>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.categorie_nav')}}</a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                        <li>             
                            <a class="dropdown-item" href="{{ route('category.show', ['category' => $category]) }}">{{__('ui.Category_'.$category->id)}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @auth
                @if (Auth::user()->is_revisor)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.Revisor')}}
                        @if (app\Models\Article::toBeRevisionedCount() != 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color: #eb6841">{{ app\Models\Article::toBeRevisionedCount() }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('revisor.index') }}">
                                @if (app\Models\Article::toBeRevisionedCount() != 0)
                                {{__('ui.hai')}} {{ app\Models\Article::toBeRevisionedCount() }} {{__('ui.da_revisionare')}}
                                @else
                                {{__('ui.no_articoli_revisor')}}
                                @endif
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('revisor.remake') }}"> {{__('ui.ultimo_revisor')}}</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('revisor.list') }}">{{__('ui.lista_annunci_revisor')}}</a>
                        </li>
                    </ul>
                </li>
                @endif
                @endauth
                <li class="nav-item dropdown mx-3" style="list-style-type: none">
                    <form action="{{ route('search.article') }}" method='GET' class="d-flex align-item-center justify-content-center">
                        <input name="searched" type="search" placeholder="{{__('ui.button_search')}}" id="searched" class="form-control me-1">
                        <button class="btn btn_orange" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </li>
            </ul>
            <div class="d-flex ms-auto">
                <div class="input-group me-3">
                    @auth
                    <li class="nav-item dropdown" style="list-style-type: none">
                        <a class="nav-link dropdown-toggle text-white bold" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.benvenuto_2')}} {{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu">
                            
                            <li><a class="dropdown-item" href="{{ route('user.index') }}">{{__('ui.miei_annunci')}}</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.show', ['user'=>Auth::user()] )}}">{{__('ui.mio_profile')}}</a></li>
                            <li><a class="dropdown-item"
                                href="{{ route('logout') }}"onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{__('ui.esci')}}</a>
                            </li>
                            <form id="form-logout" method="POST" action="{{ route('logout') }}" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item dropdown" style="list-style-type: none">
                        <a class="nav-link dropdown-toggle text-white bold" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.benvenuto')}}</a>
                        <ul class="dropdown-menu ul ">
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{__('ui.registrati')}}</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{__('ui.accedi')}}</a></li>
                        </ul>
                    </li>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
