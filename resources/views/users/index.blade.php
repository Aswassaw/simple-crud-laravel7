@extends('layouts.main')

@section('title', 'All Users')

@section('content')
    <h1>Semua Users</h1>
    <a href="/user/create" class="btn btn-success btn-sm my-2">Tambah</a>

    @if (count($users) > 0)
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($users as $user)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $user->nama }}</strong></h5>
                            <p class="card-text">Usia: {{ $user->usia }} Tahun</p>
                            <hr>
                            {{-- Link --}}
                            <a class="btn btn-primary btn-sm" href="/user/{{ $user->id }}">Detail</a>
                            <a class="btn btn-success btn-sm" href="/user/{{ $user->id }}/edit">Edit</a>
                            <form style="display: inline-block" action="/user/{{ $user->id }}" method="post">
                                @csrf
                                @method("delete")
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah anda yakin?')">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-danger">Tidak ditemukan data, cobalah menambahkan data baru.</div>
    @endif

    <div>
        {{ $users->links() }}
    </div>
@endsection
