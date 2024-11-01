@extends('layouts.admin.main')

@section('content')
  <div class="flex flex-col p-3 ml-3 sm:ml-2">
    <div class="text-end mb-1">
      @foreach ($credit as $c)
        <button type="button" data-uuid="{{ $c->uuid }}"
          class="edit-credit text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-bold rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
          <i class="fa-solid fa-pen-to-square mr-2"></i> Edit
        </button>
      @endforeach
    </div>

    {{-- modal --}}
    <div id="edit-credit-modal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50">
      <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl">
          <div class="flex items-center justify-between p-4 border-b">
            <h3 class="text-lg font-semibold text-gray-900">Edit Credit</h3>
            <button type="button" class="text-gray-400 hover:text-gray-900 close-modal">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>

          <div class="p-4">
            <form id="updateForm" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <input type="hidden" id="credit_uuid" name="uuid">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-4">
                  <div>
                    <label for="project_leader" class="block mb-2 text-sm font-medium text-gray-900">Project
                      Leader</label>
                    <input type="text" name="project_leader" id="project_leader"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-red-500 text-sm mt-1" id="error-projectleader"></div>
                  </div>

                  <div>
                    <label for="system_analyst" class="block mb-2 text-sm font-medium text-gray-900">System
                      Analyst</label>
                    <input type="text" name="system_analyst" id="system_analyst"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-red-500 text-sm mt-1" id="error-system_analyst"></div>
                  </div>

                  <div>
                    <label for="frontend_developer" class="block mb-2 text-sm font-medium text-gray-900">Frontend
                      Developer</label>
                    <input type="text" name="frontend_developer" id="frontend_developer"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-red-500 text-sm mt-1" id="error-frontend_developer"></div>
                  </div>
                </div>

                <div class="space-y-4">
                  <div>
                    <label for="backend_developer" class="block mb-2 text-sm font-medium text-gray-900">Backend
                      Developer</label>
                    <input type="text" name="backend_developer" id="backend_developer"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-red-500 text-sm mt-1" id="error-backend_developer"></div>
                  </div>

                  <div>
                    <label for="uiux_designer" class="block mb-2 text-sm font-medium text-gray-900">UI/UX Designer</label>
                    <input type="text" name="uiux_designer" id="uiux_designer"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-red-500 text-sm mt-1" id="error-uiux_designer"></div>
                  </div>

                  <div>
                    <label for="administrator_contact" class="block mb-2 text-sm font-medium text-gray-900">Administrator
                      Contact</label>
                    <input type="text" name="administrator_contact" id="administrator_contact"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-red-500 text-sm mt-1" id="error-administrator_contact"></div>
                  </div>
                </div>
              </div>

              <div class="mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="guidebook">Upload Guidebook</label>
                <input
                  class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                  id="guidebook" name="guidebook" type="file">
                <div class="mt-1 text-sm text-gray-500" id="guidebook_help">Format File: PDF (Max 2MB)</div>
                <div class="text-red-500 text-sm mt-1" id="error-guidebook"></div>
              </div>

              <div class="flex justify-end mt-6">
                <button type="submit"
                  class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
                  Perubahan</button>
                <button type="button"
                  class="ml-2 px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 close-modal">Kembali</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  {{-- data --}}
  <div class="-m-1.5 overflow-x-auto ml-5 mr-3">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="border rounded overflow-hidden dark:border-neutral-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
          <div class="container mx-auto p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              @foreach ($credit as $c)
                <div class="flex flex-col space-y-4">
                  <div>
                    <label class="block text-sm font-bold text-black">Project Leader</label>
                    <input type="text" readonly
                      class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ $c->project_leader }}" />
                  </div>
                  <div>
                    <label class="block text-sm font-bold text-black">System Analyst</label>
                    <input type="text" readonly
                      class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ $c->system_analyst }}" />
                  </div>
                  <div>
                    <label class="block text-sm font-bold text-black">UI/UX Designer</label>
                    <input type="text" readonly
                      class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ $c->uiux_designer }}" />
                  </div>
                  <div>
                    <label class="block text-sm font-bold text-black">Administrator Contact</label>
                    <input type="text" readonly
                      class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ $c->administrator_contact }}" />
                  </div>
                </div>
                <div class="flex flex-col space-y-4">
                  <div>
                    <label class="block text-sm font-bold text-black">Frontend Developer</label>
                    <input type="text" readonly
                      class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ $c->frontend_developer }}" />
                  </div>
                  <div>
                    <label class="block text-sm font-bold text-black">Backend Developer</label>
                    <input type="text" readonly
                      class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                      value="{{ $c->backend_developer }}" />
                  </div>
                  <div>
                    <label class="block text-sm font-bold text-black">Guidebook</label>
                    @if (!empty($c->guidebook))
                      <a href="{{ route('credit.guidebook', $c->uuid) }}"
                        class="inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-white hover:bg-yellow-700 focus:ring focus:ring-yellow-500">
                        <i class="fa-solid fa-eye"></i>
                      </a>
                    @else
                      <span class="text-red-500">Guidebook tidak tersedia.</span>
                    @endif
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const modal = document.getElementById('edit-credit-modal');
      const editButtons = document.querySelectorAll('.edit-credit');
      const closeButtons = document.querySelectorAll('.close-modal');
      const form = document.getElementById('updateForm');

      function displayErrors(errors) {
        Object.keys(errors).forEach(function(field) {
          const errorContainer = document.getElementById(`error-${field}`);
          if (errorContainer) {
            errorContainer.textContent = errors[field][0];
          }
        });
      }

      function clearErrors() {
        const errorFields = document.querySelectorAll('[id^="error-"]');
        errorFields.forEach(function(errorField) {
          errorField.textContent = '';
        });
      }

      // Tombol edit untuk menampilkan modal
      editButtons.forEach(button => {
        button.addEventListener('click', function() {
          const uuid = this.getAttribute('data-uuid');
          fetchCreditData(uuid);
          modal.style.display = 'block';
        });
      });

      closeButtons.forEach(button => {
        button.addEventListener('click', function() {
          modal.style.display = 'none';
          clearErrors();
        });
      });

      function fetchCreditData(uuid) {
        fetch(`/credit/edit/${uuid}`)
          .then(response => response.json())
          .then(data => {
            document.getElementById('credit_uuid').value = uuid;
            form['project_leader'].value = data.project_leader;
            form['system_analyst'].value = data.system_analyst;
            form['frontend_developer'].value = data.frontend_developer;
            form['backend_developer'].value = data.backend_developer;
            form['uiux_designer'].value = data.uiux_designer;
            form['administrator_contact'].value = data.administrator_contact;
          });
      }

      form.addEventListener('submit', function(event) {
        event.preventDefault();
        clearErrors();

        const formData = new FormData(form);
        const uuid = form['credit_uuid'].value;

        fetch(`/credit/update/${uuid}`, {
            method: 'POST',
            body: formData,
            headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
              'Accept': 'application/json',
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              setTimeout(function() {
                location.reload();
              }, 1000);

              clearErrors();
            } else {
              displayErrors(data.errors);
            }
          })
          .catch(error => {
            console.log('An error occurred:', error);
          });
      });
    });
  </script>
@endsection
