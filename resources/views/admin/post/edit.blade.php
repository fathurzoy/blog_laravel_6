@extends('template_backend.home')
@section('sub-judul', 'Edit Post')

@section('content')

  @if(count($errors)>0)
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
    @endforeach
  @endif

  @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
  @endif

  <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control" name="judul" value="{{ $post->judul }}">
    </div>
    <div class="form-group">
      <label>Pilih Tags</label>
      <select class="form-control select2" multiple="" name="tags[]">
          @foreach($tags as $tag)
            
          <option value="{{ $tag->id }}"
            @foreach ($post->tags as $value)
              @if ($tag->id == $value->id)
              selected
              @endif
            @endforeach
            >{{ $tag->name }}</option> 
          @endforeach
      </select>
  </div>
    <div class="form-group">
      <label>Kategori</label>
      <select class="form-control" name="category_id">
        <option value="" holder>Pilih Kategori</option>
        @foreach ($category as $result)
          <option value="{{ $result->id }}"
            @if ($result->id == $post->category_id)
              selected
            @endif
            >{{ $result->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Konten</label>
      <textarea class="form-control" name="content" id="content">{{ $post->content }}</textarea>
    </div>
    <div class="form-group">
      <label>Thumbnail</label>
      <input type="file" class="form-control" name="gambar" value="{{ $post->gambar }}">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Update Post</button>

  </form>

  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( 'content' );
  </script>
@endsection