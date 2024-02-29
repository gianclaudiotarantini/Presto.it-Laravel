<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\WaterMark;
use App\Models\Article;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArticleEditForm extends Component
{
    use WithFileUploads;

    public $title, $price, $description, $category_id;
    public $images = [];
    public $temporary_images;
    public Article $article;
    public $oldImages= [];


    protected $rules = [
        'title' => 'required|string|max:225|min:5',
        'price' => 'required',
        'description' => 'required|string|max:225|min:5',
        'category_id' => 'integer',
        'temporary_images.*' => 'image|max:3072',
        'images.*' => 'image|max:3072',
    ];
    
    public function mount(){
        $this->title = $this->article->title;
        $this->price = $this->article->price;
        $this->description = $this->article->description;
        $this->category_id = $this->article->category_id;
        $this->oldImages= $this->article->images;

    }

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image|max:3072',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImages($key) {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function removeOldImages($key) {
        if ($this->oldImages->hasAny($key)) {
            $this->oldImages->get($key)->delete();
            $this->oldImages->forget($key);
        }
    }
    
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    
    public function update(){
        $this->validate();
        $this->article->update([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $this->category_id,
        ]);
        
        if(count($this->images)) {
            foreach($this->images as $image) {
                $newFileName = "articles/{$this->article->id}";
                $newImage = $this->article->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 400, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                    new WaterMark($newImage->id)

                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        $this->article->setAccepted(null);
        $this->images=[];
        // session()->flash('article', 'Articolo modificato con successo');
        return redirect(route('user.index',['article'=>$this->article]))->with('article', 'Articolo modificato con successo');
  
        
    }
    
    public function messages(){
        return [
            'title.max' => 'Inserisci massimo 255 caratteri',
            'title.min' => 'Inserisci almeno 5 caratteri',
            'title.required' => 'Nome articolo obbligatorio',
            'price.decimal' => 'Inserire il prezzo con i centesimi',
            'price.required' => 'Prezzo obbligatorio',
            'description.min' => 'Inserisci almeno 5 caratteri',
            'description.max' => 'Inserisci massimo 255 caratteri',
            'description.required' => 'Descizione obbligatoria',
            'description.string' => 'La descrizione deve essere composta di lettere',
            'category_id.integer'=>'Seleziona una categoria',
            'temporary_images.image'=>'Il file deve essere un\'immagine',
            'temporary_images.max'=>'L\'immagine deve essere al massimo di 3 mb'
        ];
    }
    
    public function render()
    {   

        return view('livewire.article-edit-form');
    }
}
