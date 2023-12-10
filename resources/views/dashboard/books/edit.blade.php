@extends('dashboard.layouts.main')

@section('content')
  <form action="{{ url('/dashboard/books/'.$book->id) }}" method="POST" enctype="multipart/form-data" class="w-full flex flex-col text-black p-4 gap-6" >
    @csrf
    @method('put')
    <span class="w-fit font-bold text-2xl p-2 border-b-2 border-b-cream-primary text-blue-primary self-center lg:self-start">Masukkan Data Buku</span>
    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-4">
      <div class="w-full flex flex-col gap-4">
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Judul Buku</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('name') is-invalid @enderror">
              <input type="text" placeholder="Masukkan Judul Buku" class="w-full outline-none" name="title" id="title" required value="{{ old('title', $book->title) }}">
          </div>
          @error('title')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <input type="hidden" name="slug" id="slug" value="{{ old('slug', $book->slug) }}" hidden>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Klasifikasi Buku</span>
            <select name="classification_id" id="classification_id" class="outline-none bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('classification_id') is-invalid @enderror">
              <option value="0" disabled selected>Pilih Klasifikasi Buku</option>
              @foreach ($classifications as $classification)
              @if (old('classification_id', $book->classification_id) == $classification->id)
                <option value="{{ $classification->id }}" selected>{{ $classification->name }}</option>
              @else
                <option value="{{ $classification->id }}">{{ $classification->name }}</option>
              @endif
              @endforeach
            </select>
            @error('classification_id')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Jenis Buku</span>
            <select name="type_id" id="type_id" class="outline-none bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('type_id') is-invalid @enderror">
              <option value="0" disabled selected>Pilih Jenis Buku</option>
              @foreach ($types as $type)
              @if (old('type_id', $book->type_id) == $type->id)
                <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
              @else
                <option value="{{ $type->id }}">{{ $type->name }}</option>
              @endif
              @endforeach
            </select>
            @error('type_id')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col gap-1">
          <span class="text-base font-semibold">Genre Buku</span>
          <div class="w-full grid grid-cols-2 gap-1 bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('categories') is-invalid @enderror" id="category_checkbox_wrapper">
            @foreach ($categories as $category)
            <div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
              <input
                class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                type="checkbox"
                value="{{ $category->id }}"
                name="categories[]"
                id="category_{{ $category->name }}" 
                @if(is_array(old('categories')) && in_array($category->id, old('categories')) || $book->categories->contains($category->id)) checked @endif/>
              <label
                class="inline-block pl-[0.15rem] hover:cursor-pointer"
                for="category_{{ $category->name }}">
                {{ $category->name }}
              </label>
            </div>
            @endforeach
          </div>
            @error('categories')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Penulis Buku</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('author') is-invalid @enderror">
              <input type="text" placeholder="Masukkan Penulis Buku" class="w-full outline-none" name="author" required value="{{ old('author', $book->author) }}">
          </div>
          @error('author')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Penerbit Buku</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('publisher') is-invalid @enderror">
              <input type="text" placeholder="Masukkan Penerbit Buku" class="w-full outline-none" name="publisher" required value="{{ old('publisher', $book->publisher) }}">
          </div>
          @error('publisher')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Tahun Terbit Buku</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('publication_year') is-invalid @enderror">
              <input type="text" placeholder="Masukkan Tahun Terbit Buku" class="w-full outline-none" name="publication_year" maxlength="4" required value="{{ old('publication_year', $book->publication_year) }}">
          </div>
          @error('publication_year')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">ISBN Buku</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('isbn') is-invalid @enderror">
              <input type="text" placeholder="Masukkan ISBN Buku" class="w-full outline-none" name="isbn" required value="{{ old('isbn', $book->isbn) }}">
          </div>
          @error('isbn')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Status Buku</span>
            <select name="status" id="status" class="outline-none bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('status') is-invalid @enderror">
              @if (old('status', $book->status) == 1)
                <option value="1" selected>Ready</option>
                <option value="0">Not Ready</option>
              @else
                <option value="1">Ready</option>
                <option value="0" selected>Not Ready</option>
              @endif
            </select>
            @error('status')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Bentuk Buku</span>
            <select name="ebook" id="ebook" class="outline-none bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('ebook') is-invalid @enderror">
              @if (old('ebook', $book->ebook) == 0)
                <option value="0" selected>Fisik</option>
                <option value="1">Ebook</option>
              @else
                <option value="0">Fisik</option>
                <option value="1" selected>Ebook</option>
              @endif
            </select>
            @error('ebook')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
      </div>
      <div class="w-full flex flex-col gap-4">
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Cover Buku</span>
          <input type="hidden" name="oldImage" value="{{ $book->image }}">
          <div class="flex flex-col gap-2 bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('image') is-invalid @enderror">
            <input type="file" class="w-full outline-none" name="image" id="image" onchange="previewImage()">
            @if ($book->image)
              <img src="{{ asset('storage/'.$book->image) }}" alt="" id="imagePreview" class="h-[35vh] self-center">
            @else
              <img src="" alt="" id="imagePreview" class="h-[35vh] self-center">
            @endif
          </div>
          @error('image')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Deskripsi Buku</span>
            <textarea name="description" id="description" class="w-full h-48 outline-none bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md" placeholder="Masukkan Deskripsi Buku" value="{{ old('description', $book->description) }}">{{ old('description', $book->description) }}</textarea>
            @error('description')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="{{ $book->ebook == 0 ? 'hidden' : '' }} flex flex-col gap-0.5" id="link">
          <span class="text-base font-semibold">Link Ebook (Jika Ada)</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('isbn') is-invalid @enderror">
              <input type="text" placeholder="https://" class="w-full outline-none" name="link_ebook" value="{{ old('link_ebook', $book->link_ebook) }}">
          </div>
          @error('link_ebook')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
      </div>
      </div>
      <button type="submit" class="self-end bg-orange-primary text-white py-2 px-8 text-lg font-semibold rounded-full">Edit</button>
    </form>
@endsection

@section('script')
  <script>
    function previewImage() {
        const preview = document.getElementById('imagePreview');
        const fileInput = document.getElementById('image');
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

    const classificationSelect = document.getElementById('classification_id');

    classificationSelect.addEventListener('change', async function () {
      let uid = this.value;
      const typeSelect = document.getElementById('type_id');
      const categoryWrapper = document.getElementById('category_checkbox_wrapper');
      await fetch(`/dashboard/books/add/classification?uid=${uid}`).then(response => response.json()).then(response => {
        const types = response.data;
        let optionTypes = '';
        types.forEach(type => {
          optionTypes += `<option value="${type.id}">${type.name}</option>`
        });
        typeSelect.disabled = false;
        typeSelect.innerHTML = optionTypes;
      });
      await fetch(`/dashboard/books/add/categories?uid=${uid}`).then(response => response.json()).then(response => {
        const categories = response.data;
        let checkboxCategories = '';
        categories.forEach(category => {
          checkboxCategories += `<div class="mb-[0.125rem] block min-h-[1.5rem] pl-[1.5rem]">
            <input
              class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
              type="checkbox"
              value="${category.id}"
              name="categories[]"
              id="category_${category.name}" />
            <label
              class="inline-block pl-[0.15rem] hover:cursor-pointer"
              for="category_${category.name}">
              ${category.name}
            </label>
          </div>`
        });
        categoryWrapper.innerHTML = checkboxCategories;
      });
    });

    const title = document.getElementById('title')
    const slug = document.getElementById('slug')

    title.addEventListener('input', async function() {
      await fetch('/dashboard/books/add/checkSlug?title=' + title.value).then(response => response.json()).then(data => slug.value = data.slug);
    });
  </script>
@endsection