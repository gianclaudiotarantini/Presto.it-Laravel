<div>
    <h1 class="text-center mt-5">{{ __('article.titolo_crea_annunci') }}</h1>
    <div class="p-5 container mt-5 shadow_color w-75 text-center">
        <form wire:submit.prevent="store">
            @if (session()->has('article'))
                @php
                    return redirect()->route('user.index')->with('article', session()->pull('article'));
                @endphp
            @endif
            <div class="mb-3">
                <label for="title" class="form-label">{{ __('ui.titolo_annuncio') }}</label>
                <input type="text" id="title" wire:model="title"
                    placeholder={{ __('ui.titolo_annuncio_place_older') }} value="{{ old('title') }}"
                    class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">{{ __('ui.prezzo_annuncio') }}</label>
                <input type="number" min="0"step="0.01" id="price" value="{{ old('price') }}"
                    class="form-control @error('price') is-invalid @enderror" wire:model="price" placeholder="€ 0.00">
                @error('price')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">{{ __('ui.descrizione_annuncio') }}</label>
                <input type="text" id="description" value="{{ old('description') }}"
                    class="form-control @error('description') is-invalid @enderror" wire:model="description"
                    placeholder={{ __('ui.descrizione_annuncio_place_older') }}>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">{{ __('ui.categoria_annuncio') }}</label>
                <select class="form-select mb-3 capitalize @error('category_id') is-invalid @enderror"
                    aria-label="Default select example" id="category_id" wire:model="category_id">
                    <option selected>{{ __('ui.seleziona_categoria_annuncio') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="capitalize">
                            {{ __('ui.Category_' . $category->id) }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">Scegliere una categoria</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Inserisci delle foto dell'articolo</label>
                <input wire:model="temporary_images" type="file" name="images" multiple
                    class="form-control @error('temporary_images') is-invalid @enderror" id="temporary_images"
                    placeholder="Img">
                @error('temporary_images')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @if (!empty($images))
                <div class="row my-5">
                    <div class="col-12">
                        <p>Anteprima delle foto</p>
                        <div class="row">
                            @foreach ($images as $key => $image)
                                <div class="col my-2">
                                    <div class="mx-auto my-2 rounded img-preview"
                                        style="background-image: url({{ $image->temporaryUrl() }})"></div>
                                    <button type="button" class="btn btn_orange"
                                        wire:click="removeImages({{ $key }})">Cancella</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <button type="submit" class="btn btn_orange" wire:loading.remove>Crea</button>
            <button class="btn btn_red"wire:loading wire:target="temporary_images" disabled>Uploading...</button>
        </form>
    </div>
</div>
