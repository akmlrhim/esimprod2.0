<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ID Card - {{ $user->kode_user }}</title>

  <style>
    @font-face {
      font-family: 'Poppins';
      src: url('{{ storage_path('fonts/Poppins-Bold.ttf') }}') format('truetype');
      font-weight: bold;
      font-style: bold;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin-left: 100px;
    }

    .id-card {
      width: 400px;
      height: 600px;
      position: relative;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      background-image: url('{{ public_path('img/assets/main-id-card-bg.png') }}');
      background-size: cover;
      background-position: center;
      border: 1px dashed #000000;
    }

    .content {
      padding: 20px;
      text-align: center;
    }

    .photo {
      width: 120px;
      height: 120px;
      border-radius: 10px;
      margin: 0 auto 50px auto;
    }

    .photo img {
      width: 220px;
      height: 250px;
      object-fit: cover;
      margin-top: 120px;
    }

    .photo-qr-code {
      width: 100%;
      height: 100%;
      object-fit: cover;
      margin-top: 190px;
    }

    .photo-qr-code img {
      border: 10px #ffffff solid;
    }

    .details {
      margin-bottom: 100px;
    }

    .qr-code {
      width: 400px;
      height: 600px;
      position: relative;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      background-image: url('{{ public_path('img/assets/qr-code-bg.png') }}');
      background-size: cover;
      background-position: center;
      border: 1px dashed #000000;
    }

    .compact {
      line-height: 0.6em;
      margin: 5px 0;
    }

    .page-break {
      page-break-after: always;
    }
  </style>
</head>

<body>
  <div class="id-card">
    <div class="content">
      <div class="photo">
        <img
          src="{{ $user->foto ? public_path('storage/uploads/foto_user/' . $user->foto) : public_path('storage/uploads/foto_user/default.jpeg') }}"
          alt="Foto Profil" />
      </div>
      <div class="details">
        <div style="margin-top: 210px"></div>
        <h3 style="color: white; text-transform: uppercase;">
          {{ $user->nama_lengkap }}
        </h3>
        <h4 class="compact">{{ $user->jabatan->jabatan }}</h4>
      </div>
    </div>
  </div>

  <div class="page-break"></div>

  <div class="qr-code">
    <div class="content">
      <div class="photo-qr-code">
        <img src="{{ public_path('storage/uploads/qr_codes_user/' . $user->qr_code) }}" alt="Foto Profil" />
      </div>
    </div>
  </div>

</body>

</html>
