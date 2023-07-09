@extends('dashboard.layout-dashboard')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Add Montir</title>
    </head>

    <body>
        <h1>Add Montir</h1>

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

        <form action="{{ route('montirs.store') }}" method="POST">
            @csrf

            <div>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>

            <div>
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" required>
            </div>

            <div>
                <label for="no_telepon">No Telepon:</label>
                <input type="text" id="no_telepon" name="no_telepon" required>
            </div>

            <button type="submit">Save</button>
        </form>
    </body>

    </html>
@endsection
