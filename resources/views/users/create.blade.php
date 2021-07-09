@extends('layouts.main')

@section('content')
    <h1>Create User Baru</h1>

    <div class="card">
        <div class="card-body">
            <form action="/user" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Input Nama --}}
                <div class="form-group my-2">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Input Usia --}}
                <div class="form-group my-2">
                    <label for="usia">Usia</label>
                    <input type="number" class="form-control" name="usia" id="usia" value="{{ old('usia') }}" required>
                    @error('usia')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Input Email --}}
                <div class="form-group my-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
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
                <input type="submit" class="btn btn-primary mt-2" value="Submit">
            </form>
        </div>
    </div>
@endsection
