@extends('layouts.main')

@section('content')
    <div class="card mb-3 mx-auto" style="max-width: 750px;">
        <div class="row g-0">
            <div class="col-md-4">
                @if ($user->avatar)
                    <img src="/uploads/image/{{ $user->avatar }}" class="card-img-top" alt="Avatar User"
                        style="max-width: 200px">
                @else
                    <img src="/uploads/image/default.jpg" class="card-img-top" alt="Avatar User" style="max-width: 200px">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title"><strong>{{ $user->nama }}</strong></h4>
                    <p class="card-text">Usia {{ $user->usia }} Tahun</p>
                    <p class="card-text"><small class="text-muted">Terakhir diperbarui pada:
                            {{ $user->created_at }}</small>
                    </p>

                    <a href="/user" style="text-decoration: none">
                        <-- Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
