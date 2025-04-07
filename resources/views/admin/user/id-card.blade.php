<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ID Card - {{ $user->nama_lengkap }}</title>

  <style>
    @font-face {
      font-family: 'Montserrat-Bold';
      src: url('{{ storage_path('fonts/Montserrat-Bold.ttf') }}') format('truetype');
      font-weight: bold;
      font-style: bold;
    }

    @font-face {
      font-family: 'Montserrat-Medium';
      src: url('{{ storage_path('fonts/Montserrat-Medium.ttf') }}') format('truetype');
      font-weight: normal;
      font-style: normal;
    }

    @font-face {
      font-family: 'Montserrat-Regular';
      src: url('{{ storage_path('fonts/Montserrat-Regular.ttf') }}') format('truetype');
      font-weight: bold;
    }

    body {
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
      background-image: url('{{ public_path('img/assets/access_card_front.png') }}');
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
      margin-top: 150px;
    }

    .photo-qr-code {
      width: 100%;
      height: 100%;
      object-fit: cover;
      margin-top: 170px;
    }

    .photo-qr-code img {
      border: 10px #ffffff solid;
    }

    .details {
      margin-bottom: 100px;
      line-height: 0.2em;
    }

    .qr-code {
      width: 400px;
      height: 600px;
      position: relative;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      background-image: url('{{ public_path('img/assets/access_card_back.png') }}');
      background-size: cover;
      background-position: center;
      border: 1px dashed #000000;
    }

    .page-break {
      page-break-after: always;
    }

    .name-class {
      font-family: 'Montserrat-Bold';
      color: black;
      text-transform: capitalize;
    }

    .nip-class {
      font-family: 'Montserrat-Medium';
      font-size: 16px;
      font-weight: 400;
      color: black;
    }

    .jabatan-class {
      font-size: 12px;
      font-family: 'Montserrat-Bold';
      font-weight: bold;
      color: black;
      text-transform: capitalize;
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
        <div style="margin-top: 240px"></div>
        <h3 class="name-class">{{ $user->nama_lengkap }}</h3>
        <h3 class="nip-class">NIP. {{ $user->nip }}</h3>
        <h3 class="jabatan-class">{{ $user->jabatan->jabatan }}</h3>
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
