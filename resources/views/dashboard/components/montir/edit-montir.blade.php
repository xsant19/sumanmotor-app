@extends('dashboard.layout-dashboard')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Edit Montir</title>
    </head>

    <body>
        <h1>Edit Montir</h1>

        @if ($errors->any())
            <div>
                <strong>Error:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('montirs.update', $montir->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ $montir->nama }}" required>
            </div>

            <div>
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" value="{{ $montir->alamat }}" required>
            </div>

            <div>
                <label for="no_telepon">No Telepon:</label>
                <input type="text" id="no_telepon" name="no_telepon" value="{{ $montir->no_telepon }}" required>
            </div>

            <button type="submit">Update</button>
        </form>
    </body>

    </html>
@endsection
