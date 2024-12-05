@php use Carbon\Carbon; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESIMPROD | LAPORAN PENGEMBALIAN</title>
  <!-- QRCode.js CDN -->

  <style>
  body {
    font-family: Arial, sans-serif;
  }

  .container {
    width: 93%;
    margin: auto;
    padding: 10px;
  }

  .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    /* Pushes h1 and logo to opposite ends */
    /* border-bottom: 2px solid #dd3333;
                  padding-bottom: 10px; */
  }

  h1 {
    margin: 0;
    /* font-size: 24px; */
  }

  /* Style for the logo */
  .logo {
    width: 100px;
    /* Adjust the width as needed */
    height: auto;
  }

  .info-section {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    margin-top: 20px;
    margin-bottom: 20px;
  }
  .above-section {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    margin-top: 20px;
  }


  table {
    width: 100%;
    border-collapse: collapse;
  }

  table th,
  table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
  }

  table th {
    background-color: #3251ad;
    color: white;
  }

  table .blm {
    background-color: #e26a2c;
    color: white;
  }

  .btn-group {
    margin-top: 30px;
    text-align: center;
  }

  .btn {
    background-color: #1e3164;
    border: none;
    color: white;
    padding: 10px 20px;
    margin: 5px;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
  }

  .btn:hover {
    transition-duration: 0.5s;
    background-color: #3251ad;
  }

  input {
    outline: none;
    border: none;
    box-sizing: border-box;
    position: relative;
    /* z-index: 1; */
    width: 100%;
  }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1>Daftar Barang Kembali</h1>
      <img src="img/assets/esimprod_logo.png" alt="Logo" class="logo">
    </div>
    <div class="above-section">
        <div class="item">
            <h3 style="font-weight: normal;"><strong>No Peminjaman:</strong> {{ $pengembalian->peminjaman->nomor_peminjaman }}</h3>
            <h3 style="font-weight: normal;"><strong>Kode Pengembalian:</strong> {{ $pengembalian->kode_pengembalian }}</h3>
        </div>
        <div class="item">
            <h3><strong>Waktu Peminjaman:</strong> {{ Carbon::parse($pengembalian->peminjaman->tanggal_peminjaman)->format('d F Y') }}</h3>
            <h3><strong>Waktu Pengembalian:</strong>{{ Carbon::parse($pengembalian->tanggal_kembali)->format('d F Y') }}</h3>
        </div>
    </div>


    <div class="info-section">
      <div class="item">
        <p><strong>Peminjam:</strong> {{ $pengembalian->peminjaman->peminjam }} </p>
        <p><strong>NIP:</strong> 199004232022031007</p>
        <p><strong>No HP:</strong> 085386612234</p>
        <p><strong>Jabatan:</strong> Teknisi Siaran</p>
      </div>
      <div class="item">
        <p><strong>Surat Tugas:</strong> {{ $pengembalian->peminjaman->nomor_surat }} </p>
        <p><strong>Peruntukan:</strong> {{$pengembalian->peminjaman->peruntukan->peruntukan }} </p>
        <p><strong>Tgl
            Penggunaan:</strong> {{ Carbon::parse($pengembalian->peminjaman->tanggal_penggunaan)->format('d F Y') }}
        </p>
        <p><strong>Sampai:</strong> {{ Carbon::parse($pengembalian->peminjaman->tanggal_kembali)->format('d F Y') }} </p>
      </div>
    </div>

    <table>
      <thead>
        <tr>
          <th>NO</th>
          <th>Nama Barang</th>
          <th>Merk</th>
          <th>No Seri</th>
          <th>Kondisi</th>
        </tr>
      </thead>
      <tbody>
{{--      Barang Kembali--}}
        @foreach($barangKembali as $key => $item)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $item['nama_barang'] }} </td>
          <td>{{ $item['merk'] }}</td>
          <td>{{ $item['nomor_seri'] }}</td>
          <td>{{ $item['kondisi'] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <p>Barang belum dikembalikan</p>

    <table>
      <thead>
        <tr>
          <th class="blm">NO</th>
          <th class="blm">Nama Barang</th>
          <th class="blm">Merk</th>
          <th class="blm">No Seri</th>
          <th class="blm">Penjelasan</th>
        </tr>
      </thead>
      <tbody>
{{--      Barang Tak Kembali--}}
        @foreach($barangHilang as $key => $item)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $item['nama_barang'] }} </td>
          <td>{{ $item['merk'] }}</td>
          <td>{{ $item['nomor_seri'] }}</td>
          <td>
              <input id="barangUUID" type="hidden" class="input-field" value="{{ $item['uuid'] }}">
              <input id="barangDesc"
               type="text"
               class="input-field"
               placeholder="Hayoo mana barangnya???"
               oninput="validateDescription(this)"
               oninvalid="this.setCustomValidity('Deskripsi barang harus diisi!')"
               required>
{{--                <div class="invalid-feedback">Deskripsi barang tidak boleh kosong</div>--}}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="btn-group">
      <button id="printpdf" type="button" class="btn">Download PDF</button>
      <button id="clear" type="button" class="btn">Selesai</button>
    </div>
  </div>
  <!-- Pastikan QRCode.js sudah disertakan sebelum skrip ini -->
  <script>
        document.addEventListener('DOMContentLoaded', function() {
        const printPdfButton = document.getElementById('printpdf');
        const clearButton = document.getElementById('clear');
        const rows = document.querySelectorAll('tr');

        class LostItemManager {
            lostItemsArray;
            constructor() {
                this.lostItemsArray = [];
                this.initializeValidation();
            }

            initializeValidation() {
                rows.forEach(row => {
                    const uuid = row.querySelector('#barangUUID');
                    const barangDescInput = row.querySelector('#barangDesc');

                    if (barangDescInput) {
                        // Event listeners for validation
                        barangDescInput.addEventListener('input', () => this.validateInput(barangDescInput));
                        barangDescInput.addEventListener('blur', () => this.validateInput(barangDescInput));

                        // Event listener for item addition
                        barangDescInput.addEventListener('change', () => {
                            if (this.validateInput(barangDescInput)) {
                                const itemDescription = barangDescInput.value.trim();
                                const lostItem = {
                                    uuid: uuid.value,
                                    description: itemDescription
                                };

                                this.addOrUpdateItem(lostItem);
                                console.log('Data Barang Tak Kembali:', this.lostItemsArray);
                            }
                        });
                    }
                });
            }

            validateInput(input) {
                const itemDescription = input.value.trim();
                const isValid = itemDescription !== '';

                // Toggle validation classes
                input.classList.toggle('is-invalid', !isValid);

                if (!isValid) {
                    input.setCustomValidity('Deskripsi barang harus diisi!');
                    input.reportValidity();
                } else {
                    input.setCustomValidity('');
                }

                return isValid;
            }

            addOrUpdateItem(item) {
                const existingItemIndex = this.lostItemsArray.findIndex(
                    existing => existing.uuid === item.uuid
                );

                if (existingItemIndex !== -1) {
                    this.lostItemsArray[existingItemIndex] = item;
                } else {
                    this.lostItemsArray.push(item);
                }
            }

            validateAllInputs() {
                let isValid = true;
                rows.forEach(row => {
                    const barangDescInput = row.querySelector('#barangDesc');
                    if (barangDescInput) {
                        if (!this.validateInput(barangDescInput)) {
                            isValid = false;
                        }
                    }
                });
                return isValid;
            }

            validateItems() {
                if (this.lostItemsArray.length === 0) {
                    alert('Tidak ada barang hilang yang diinput!');
                    return false;
                }

                const invalidItems = this.lostItemsArray.filter(item => !item.description);
                if (invalidItems.length > 0) {
                    alert('Harap lengkapi deskripsi untuk semua barang!');
                    return false;
                }

                return true;
            }

            async sendToAPI(redirect_route) {
                if (!this.validateAllInputs()) {
                    return;
                }

                if (!this.validateItems()) {
                    return;
                }

                try {
                    const response = await fetch('update_desc', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        barang: this.lostItemsArray
                    }) // Mengonversi data ke JSON
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                // Tangkap respons dari server
                const responseData = await response.json();
                console.log('Response from server:', responseData);
                if(response.ok) {
                    if (redirect_route === 'printpdf') {
                        // Redirect ke route 'user.pengembalian.pdf'
                        window.location.href = "{{ route('user.pengembalian.pdf') }}";
                    } else if (redirect_route === 'clear') {
                        // Redirect ke route 'user.option'
                        window.location.href = "{{ route('user.option') }}";
                    }
                }

                } catch (error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan: ' + error.message);
                }
            }

            resetData() {
                rows.forEach(row => {
                    const barangDescInput = row.querySelector('#barangDesc');
                    if (barangDescInput) {
                        barangDescInput.value = '';
                        barangDescInput.classList.remove('is-invalid');
                    }
                });
                this.lostItemsArray.length = 0;
            }
        }

        const lostItemManager = new LostItemManager();

        if (printPdfButton) {
            printPdfButton.addEventListener('click', () =>
                lostItemManager.sendToAPI('printpdf')
            );
        }

        if (clearButton) {
            clearButton.addEventListener('click', () =>
                lostItemManager.sendToAPI('clear')
            );
        }
    });
    </script>
</body>

</html>
