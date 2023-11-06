<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon');
            $table->string('image');
            $table->timestamps();
            
        });
        $categories = [
            [
                'name' => 'Motori',
                'icon' => 'category_img\category_motori.png',
                'image' => 'category_banner\category_motori_banner.jpeg'
            ],[
                'name' => 'Giochi',
                'icon' => 'category_img\category_giochi.png',
                'image' => 'category_banner\category_giochi_banner.jpeg'
            ],[
                'name' => 'Libri',
                'icon' => 'category_img\category_libri.png',
                'image' => 'category_banner\category_libri_banner.jpeg'
            ],[
                'name' => 'Sport',
                'icon' => 'category_img\category_sport.png',
                'image' => 'category_banner\category_sport_banner.jpeg'
            ],[
                'name' => 'Informatica',
                'icon' => 'category_img\category_informatica.png',
                'image' => 'category_banner\category_informatica_banner.jpg'
            ],[
                'name' => 'Telefoni',
                'icon' => 'category_img\category_telefoni.png',
                'image' => 'category_banner\category_telefoni_banner.jpg'
            ],[
                'name' => 'Arredamento esterno',
                'icon' => 'category_img\category_arredamento_esterno.png',
                'image' => 'category_banner\category_arredamento_esterno_banner.jpg' 
            ],[
                'name' => 'Arredamento interno',
                'icon' => 'category_img\category_arredamento_interno.png',
                'image' => 'category_banner\category_arredamento_interno_banner.jpg'
                
            ],[
                'name' => 'Elettrodomestici',
                'icon' => 'category_img\category_elettrodomestici.png',
                'image' => 'category_banner\category_elettrodomestici_banner.jpeg'
            ],[
                'name' => 'Immobili',
                'icon' => 'category_img\category_immobili.png',
                'image' => 'category_banner\category_immobili_banner.jpeg'
            ]
            
        ];
        foreach($categories as $category){
            Category::create([
                'name' => $category['name'],
                'icon' => $category['icon'],
                'image' => $category['image']
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

