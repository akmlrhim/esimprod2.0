 {{-- Toast Success --}}
 <div id="toast-success-add"
   class="hidden items-center fixed bottom-9 right-5 w-full max-w-xs p-4 mb-4 border border-gray-400 text-gray-600 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
   role="alert">
   <div
     class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
     <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
       <path
         d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
     </svg>
     <span class="sr-only">Check icon</span>
   </div>
   <div class="ms-3 text-sm font-normal"></div>
 </div>


 <!-- Toast Redundant Item -->
 <div id="toast-warning"
   class="hidden items-center fixed bottom-9 right-5 w-full max-w-xs p-4 mb-4 border border-gray-400 text-gray-600 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
   role="alert">
   <div
     class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
     <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
       <path
         d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
     </svg>
     <span class="sr-only">Warning icon</span>
   </div>
   <div class="ms-3 text-sm font-normal"></div>
 </div>

 {{--    <!-- Toast --> --}}
 <div id="toast-danger-2"
   class="hidden items-center fixed top-14 right-5 w-full max-w-xs p-4 mb-4 border border-gray-400 text-gray-600 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
   role="alert">
   <div
     class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-700 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
     <svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
       <path
         d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
     </svg>
     <span class="sr-only">Error icon</span>
   </div>

   <div class="ms-3 text-normal font-normal">?</div>
   <button type="button"
     class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-500 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
     data-dismiss-target="#toast-danger-2" aria-label="Close">
     <span class="sr-only">Close</span>
     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
         d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
     </svg>
   </button>
 </div>


 {{-- Delete Modal Confirmation --}}
 <div id="popup-modal" tabindex="-1"
   class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">
   <div class="relative p-4 w-full max-w-md">
     <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
       <button type="button"
         class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
         data-modal-hide="popup-modal">
         <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
             d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
         </svg>
         <span class="sr-only">Close modal</span>
       </button>
       <div class="p-4 md:p-5 text-center flex flex-col items-center">
         <svg class="mx-auto mb-2 text-gray-400 w-6 h-6 dark:text-gray-200" aria-hidden="true"
           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
             d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
         </svg>
         <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Hapus Barang dari
           Daftar?</h3>
         <input type="hidden" id="modal-uuid">
         <div class="flex justify-center space-x-2 mt-4">
           <button data-modal-hide="popup-modal" type="button" onclick="ModalHandler.confirmDelete()"
             class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
             Ya
           </button>
           <button data-modal-hide="popup-modal" type="button"
             class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
             Tidak
           </button>
         </div>
       </div>
     </div>
   </div>
 </div>

 {{-- Save Modal Confirmation --}}
 <div id="save-modal" tabindex="-1"
   class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-full">
   <div class="relative p-4 w-full max-w-md">
     <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
       <div class="p-4 md:p-5 text-center flex flex-col items-center">
         <svg class="mx-auto mb-2 text-gray-400 w-6 h-6 dark:text-gray-200" aria-hidden="true"
           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
             d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
         </svg>
         <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Simpan Peminjaman
           Ini?</h3>
         <div class="flex justify-center space-x-2 mt-4">
           <button id="saveButton" data-modal-hide="popup-modal" type="button"
             class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
             Simpan
           </button>
           <button data-modal-hide="save-modal" type="button"
             class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
             Tidak
           </button>
         </div>
       </div>
     </div>
   </div>
 </div>

 {{-- Create Borrow Success Modal --}}
 <div id="successModal" tabindex="-1" aria-hidden="true"
   class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-screen bg-black bg-opacity-50">
   <div class="relative p-4 w-full max-w-md bg-white rounded-lg shadow-md dark:bg-gray-800">
     {{-- Modal content --}}
     <div class="text-center">
       <div
         class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 p-2 flex items-center justify-center mx-auto mb-3.5">
         <svg aria-hidden="true" class="w-8 h-8 text-green-500 dark:text-green-400" fill="currentColor"
           viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
           <path fill-rule="evenodd"
             d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
             clip-rule="evenodd"></path>
         </svg>
         <span class="sr-only">Success</span>
       </div>
       <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Peminjaman Berhasil Di Buat</p>
       <button id="successButton" type="button"
         class="py-2 px-3 text-sm font-medium text-white bg-blue-900 hover:bg-blue-700 rounded-lg focus:ring-4 focus:outline-none dark:focus:ring-primary-900">
         OK
       </button>
     </div>
   </div>
 </div>
