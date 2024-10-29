<!DOCTYPE html>
<html lang="en">

<head>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('fa/css/all.min.css') }}">
    <link
      rel="https://cdn.rawgit.com/mfd/f3d96ec7f0e8f034cc22ea73b3797b59/raw/856f1dbb8d807aabceb80b6d4f94b464df461b3e/gotham.css">
    <link href="https://db.onlinewebfonts.com/c/7dd5f4bf5d38875ca1822a830b6e6fe4?family=Aptos" rel="stylesheet">
    <title>Laravel</title>
  </head>
</head>

<body class="bg-gray-50 dark:bg-neutral-900">

  <div class="min-h-screen flex flex-col bg-blue-900 text-black">
    <!-- Navbar -->
    <nav class="bg-blue-700 p-4">
      <h1 class="text-xl font-bold">ESIMPRO D - Version 2.0</h1>
    </nav>

    <!-- Main Content Wrapper -->
    <div class="flex flex-1">
      <!-- Sidebar -->
      <aside class="w-64 bg-blue-800 p-4">
        <ul>
          <li><a href="#" class="block p-2 hover:bg-blue-600">Dashboard</a></li>
          <li><a href="#" class="block p-2 hover:bg-blue-600">Form Peminjaman</a></li>
          <li><a href="#" class="block p-2 hover:bg-blue-600">Other Menu</a></li>
        </ul>
      </aside>

      <!-- Form Content -->
      <div class="flex-1 p-8">
        <h2 class="text-2xl mb-6">Form Peminjaman</h2>

        <!-- User Info Section -->
        <div class="grid grid-cols-2 text-dark gap-4 mb-6">
          <div>
            <p>Peminjam: <strong>Akbar Laksana</strong></p>
            <p>NIP: <strong>199004232022031007</strong></p>
            <p>No HP: <strong>085386612234</strong></p>
            <p>Jabatan: <strong>Teknisi Siaran</strong></p>
          </div>
          <div>
            <label for="surat-tugas" class="block">Surat Tugas:</label>
            <input id="surat-tugas" type="text" class="border border-gray-300 p-2 w-full mb-2">

            <label for="peruntukan" class="block">Peruntukan:</label>
            <select id="peruntukan" class="border border-gray-300 p-2 w-full mb-2">
              <option>Choose</option>
            </select>

            <label for="tgl-penggunaan" class="block">Tgl Penggunaan:</label>
            <input id="tgl-penggunaan" type="date" class="border border-gray-300 p-2 w-full mb-2">

            <label for="sampai" class="block">Sampai:</label>
            <input id="sampai" type="date" class="border border-gray-300 p-2 w-full">
          </div>
        </div>

        <!-- Table Section -->
        <table class="w-full bg-blue-700 text-dark mb-6">
          <thead>
            <tr class="bg-blue-800">
              <th class="p-2">NO</th>
              <th class="p-2">Nama Barang</th>
              <th class="p-2">Merk</th>
              <th class="p-2">No Seri</th>
              <th class="p-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Add rows dynamically in actual implementation -->
            <tr>
              <td class="p-2">1</td>
              <td class="p-2">Laptop</td>
              <td class="p-2">Dell</td>
              <td class="p-2">12345</td>
              <td class="p-2">
                <button class="bg-blue-500 hover:bg-blue-600 p-1 rounded">Edit</button>
                <button class="bg-red-500 hover:bg-red-600 p-1 rounded">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>

        <!-- Buttons Section -->
        <div class="flex justify-end">
          <button class="bg-gray-500 hover:bg-gray-600 p-2 rounded mx-2">Kembali</button>
          <button class="bg-blue-600 hover:bg-blue-700 p-2 rounded">Selesai</button>
        </div>
      </div>
    </div>
  </div>


</body>

</html>