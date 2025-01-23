<footer
  class="fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 shadow md:flex md:items-center md:justify-between p-2 dark:bg-gray-800 dark:border-gray-600">
  <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">&copy; ESIMPROD TVRI KALIMANTAN SELATAN 2024
  </span>
  <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
    <li>
      <a href="#" class="hover:underline me-4 md:me-6">Panduan Admin</a>
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


<!-- Main modal -->
<div id="select-modal" tabindex="-1" aria-hidden="true"
  class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-xl max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
          Credit
        </h3>
        <button type="button" class="text-gray-400 bg-transparent" data-modal-toggle="select-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-4 md:p-5">
        <!-- <p class="text-gray-500 dark:text-gray-400 mb-4">Select your desired position:</p> -->
        <ul class="space-y-4 mb-4">
          <li>
            <input type="radio" id="job-1" name="job" value="job-1" class="hidden peer" required />
            <label for="job-1"
              class="inline-flex items-center justify-between w-full p-2 text-gray-900 bg-white border border-gray-300 rounded-lg">
              <div class="block">
                <div class="w-full text-lg font-semibold">EXECUTIVE PRODUCER</div>
                <div class="w-full text-gray-600 dark:text-gray-400">Hari Setiya, I Gede Mustito</div>
              </div>
            </label>
          </li>
          <li>
            <input type="radio" id="job-2" name="job" value="job-2" class="hidden peer" required />
            <label for="job-2"
              class="inline-flex items-center justify-between w-full p-2 text-gray-900 bg-white border border-gray-300 rounded-lg">
              <div class="block">
                <div class="w-full text-lg font-semibold">PROJECT LEADER</div>
                <div class="w-full text-gray-600 dark:text-gray-400">Akbar Laksana</div>
              </div>
            </label>
          </li>
          <li>
            <input type="radio" id="job-3" name="job" value="job-3" class="hidden peer" required />
            <label for="job-3"
              class="inline-flex items-center justify-between w-full p-2 text-gray-900 bg-white border border-gray-300 rounded-lg">
              <div class="block">
                <div class="w-full text-lg font-semibold">SYSTEM ANALYST</div>
                <div class="w-full text-gray-600 dark:text-gray-400">Widya Setiyawan, Lilik Susanto, Yusuf Supriyanto,
                  Candra Purnama Tri Mahendra, Akbar Laksana</div>
              </div>
            </label>
          </li>
          <li>
            <input type="radio" id="job-4" name="job" value="job-4" class="hidden peer">
            <label for="job-4"
              class="inline-flex items-center justify-between w-full p-2 text-gray-900 bg-white border border-gray-300 rounded-lg">
              <div class="block">
                <div class="w-full text-lg font-semibold">PROJECT MANAGER</div>
                <div class="w-full text-gray-600 dark:text-gray-400">Akmal Rahim</div>
              </div>
            </label>
          </li>
          <li>
            <input type="radio" id="job-5" name="job" value="job-5" class="hidden peer">
            <label for="job-5"
              class="inline-flex items-center justify-between w-full p-2 text-gray-900 bg-white border border-gray-300 rounded-lg">
              <div class="block">
                <div class="w-full text-lg font-semibold">LEAD PROGRAMMER</div>
                <div class="w-full text-gray-600 dark:text-gray-400">Akmal Rahim</div>
              </div>
            </label>
          </li>
          <li>
            <input type="radio" id="job-6" name="job" value="job-6" class="hidden peer">
            <label for="job-6"
              class="inline-flex items-center justify-between w-full p-2 text-gray-900 bg-white border border-gray-300 rounded-lg">
              <div class="block">
                <div class="w-full text-lg font-semibold">PROGRAMMER</div>
                <div class="w-full text-gray-600 dark:text-gray-400">M. Maireza, Muhammad Ichsan Fadillah</div>
              </div>
            </label>
          </li>
          <li>
            <input type="radio" id="job-7" name="job" value="job-7" class="hidden peer">
            <label for="job-7"
              class="inline-flex items-center justify-between w-full p-2 text-gray-900 bg-white border border-gray-300 rounded-lg">
              <div class="block">
                <div class="w-full text-lg font-semibold">INTERFACE DESIGNER</div>
                <div class="w-full text-gray-600 dark:text-gray-400">M. Eryash Nurhadiarta</div>
              </div>
            </label>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
