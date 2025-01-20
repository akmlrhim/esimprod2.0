@php use Carbon\Carbon; @endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta
    name="csrf-token"
    content="{{ csrf_token() }}"
  >
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
  >
  <title>ESIMPROD | LAPORAN PENGEMBALIAN</title>

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
    }

    h1 {
      margin: 0;
    }

    .logo {
      width: 100px;
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
      <img
        src="{{ asset('img/assets/esimprod_logo.png') }}"
        alt="Logo"
        class="logo"
      >
    </div>
    <div class="above-section">
      <div class="item">
        <h3 style="font-weight: normal;"><strong>No Peminjaman:</strong>
          {{ $pengembalian->peminjaman->nomor_peminjaman }}</h3>
        <h3 style="font-weight: normal;"><strong>Kode Pengembalian:</strong> {{ $pengembalian->kode_pengembalian }}</h3>
      </div>
      <div class="item">
        <h3><strong>Waktu Peminjaman:</strong>
          {{ Carbon::parse($pengembalian->peminjaman->tanggal_peminjaman)->format('d F Y') }}</h3>
        <h3><strong>Waktu
            Pengembalian:</strong>{{ Carbon::parse($pengembalian->tanggal_kembali)->translatedFormat('d F Y') }}
        </h3>
      </div>
    </div>


    <div class="info-section">
      <div class="item">
        <p><strong>Peminjam:</strong> {{ $pengembalian->peminjaman->peminjam }} </p>
        <p><strong>NIP:</strong> {{ Auth::user()->nip }}</p>
        <p><strong>No HP:</strong> {{ Auth::user()->nomor_hp }}</p>
        <p><strong>Jabatan:</strong> {{ Auth::user()->jabatan->jabatan }}</p>
      </div>
      <div class="item">
        <p><strong>Surat Tugas:</strong> {{ $pengembalian->peminjaman->nomor_surat }} </p>
        <p><strong>Peruntukan:</strong> {{ $pengembalian->peminjaman->peruntukan->peruntukan }} </p>
        <p><strong>Tgl
            Penggunaan:</strong>
          {{ Carbon::parse($pengembalian->peminjaman->tanggal_penggunaan)->translatedFormat('d F Y') }}
        </p>
        <p><strong>Sampai:</strong>
          {{ Carbon::parse($pengembalian->peminjaman->tanggal_kembali)->translatedFormat('d F Y') }}
        </p>
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
          <th>Penjelasan</th>
        </tr>
      </thead>
      <tbody>
        {{--      Barang Kembali --}}
        @foreach ($barangKembali as $key => $item)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item['nama_barang'] }}</td>
            <td>{{ $item['merk'] }}</td>
            <td>{{ $item['nomor_seri'] }}</td>
            <td>{{ $item['kondisi'] }}</td>
            <td>
              @if ($item['kondisi'] !== 'baik')
                <input
                  id="barangUUID"
                  type="hidden"
                  class="input-field"
                  value="{{ $item['uuid'] }}"
                >
                <input
                  id="barangDesc"
                  type="text"
                  class="input-field"
                  placeholder="Isi penjelasan!"
                  oninput="validateDescription(this)"
                  oninvalid="this.setCustomValidity('Deskripsi barang harus diisi!')"
                  required
                >
              @else
                <span>-</span> <!-- Tampilkan simbol jika tidak ada kolom input -->
              @endif
            </td>
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
        {{--      Barang Tak Kembali --}}
        @foreach ($barangHilang as $key => $item)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item['nama_barang'] }} </td>
            <td>{{ $item['merk'] }}</td>
            <td>{{ $item['nomor_seri'] }}</td>
            <td>
              <input
                id="barangUUID"
                type="hidden"
                class="input-field"
                value="{{ $item['uuid'] }}"
              >
              <input
                id="barangDesc"
                type="text"
                class="input-field"
                placeholder="Isi penjelasan !"
                oninput="validateDescription(this)"
                oninvalid="this.setCustomValidity('Deskripsi barang harus diisi!')"
                required
              >
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="btn-group">
      <button
        id="printpdf"
        type="button"
        target="_blank"
        class="btn"
      >Download PDF</button>
      <button
        id="clear"
        type="button"
        class="btn"
      >Selesai</button>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const printPdfButton = document.getElementById('printpdf');
      const clearButton = document.getElementById('clear');
      const rows = document.querySelectorAll('tr');
      const inputs = document.querySelectorAll('.input-field');

      inputs.forEach(input => {
        // Periksa apakah input dalam kondisi disabled
        if (input.disabled) {
          input.placeholder = ''; // Hilangkan placeholder jika disabled
        }
      });

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
                    console.log('Data Barang Tak Kembali:', this.lostItemsArray); //Debug
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
            const itemRows = document.querySelectorAll('#barangDesc');

            // If no lost item rows exist, return true
            if (itemRows.length === 0) {
              return true;
            }

            let isValid = true;
            itemRows.forEach(barangDescInput => {
              if (!this.validateInput(barangDescInput)) {
                isValid = false;
              }
            });
            return isValid;
          }

          validateItems() {
            const itemRows = document.querySelectorAll('#barangDesc');

            // If no lost item rows, consider it a valid scenario
            if (itemRows.length === 0) {
              return true;
            }

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
          // If no inputs exist for lost items, proceed directly
          const itemRows = document.querySelectorAll('#barangDesc');
          console.log(itemRows); //Debug
          if (itemRows.length === 0) {
            this.redirectBasedOnRoute(redirect_route);
            return;
          }

          if (!this.validateAllInputs()) {
            return;
          }

          if (!this.validateItems()) {
            return;
          }

          try {
            // If there are no lost items, send an empty array
            const dataToSend = this.lostItemsArray.length > 0 ? {
              barang: this.lostItemsArray
            } : {
              barang: []
            };

            const response = await fetch('update_desc', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
              },
              body: JSON.stringify(dataToSend)
            });

            if (!response.ok) {
              throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const responseData = await response.json();
            console.log('Response from server:', responseData);

            this.redirectBasedOnRoute(redirect_route);

          } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
          }
        }

        redirectBasedOnRoute(redirect_route) {
          if (redirect_route === 'printpdf') {
            window.location.href = "{{ route('user.pengembalian.pdf') }}";
          } else if (redirect_route === 'clear') {
            window.location.href = "{{ route('user.option') }}";
          }
        }

        resetData() {
          const itemRows = document.querySelectorAll('#barangDesc');
          itemRows.forEach(barangDescInput => {
            barangDescInput.value = '';
            barangDescInput.classList.remove('is-invalid');
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
        clearButton.addEventListener('click', () => {
          lostItemManager.sendToAPI('clear');
        });
      }
    });
  </script>
</body>

</html>
