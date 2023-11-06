<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Mail\ContactMail;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {   
        $users=User::all();
        if(Auth::user()){
           $order_desc= Article::where('is_accepted',1)
        ->where('user_id', '!=', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate(6); 
        } else {
            $order_desc= Article::where('is_accepted',1)
        ->orderBy('created_at', 'desc')
        ->paginate(6); 
        }
        
        
        // $order_desc->paginate(6);
        
        return view('article.index',compact('users'),['articles'=>$order_desc]);
    }
    
    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('article.create');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(Article $article)
    {   
        return view('article.show', ['article' => $article]);
    }
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit(Article $article)
    {   
        if(Auth::user()->id != $article->user_id ?? null){
            return abort(401);
        }
        return view('article.edit', ['article'=>$article]);
    }
    
    
    public function destroy(Article $article)
    {
        if(Auth::user()->id=== $article->user->id){
            $article->delete();
            $article->images();

        }else{
            abort(401);
        }
        
        return redirect()->back()->with('article', 'Annuncio eliminato con successo');
    }

    public function articleContact(Article $article,User $user)
    {
        Mail::to($article->user->email)->send(new ContactMail($article,$user));
        return redirect()->back()->with('article', "L'utente {$article->user->name} {$article->user->surname} è stato informato, ti contatterà lui al più presto.");
    }

    public function sellArticle(Article $article) {
        if(Auth::user()->id=== $article->user->id){
            $article->setAccepted(2); 
        }else{
            abort(401);
        }
        
        return redirect()->back()->with('message', 'Complimenti, hai venduto l\'annuncio');
    }
}