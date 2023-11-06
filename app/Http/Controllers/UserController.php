<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function my_index(){
        if(Auth::user()){
            $articles = Article::where('user_id',Auth::user()->id)->get();
        }else{
            $articles = Article::all();
        }
        return view('user.index',['articles'=>$articles]);
    }

    public function show(User $user) {
        
        $articles = Article::where('is_accepted', true)->where('user_id', $user->id)->get();
        $articleCount = Article::where('is_accepted', true)->where('user_id', $user->id)->count();
        $articleSell = Article::where('is_accepted', 2)->where('user_id', $user->id)->count();
        $totalArticles = $articleCount + $articleSell;
        $birthday = Carbon::parse($user->eta);
        $age = $birthday->diffInYears(Carbon::now());

        
        return view('user.show', compact('user','articles','articleCount','totalArticles', 'age'));
    }

    public function edit(User $user) {
        if(Auth::user()->id=== $user->id) {
           return view('user.edit',['user'=>$user]); 
        } else {
            abort(401);
        }
        
    }

    public function update(Request $request, $user)
{
    $user = User::findOrFail($user); // Recupera l'utente dal database in base all'ID

    $user->name = $request->input('name');
    $user->surname = $request->input('surname');
   // $user->eta = $request->input('eta');
//    $birthday = Carbon::parse($request->input('birthday'));
//     $user->eta = $birthday->diffInYears(Carbon::now());
        $user->eta = $request->input('birthday');
    // Se desideri anche aggiornare la foto dell'utente
    
    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $path_name = $request->file('photo')->getClientOriginalName();
        $path_image = $request->file('photo')->storeAs('public/profile', $path_name);
        
        $user->foto = $path_image;
    }

    $user->save(); // Salva le modifiche nel database

    return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Profilo aggiornato con successo');

}
}