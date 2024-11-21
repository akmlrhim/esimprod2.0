<aside id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 transition-transform -translate-x-full bg-tvri_base_color sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700 shadow-xl"
  aria-label="Sidebar">
  <div class="h-full px-3 pb-4 bg-tvri_base_color dark:bg-gray-800">
    <ul class="space-y-2 font-medium font-sans">

      <div class="flex items-center my-2">
        <small class="mx-2 text-white opacity-65">GENERAL</small>
        <hr class="h-px flex-grow bg-gray-200 border-0 opacity-20">
      </div>

      <li>
        <a href="{{ route('dashboard.index') }}"
          class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-tvri_base_color dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-house"></i>
          <span class="ms-3">Dashboard</span>
        </a>
      </li>


      {{-- dropdown sidebar  --}}
      <li>
        <button type="button"
          class="flex items-center w-full p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-tvri_base_color dark:hover:bg-gray-700"
          aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
          <i class="fa-solid fa-database"></i>
          <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Data Master</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 4 4 4-4" />
          </svg>
        </button>
        <ul id="dropdown-example" class="hidden py-2">
          <li>
            <a href="{{ route('barang.index') }}"
              class="flex items-center w-full p-1 text-white transition duration-75 rounded-lg pl-9 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700  hover:text-tvri_base_color">
              Barang</a>
          </li>
          <li>
            <a href="{{ route('jenis-barang.index') }}"
              class="flex items-center w-full p-1 text-white transition duration-75 rounded-lg pl-9 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700  hover:text-tvri_base_color">Jenis
              Barang</a>
          </li>
          <li>
            <a href="{{ route('peruntukan.index') }}"
              class="flex items-center w-full p-1 text-white transition duration-75 rounded-lg pl-9 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700  hover:text-tvri_base_color">Peruntukan</a>
          </li>
          <li>
            <a href="{{ route('jabatan.index') }}"
              class="flex items-center w-full p-1 text-white transition duration-75 rounded-lg pl-9 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700  hover:text-tvri_base_color">Jabatan</a>
          </li>
        </ul>
      </li>

      <div class="flex items-center my-2">
        <small class="mx-2 text-white opacity-65">BARANG</small>
        <hr class="h-px flex-grow bg-gray-200 border-0 opacity-20">
      </div>

      <li>
        <a href="{{ route('peminjaman.index') }}"
          class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-tvri_base_color dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-paper-plane"></i>
          <span class="ms-3">Data Peminjaman</span>
        </a>
      </li>

      <li>
        <a href="{{ route('perawatan.index') }}"
          class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-tvri_base_color dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-screwdriver-wrench"></i>
          <span class="ms-3">Data Perawatan</span>
        </a>
      </li>

      <div class="flex items-center my-2">
        <small class="mx-2 text-white opacity-65">USER</small>
        <hr class="h-px flex-grow bg-gray-200 border-0 opacity-20">
      </div>

      <li>
        <a href="{{ route('users.index') }}"
          class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-tvri_base_color dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-user"></i>
          <span class="ms-3">Data User</span>
        </a>
      </li>

      <li>
        <a href="#"
          class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-tvri_base_color dark:hover:bg-gray-700 group"
          onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
          <i class="fa-solid fa-sign-out"></i>
          <span class="ms-3">Logout</span>
        </a>

        <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">
          @csrf
        </form>
      </li>

    </ul>
  </div>
</aside>
