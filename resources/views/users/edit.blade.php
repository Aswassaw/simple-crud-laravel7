@extends('layouts.main')

@section('content')
    <h1>Edit Artikel Id: {{ $user->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="/user/{{ $user->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- Input Nama --}}
                <div class="form-group my-2">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama"
                        value="{{ old('nama') ? old('nama') : $user->nama }}" required>
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Input Usia --}}
                <div class="form-group my-2">
                    <label for="usia">Usia</label>
                    <input type="number" class="form-control" name="usia" id="usia"
                        value="{{ old('usia') ? old('usia') : $user->usia }}" required>
                    @error('usia')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Input Email --}}
                <div class="form-group my-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="{{ old('email') ? old('email') : $user->email }}" required>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Input Avatar --}}
                <div class="form-group my-2">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                    @error('avatar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Preview Avatar Sebelumnya --}}
                @if ($user->avatar)
                    <img src="/uploads/image/{{ $user->avatar }}" width="150" alt="Current Avatar Preview">
                    <br>
                @endif
                <input type="submit" class="btn btn-primary mt-2" value="Submit">
            </form>
        </div>
    </div>
@endsection
