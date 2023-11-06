<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->where('user_id','!=', Auth::user()->id)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function remake(){
        $article_to_check = Article::where('is_accepted', '!=' , null)->orderBy('updated_at','DESC')->where('user_id','!=', Auth::user()->id)->first();
        return view('revisor.remake', compact('article_to_check'));
    }

    public function review(Article $article) {
        $article_to_check = $article;
        return view('revisor.review', compact('article_to_check'));
    }

    public function list() {
        $articles = Article::where('user_id', '!=', Auth::user()->id)->get();
        return view('revisor.list',compact('articles'));
    }

    public function acceptArticle(Article $article) {
        $article->setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti, hai accettato l\'annuncio');
    }

    public function rejectArticle(Article $article) {
        $article->setAccepted(false);
        return redirect()->back()->with('message', 'Complimenti, hai rifiutato l\'annuncio');
    }
    
    public function nullArticle(Article $article) {
        $article->setAccepted(null);
        return redirect()->back()->with('message', 'Hai sospeso l\'annuncio');
    }

    public function formRevisor(){
        return view('revisor.form');
    }

    public function becomeRevisor(Request $request) {
        $user= Auth::user();
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'description' => 'required|string|min:100|max:255',
            'phone' => 'string|size:10',
        ]);
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->description = $request['description'];
        $user->phone = $request['phone'];
        Mail::to('admin@presto.it')->send(new BecomeRevisor($user));
        return redirect('/')->with('message', 'Complimenti! Hai richiesto di diventare revisore!');
    }

    public function makeRevisor(User $user) {
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect ('/')->with('message', 'Complimenti! L\'utente è diventato revisore');
    }
}
