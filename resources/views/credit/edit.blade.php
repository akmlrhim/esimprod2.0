@extends('layouts.admin.main')

@section('content')
  <div class="flex flex-col p-3 ml-3 mr-3">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="border rounded overflow-hidden dark:border-neutral-700">

          <form action="{{ route('credit.update', $credit->uuid) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-2 ml-3 mt-5 mr-7 text-end">
              <a href="/credit"
                class="text-sm inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 focus:ring focus:ring-gray-500 mr-2">
                <i class="fa-solid fa-arrow-left mr-3"></i> Kembali
              </a>
              <button type="submit"
                class="text-sm inline-flex items-center px-4 py-2 bg-blue-400 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:ring focus:ring-blue-500">
                <i class="fa-solid fa-floppy-disk mr-3"></i> Simpan
              </button>
            </div>

            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
              <div class="container mx-auto p-4">
                <div class="grid grid-cols-2 gap-4">
                  {{-- kiri --}}
                  <div class="flex flex-col space-y-4">
                    <div>
                      <label class="block text-sm font-bold text-black">Project Leader</label>
                      <input type="text"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                        value="{{ $credit->project_leader }}" />
                    </div>

                    <div>
                      <label class="block text-sm font-bold text-black">System Analyst</label>
                      <input type="text"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                        value="{{ $credit->system_analyst }}" />
                    </div>

                    <div>
                      <label class="block text-sm font-bold text-black">UI/UX Designer</label>
                      <input type="text"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                        value="{{ $credit->uiux_designer }}" />
                    </div>

                    <div>
                      <label class="block text-sm font-bold text-black">Guidebook</label>
                      <a href="#"
                        class="inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-white hover:bg-yellow-700 focus:ring focus:ring-yellow-500"><i
                          class="fa-solid fa-eye"></i></a>
                    </div>
                  </div>


                  {{-- kanan --}}
                  <div class="flex flex-col space-y-4">
                    <div>
                      <label class="block text-sm font-bold text-black">Frontend Developer</label>
                      <input type="text"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                        value="{{ $credit->frontend_developer }}" />
                    </div>

                    <div>
                      <label class="block text-sm font-bold text-black">Backend Developer</label>
                      <input type="text"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                        value="{{ $credit->backend_developer }}" />
                    </div>

                    <div>
                      <label class="block text-sm font-bold text-black">Administrator Contact</label>
                      <input type="text"
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                        value="{{ $credit->administrator_contact }}" />
                    </div>
                  </div>
                </div>

              </div>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
