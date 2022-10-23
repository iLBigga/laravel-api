@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
          <h2>Modifica post</h2>
            <form action="{{ route('admin.posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label for="titile">Titolo</label>
                  <input type="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $post->title) }}" placeholder="Inserisci titolo" name="title">
                  @error('title')
                    <div id="title" class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="category">Categoria</label>
                  <select name="category_id" class="custom-select @error('category_id') is-invalid @enderror" >
                    <option value="">-- nessuna --</option>
                    @foreach($categories as $category)
                      <option @if(old('category_id',$post->category_id) === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                  <small id="helpCategory" class="form-text text-muted">Seleziona la categoria</small>
                  @error('category_id')
                    <div id="category" class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                
                <div class="form-group">
                    <label for="content">Contenuto</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="20" placeholder="Contenuto del post">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                    <div id="content" class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
              </form>
        </div>
    </div>
</div>
    
@endsection