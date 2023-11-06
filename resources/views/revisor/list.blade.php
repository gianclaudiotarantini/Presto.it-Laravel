<x-main>
    <h1 class="text-center mt-5">Lista di tutti gli annunci</h1>
    <table class="table border mt-5 w-75 m-auto ">
        <thead>
            <tr>
                <th scope="col">Codice</th>
                <th scope="col">Titolo</th>
                <th scope="col">Data creazione</th>
                <th scope="col">Stato</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articles as $article)
            
            <tr>
                
                <td>{{ $article->id }}</td>
                <td>{{ $article->title}}</td>
                <td>{{ $article->created_at->format('d/m/Y') }} </td>
                <td class="container w-25">
                    <div  class="row">
                        @if ($article->is_accepted===1)
                        <span class="col-5">Accettato</span> <i class="fa-solid fa-circle col-4" style="color: #19d600;"></i>
                        @elseif ($article->is_accepted===0)
                        <span class="col-5">Rifiutato</span> <i class="fa-solid fa-circle col-4" style="color: #c20000;"></i>
                        @else
                        <span class="col-5">In revisione</span> <i class="fa-solid fa-circle col-4" style="color: #f0e400;"></i>
                        @endif   
                    </div>  
                </td>
                <td><a href="{{route('revisor.review',['article'=>$article])}}"><i class="fa-solid fa-eye" style="color: #06145a;"></i></a></td>
            </tr>
            
            @empty
            <tr colspan="4"> </tr>
            @endforelse
        </tbody>
    </table>
    
</x-main>