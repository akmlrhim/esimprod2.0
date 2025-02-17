<form class="flex items-center w-60 justify-center" action="{{ route('users.role') }}" method="GET">
  <div class="w-full relative flex">
    <select id="role" name="role"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option value="" {{ request('role') == '' ? 'selected' : '' }}>-- Pilih Role --</option>
      @if (Auth::user()->role == 'superadmin')
        <option value="Superadmin" {{ request('role') == 'Superadmin' ? 'selected' : '' }}>Superadmin</option>
      @endif
      <option value="Admin" {{ request('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
      <option value="User" {{ request('role') == 'User' ? 'selected' : '' }}>User</option>
    </select>
    <button
      class="text-white bg-tvri_base_color hover:bg-tvri_base_color focus:outline-none focus:ring-tvri_base_color font-medium rounded-r-lg text-sm px-3 py-2"
      type="submit">Cari</button>
  </div>
</form>
