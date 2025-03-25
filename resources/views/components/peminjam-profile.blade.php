<div class="w-full p-4 text-center bg-white rounded-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
  <div class="flex flex-col items-center pb-1">
    <img class="w-20 h-20 mb-3 rounded-full p-2 shadow-lg"
      src="{{ Auth::user()->foto ? asset('storage/uploads/foto_user/' . Auth::user()->foto) : Avatar::create(Auth::user()->nama_lengkap)->toBase64() }}" />
    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ Auth::user()->nama_lengkap }}</h5>
    <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->nip }}</span>
    <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->jabatan->jabatan }}</span>
    <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->nomor_hp }}</span>
  </div>
</div
