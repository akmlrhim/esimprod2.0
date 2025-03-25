<footer
  class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between p-2 dark:bg-gray-800 dark:border-gray-600">
  <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">&copy; ESIMPROD TVRI KALIMANTAN SELATAN 2024
  </span>
  <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
    <li>
      <a href="{{ asset('storage/uploads/guidebook/' . $file->file) }}" target="_blank"
        class="hover:underline me-4 md:me-6">Panduan
        Admin</a>
    </li>
    <li>
      <a href="#" class="hover:underline me-4 md:me-6">Contact</a>
    </li>
    <li>
      <button data-modal-target="select-modal" data-modal-toggle="select-modal"
        class="hover:underline me-4 md:me-6 block">Credit</button>
    </li>
  </ul>
</footer>

<x-credit-modal></x-credit-modal>
