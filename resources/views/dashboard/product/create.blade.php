@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Item</h1>
</div>

<div class="container">

    <div class="col-lg-5">
        <form method="post" action="/dashboard/posts" enctype="multipart/form-data">
            @csrf
            {{-- Product Name --}}
            <div class="mb-3 col-auto">
              <label for="title" class="form-label">Product Name</label>
              <input type="text" class="form-control @error('title')is-invalid @enderror"
              id="title" name="title" required autofocus value="{{ old('title') }}">
              @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
              <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                  Name must be 5-20 characters long.
                </span>
              </div>
            </div>

            {{-- Product Slug (+) --}}
            <div class="mb-3 col-auto">
              <label for="slug" class="form-label">Product Slug</label>
              <input type="text" class="form-control"
              id="slug" name="slug" required readonly value="{{ old('slug') }}">
              <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                  System Only Auto Generate from Product Name
                </span>
              </div>
            </div>

            {{-- Product Category (+) --}}
            <div class="mb-3 col-auto">
                <label for="category" class="form-label">Product Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        @if ( old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        {{-- Kalo error --}}
                        {{-- <option value="{{ $category->id }}">{{ $category->name }}</option> --}}
                    @endforeach
                </select>
            </div>

            {{-- Product Image --}}
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <img class="img-preview img-fluid mb-2 col-lg-4" alt="">
                <input class="form-control @error('image')is-invalid @enderror"
                type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            {{-- Product Description --}}
            <div class="mb-3 col-auto" >
              <label for="description" class="form-label">Product Description</label>
              <input type="text" class="form-control @error('description')is-invalid @enderror"
              id="description" name="description" required value="{{ old('description') }}">
              @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
              <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                  Description minimum 5 characters long.
                </span>
              </div>
            </div>

            {{-- Product Price --}}
            <div class="mb-3 col-auto">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" class="form-control @error('price')is-invalid @enderror"
                id="price" name="price" required value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                      Price must greater than 1000 .
                    </span>
                </div>
            </div>
            {{-- Product Stock --}}
            <div class="mb-3 col-auto">
                <label for="stock" class="form-label">Product Stock</label>
                <input type="number" class="form-control @error('stock')is-invalid @enderror"
                id="stock" name="stock" value="1" value="{{ old('stock') }}">
                @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        Stock must greater than 1.
                    </span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value).then(
            response => response.json()
        ).then(
            data => slug.value = data.slug
        )
    });

    function previewImage() {
        const image= document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFReader) {
            imgPreview.src = oFReader.target.result;
        }

    }

</script>

@endsection
