@extends('dashboard.layout-dashboard')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Montirs</title>
    </head>

    <body>
        <h1>Montirs</h1>

        @if ($message = Session::get('success'))
            <p>{{ $message }}</p>
        @endif

        <table>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Action</th>
            </tr>
            @foreach ($montirs as $montir)
                <tr>
                    <td>{{ $montir->nama }}</td>
                    <td>{{ $montir->alamat }}</td>
                    <td>{{ $montir->no_telepon }}</td>
                    <td>
                        <form action="{{ route('montirs.destroy', $montir->id) }}" method="POST">
                            <a href="{{ route('montirs.edit', $montir->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <a href="{{ route('montirs.create') }}">Add Montir</a>
    </body>

    </html>
@endsection
