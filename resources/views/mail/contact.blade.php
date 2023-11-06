<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources\css\app.css', 'resources\js\app.js'])
  </head>
  <body>
    <nav style="height: 50px; background-color: #06145a" class="d-flex justify-content-center align-items-center">
      <img src="http://127.0.0.1:8000/Presto.it.png" alt="Logo" height="40rem" class="me-3">
      <a href="{{route('home')}}"><h2 class="m-auto text-white">Presto.it</h2></a>
      <div></div>
    </nav>

    <div class="text-center m-5">
        <h1>Ciao {{$article->user->name}},</h1>
        <p>l'utente {{$user->name}} è interessato all'articolo " {{$article->title}} ".
        <p>Ecco la sua email : {{$user->email}} .</p>
        <p>Ti invitiamo a contattarlo appena possibile.</p>
    </div>

    <footer style="background-color: #06145a" class="text-white fixed-bottom">
      <div class="row mb-2">
        <div class="col-6">
          <p class="text-center mt-2">Profilo</p>
          <ul class="list-group list-group-flush text-center">
            <li style="list-style-type: none"><a href="{{route('article.create')}}">Inserisci annuncio</a></li>
            <li style="list-style-type: none"><a href="{{route('user.index')}}">Controlla i tuoi annunci</a></li>
            <li style="list-style-type: none"><a href="{{route('user.show',['user'=>$article->user])}}">Guarda il tuo profilo</a></li>
          </ul>
        </div>
        <div class="col-6">
          <p class="text-center mt-2">Contattaci</p>
          <ul class="list-group list-group-flush text-center">
            <li style="list-style-type: none"><a href="https://www.linkedin.com/in/marco-signorile/"><i class="fa-brands fa-linkedin"></i> Signorile Marco</a></li>
            <li style="list-style-type: none"><a href="https://www.linkedin.com/in/gianclaudio-tarantini-882325176/"><i class="fa-brands fa-linkedin"></i> Tarantini Gianclaudio</a></li>
            <li style="list-style-type: none"><a href="https://www.linkedin.com/in/antonino-torre-dev/"><i class="fa-brands fa-linkedin"></i> Torre Antonino</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </body>
</html>