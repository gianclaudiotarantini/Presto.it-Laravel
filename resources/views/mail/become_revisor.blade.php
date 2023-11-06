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
        <h1>Nuova richiesta</h1>
        <p>L'utente {{$user->name}} {{$user->surname}}  
        <p>Telefono : +39 {{$user->phone}}</p> 
        <p>Email : {{$user->email}}</p>
        <p>Ha richiesto di diventare un Revisor di Presto.it</p>
        <p>Ecco una sua breve descrizione:</p>
        <p> {{$user->description}}</p> 
        <a href="{{route('revisor.make',compact('user'))}}"  class="btn btn_orange">Accetta come Revisore</a>   
    </div>
  </body>
</html>
