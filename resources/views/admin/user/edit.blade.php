@extends('template_backend.home')
@section('sub-judul', 'Tambah User')

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

  <form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nama User</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
    </div>

    <div class="form-group">
      <label>Tipe User</label>
      <select class="form-control" name="tipe" >
        <option value="" holder>Pilih Tipe User</option>
        <option value="1" holder 
        @if ($user->tipe == 1)
          selected
        @endif>Administrator</option>
        <option value="0" holder
        @if ($user->tipe == 0)
          selected
        @endif>Penulis</option>
      </select>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="password">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Update User</button>

  </form>

@endsection