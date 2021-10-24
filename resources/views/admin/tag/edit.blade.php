@extends('template_backend.home')
@section('sub-judul', 'Edit Tag')

@section('content')

  @if(count($errors)>0)
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger" role="alert">
        {{ $error }}
      </div>
    @endforeach
  @endif

  

  <form action="{{ route('tag.update', $tags->id) }}" method="POST">
    @csrf
    @method('patch')

    <div class="form-group">
        <label>Tag</label>
        <input type="text" class="form-control" name="name" value="{{ $tags->name }}">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Update Tag</button>

  </form>

@endsection