<section class="w-75 m-auto my-5">
    <div class="container background_white">
        <div class="row">
            <div class="col-xl-8 col-lg-12 p-0">
                <img src="\img\ecommerce.jpg" alt="" class="img-fluid img-header">
            </div>
            <div class="d-flex flex-column justify-content-center text-center col-xl-4 col-lg-12 p-0 background_blue">
                <span style="font-size: 35px" class="mt-5">
                    <p class=" text-white"> {{__('ui.stanco')}}</p>
                    <p class="fw-bold text-uppercase">presto</p>
                    <p> {{__('ui.new_life')}}</p>
                </span>
                <div class="col-mb-6 d-flex justify-content-center mt-5 ">
                    <button class="btn mb-4 btn_orange">
                        <a href="{{route('article.create')}}" class="color_white">{{__('ui.inserisci_annuncio')}}</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
