<footer class="footer mt-5">
    <div class="container">
        <div class="row mb-2">
            <div class="col-3">
                <h5 class="text-center mt-2">Presto.it</h5>
                <ul class="list-group list-group-flush text-center">
                    <li style="list-style-type: none">
                        @auth
                        @if (Auth::user()->is_revisor)
                        <a href="{{route('revisor.list')}}">{{__('ui.revisionaArticoli')}}</a>
                        @else
                        <a href="{{ route('revisor.form') }}">Lavora con noi</a>
                        @endif
                        @else
                        <a href="{{ route('revisor.form') }}">Lavora con noi</a>
                        @endauth
                    </li>
                    <li style="list-style-type: none"><a href="{{route('article.index')}}">{{__('ui.guardaAnnunci')}}</a></li>
                    <li style="list-style-type: none"><a href="{{route('category.index')}}">{{__('ui.guardaCategorie')}}</a></li>
                </ul>
            </div>
            <div class="col-3">
                <h5 class="text-center mt-2">{{__('ui.profilo')}}</h5>
                <ul class="list-group list-group-flush text-center">
                    <li style="list-style-type: none"><a href="{{route('article.create')}}">{{__('ui.inserisciAnnuncio')}}</a></li>
                    <li style="list-style-type: none"><a href="{{route('user.index')}}">{{__('ui.ControllaAnnunci')}}</a></li>
                    @if (Auth::user())
                    <li style="list-style-type: none"><a href="{{route('user.show',['user'=>Auth::user()])}}">{{__('ui.guardaProfilo')}}</a></li> 
                    @else
                    <li style="list-style-type: none"><a href="{{route('login')}}">Entra su Presto</a></li>
                    @endif
                </ul>
            </div>
            <div class="col-3">
                <h5 class="text-center mt-2">{{__('ui.contattaci')}}</h5>
                <ul class="list-group list-group-flush text-center">
                    <li style="list-style-type: none"><a href="https://www.linkedin.com/in/marco-signorile/" target="_blank"><i class="fa-brands fa-linkedin"></i> Signorile Marco</a></li>
                    <li style="list-style-type: none"><a href="https://www.linkedin.com/in/gianclaudio-tarantini/" target="_blank"><i class="fa-brands fa-linkedin"></i> Tarantini Gianclaudio</a></li>
                    <li style="list-style-type: none"><a href="https://www.linkedin.com/in/antonino-torre-dev/" target="_blank"><i class="fa-brands fa-linkedin"></i> Torre Antonino</a></li>
                </ul>
            </div>
            <div class="col-3 " >
                <h5 class="text-center">Lingue</h5>
                <ul class="m-2 text-center list-group list-group-flush">
                    <li style="list-style-type: none">
                        <x-_locale lang="it" nation='it' />
                    </li>
                    <li style="list-style-type: none">
                        <x-_locale lang="es" nation='es' />
                    </li>
                    <li style="list-style-type: none">
                        <x-_locale lang="en" nation='gb' />
                    </li>
                </ul>
            </div>
        </div>   
    </div>
    <div class="text-center mt-3 mb-0" style="font-size: small">&copy; Copyright I Moschettieri Powered Aulab 2023</div>
</div>
