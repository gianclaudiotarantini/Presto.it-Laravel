<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class PageController extends Controller
{
    public function home(){
        $hobbies= Category::take(4)->get();
        $houses= Category::orderBy('id', 'desc')->take(4)->get();
        $telephone= Category::where('name', 'Telefoni')->get();
        $computer= Category::where('name', 'Informatica')->get();
        return view('home', compact('hobbies', 'houses', 'telephone', 'computer'));
    }
    
    public function searchArticle (Request $request) {
        
        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(6);
        
        return view('article.index', compact('articles'));
    }
    
    public function search(Request $request){
        
        $priceMin= $request->price_min ? $request->price_min : 0;
        $priceMax= $request->price_max ? $request->price_max : PHP_INT_MAX;
        if($request->search_category){
            if (Auth::user()){
                $articles = Article::where('category_id', $request->search_category)
            ->where('title','like','%' . $request->search_article .'%')
            ->where('price', '>=', $priceMin)
            ->where('price', '<=', $priceMax)
            ->where('is_accepted', true)
            ->where('user_id', '!=', Auth::user()->id)
            ->paginate(6);
            } else {
                $articles = Article::where('category_id', $request->search_category)
            ->where('title','like','%' . $request->search_article .'%')
            ->where('price', '>=', $priceMin)
            ->where('price', '<=', $priceMax)
            ->where('is_accepted', true)
            ->paginate(6);
            }
            
        }  else {
            if (Auth::user()){
                $articles = Article::where('title','like','%' . $request->search_article .'%')
            ->where('price', '>=', $priceMin)
            ->where('price', '<=', $priceMax)
            ->where('is_accepted', true)
            ->where('user_id', '!=', Auth::user()->id)
            ->paginate(6);
            } else {
                $articles = Article::where('title','like','%' . $request->search_article .'%')
            ->where('price', '>=', $priceMin)
            ->where('price', '<=', $priceMax)
            ->where('is_accepted', true)
            ->paginate(6);
            }
        }
        
        
        
        return view('article.index',['articles'=>$articles]);
        
    }
    
    public function setLanguage($lang) {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
