<x-main>
    <div class="container mt-5">
        <div class="row">
            <section class="col-12 col-md-4">
                <div class="shadow_color m-md-5 mb-3 p-3 w-100">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if ($user->foto)
                    <div class="d-flex justify-content-center" >
                        <img class="img-fluid m-auto " style="max-height: 300px" src="{{ Storage::url($user->foto) }}"
                        alt="Foto profilo">
                    </div>
                    @else
                    <img class="img-fluid" src="{{ asset('img/place_holder_.png') }}" alt="Foto profilo">
                    @endif
                    
                    <h3 class="mt-2" style="color: #06145a">{{ $user->name }} {{ $user->surname }}</h3>
                    @if ($age > 0)
                       <p><strong>Età:</strong> {{ $age }}</p> 
                    @endif
                    
                    @if ($user->id === Auth::user()->id)
                    <a href="{{ route('user.edit', ['user' => $user]) }}"><button
                        class="btn btn_orange">Modifica</button></a>
                        @endif
                        
                        
                        <div class="">Membro dal {{ $user->created_at->format('m/Y') }}</div>
                        <hr class="">
                        <div class="mt-2">Al momento ha <b>{{ $articleCount }}</b> annunci online</div>
                        <div class="mt-3 mb-3">Ha pubblicato <b>{{ $totalArticles }}</b> annunci in totale</div>
                    </div>
                </section>
                <div class="col-md-1 col-12"></div>
                <section class="col-12 col-md-7">
                    <ul class="list-group">
                        @forelse ($articles as $article)
                        <li style="list-style-type: none">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <a href="{{ route('article.show', ['article' => $article]) }}">
                                            <img src="{{ $article->images()->get()->isEmpty()? '\img\no-image_2.jpg': $article->images()->first()->getUrl(400,300) }}"
                                            class="img-fluid rounded-start" alt="article-photo">
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body h-100 d-flex flex-column justify-content-between">
                                            <div>
                                                <a href="{{ route('article.show', ['article' => $article]) }}">
                                                    <h4 class="card-title mb-3">{{ $article->title }}</h4>
                                                </a>
                                                <p class="card-text" style="color: rgb(0, 167, 0)">
                                                    €{{ $article->price }}</p>
                                                </div>
                                                <p class="card-text"><small class="text-body-secondary">Aggiunto il
                                                    {{ $article->created_at->format('d/m/Y') }}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <h3 class="text-center mt-5">Nessun annuncio online</h3>  
                                
                                @endforelse
                            </ul> 
                        </section>
                    </div>
                </div>
            </x-main>
            