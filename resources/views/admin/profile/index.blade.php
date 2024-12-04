@extends('layouts.admin.main')

@section('content')
  <div class="flex mr-3 ml-3 p-3">
    <a href="{{ route('profil.ubah-profil') }}"
      class="bg-yellow-500 hover:bg-yellow-400 text-white py-1 px-4 rounded-md mr-2 text-sm">Ubah Profil</a>
    <a href="{{ route('profil.ubah-password') }}"
      class="bg-blue-700 hover:bg-blue-400 text-white py-1 px-4 rounded-md text-sm">Ubah Password</a>
  </div>


  <div class="flex flex-wrap lg:flex-nowrap justify-center gap-6 p-6">
    <div class="w-full lg:w-1/2">
      <div class="flex flex-col items-center py-6 px-6">
        <img class="w-32 h-32 rounded-full shadow-lg border-4 border-gray-200"
          src="{{ asset('storage/uploads/foto_user/' . Auth::user()->foto) }}" alt="User Profile Picture">
        <h3 class="mt-4 text-lg font-bold text-gray-900">{{ Auth::user()->nama_lengkap }}</h3>
        <p class="text-sm text-gray-500 mb-6">{{ Auth::user()->jabatan->jabatan }}</p>
        <div class="w-full">
          <h4 class="text-md font-semibold text-gray-800 mb-3">Data User</h4>
          <ul class="space-y-4">
            <li class="flex justify-between text-md border-b border-gray-200 pb-2">
              <span class="font-medium text-gray-600">Email</span>
              <span class="text-gray-800">{{ Auth::user()->email }}</span>
            </li>
            <li class="flex justify-between text-md border-b border-gray-200 pb-2">
              <span class="font-medium text-gray-600">NIP</span>
              <span class="text-gray-800">{{ Auth::user()->nip }}</span>
            </li>
            <li class="flex justify-between text-md border-b border-gray-200 pb-2">
              <span class="font-medium text-gray-600">Nomor HP</span>
              <span class="text-gray-800">{{ Auth::user()->nomor_hp }}</span>
            </li>
            <li class="flex justify-between text-md border-b border-gray-200 pb-2">
              <span class="font-medium text-gray-600">Role</span>
              <span class="text-gray-800">
                {!! Auth::user()->role == 'superadmin'
                    ? '<span class="inline-block px-2 py-1 text-sm font-semibold text-white bg-red-600 rounded-full">Superadmin</span>'
                    : (Auth::user()->role == 'admin'
                        ? '<span class="inline-block px-2 py-1 text-sm font-semibold text-white bg-blue-600 rounded-full">Admin</span>'
                        : '<span class="inline-block px-2 py-1 text-sm font-semibold text-white bg-green-600 rounded-full">User</span>') !!}
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    const togglePasswordVisibility = (passwordId, toggleId) => {
      const passwordInput = document.getElementById(passwordId);
      const toggleIcon = document.getElementById(toggleId).querySelector('i');

      document.getElementById(toggleId).addEventListener('click', () => {
        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          toggleIcon.classList.remove('fa-eye');
          toggleIcon.classList.add('fa-eye-slash');
        } else {
          passwordInput.type = 'password';
          toggleIcon.classList.remove('fa-eye-slash');
          toggleIcon.classList.add('fa-eye');
        }
      });
    }

    togglePasswordVisibility('current_password', 'toggle-current-password');
    togglePasswordVisibility('new_password', 'toggle-new-password');
    togglePasswordVisibility('confirm_password', 'toggle-confirm-password');
  </script>
@endsection
