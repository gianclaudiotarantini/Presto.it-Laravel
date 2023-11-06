<div class="w-50 m-auto shadow_color rounded sticky_nav position_sticky mb-5 z-3">
    <form action="{{route('article.search')}}" method="POST" class="mt-5 ">
        @method('POST')
        @csrf
        <div class="container background_white rounded p-3 background_blue">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="col-12 text-center">
                        <label for="search_article" class="form-label text-center font_size_big">{{__('ui.header_search')}}</label>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <input type="search" placeholder="{{__('ui.search_placeholder')}}" id="search_article" name="search_article" class="rounded form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="col-12 text-center">
                        <label for="search_category" class="form-label font_size_big">{{(__('ui.header_search_category'))}}</label>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <select name="search_category" id="search_category" class="form-select form-select-sm">
                            <option value="" selected>{{__('ui.search_placeholder_category')}}</option>
                            @foreach ($categories as $category)
                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="col-12 text-center">
                        <label for="search_article" class="form-label text-center font_size_big">{{__('ui.prezzo')}}</label>
                    </div>
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <input type="number" placeholder="{{__('ui.prezzo_min')}}" id="price-min" name="price_min" class="rounded form-control form-control-sm col-12 col-md-5 w-50 me-2">
                        <input type="number" placeholder="{{__('ui.prezzo_max')}}" id="price-max" name="price_max" class="rounded form-control form-control-sm col-12 col-md-5 w-50">
                    </div>
                </div>
                <div class="col-md-1 col-12  d-flex align-items-center justify-content-center">
                        <button class="btn btn_orange" type="submit" style='width: 100px; height: 40px;'><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>