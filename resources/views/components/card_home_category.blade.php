<figure class="card card-1 m-auto shadow_color col-5 col-md-2 mb-md-0 mb-2">
    <a href="{{route('category.show',['category'=>$category])}}">
        <div class="zoom-img h-100 w-100">
            <img src={{$category->image}} class="img-fluid hofame" alt="">
        </div>
        <figcaption class="bold fame"><h4 class="text-wrap">{{$category->name}}</h4></figcaption>
    </a>
</figure>
