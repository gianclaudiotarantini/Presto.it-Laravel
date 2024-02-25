<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\WaterMark;
use App\Models\Article;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Image\Manipulations;

class ArticleCreateForm extends Component
{
    use WithFileUploads;

    public $title, $price, $description, $category_id, $user_id;
    public $images = [];
    public $temporary_images;
    public $article;

    protected $rules = [
        'title' => 'required|string|max:225|min:5',
        'price' => 'required',
        'description' => 'required|string|max:225|min:5',
        'category_id' => 'integer',
        'user_id' => '',
        'temporary_images.*' => 'image|max:3072',
        'images.*' => 'image|max:3072',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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

    public function removeImages($key)
    {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function store()
    {
        $this->validate();
        $article = Article::create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'user_id' => Auth::user()->id,
        ]);
        if (count($this->images)) {
            foreach ($this->images as $image) {
                // $article->images()->create(['path' => $image->store('image', 'public')]);

                

                $newFileName = "articles/{$article->id}";
                $newImage = $article->images()->create(['path' => $image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 400, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                    new WaterMark($newImage->id)

                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        session()->flash('article', 'Articolo aggiunto correttamente');
        $this->reset(['title', 'price', 'description', 'category_id', 'images', 'temporary_images']);
    }

    public function messages()
    {
        return [
            'title.max' => __('ui.title.max'),
            'title.min' => __('ui.title.min'),
            'title.required' => __('ui.title.required'),
            'price.decimal' => 'Inserire il prezzo con i centesimi',
            'price.required' => 'Prezzo obbligatorio',
            'description.min' => 'Inserisci almeno 5 caratteri',
            'description.max' => 'Inserisci massimo 255 caratteri',
            'description.required' => 'Descizione obbligatoria',
            'description.string' => 'La descrizione deve essere composta di lettere',
            'category_id.integer' => 'Seleziona una categoria',
            'temporary_images.image' => 'Il file deve essere un\'immagine',
            'temporary_images.max' => 'L\'immagine deve essere al massimo di 3 mb'
        ];
    }
    public function render()
    {
        return view('livewire.article-create-form');
    }
}
