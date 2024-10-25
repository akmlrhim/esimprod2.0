<!DOCTYPE html>
<html>
<head>
    <title>Data Table PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Data Table</h1>
    <table>
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
</body>
</html>
