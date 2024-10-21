@extends('layouts.admin.main')
@section('content')
  <div class="flex flex-col p-3 ml-3">
    @if ($fileUrl)
      <embed src="{{ $fileUrl }}" type="application/pdf" width="100%" height="600px">
    @else
      <div class="alert alert-warning">
        File tidak ditemukan.
      </div>
    @endif
  </div>
@endsection
