@extends('layouts.admin.main')
@section('content')
<h1>Data Table</h1>
    <table id="dataTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kode</th>
            </tr>
        </thead>
        <tbody>
            @php( $i = 0)
            @for($i; $i < 11; $i++)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ "Nama . $i" }}</td>
                <td>{{ "Kode . $i" }}</td>
            </tr>
            @endfor
        </tbody>
    </table>

    <a href="{{ route('export.pdf') }}">Export to PDF</a>
  @endsection
