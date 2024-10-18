@extends('layouts.admin.main')

@section('content')
  <div class="flex flex-col p-3 ml-3 mr-3">
    <div class="text-end mb-3">
      @foreach ($credit as $c)
        <a href="{{ route('credit.edit', $c->uuid) }}"
          class="inline-flex items-center px-4 py-2 text-xs bg-yellow-400 border border-transparent rounded-md font-semibold text-white hover:bg-yellow-700 focus:ring focus:ring-yellow-500">
          <i class="fa-solid fa-pen-to-square mr-3"></i> Edit
        </a>
      @endforeach
    </div>

    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="border rounded overflow-hidden dark:border-neutral-700">


          <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
            <div class="container mx-auto p-4">
              <div class="grid grid-cols-2 gap-4">
                @foreach ($credit as $c)
                  {{-- kiri --}}
                  <div class="flex flex-col space-y-4">
                    <div>
                      <label class="block text-sm font-medium text-black">Project Leader</label>
                      <input type="text" readonly
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                        value="{{ $c->project_leader }}" />
                    </div>

                    <div>
                      <label class="block text-sm font-medium text-black">System Analyst</label>
                      <input type="text" readonly
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                        value="{{ $c->system_analyst }}" />
                    </div>

                    <div>
                      <label class="block text-sm font-medium text-black">UI/UX Designer</label>
                      <input type="text" readonly
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                        value="{{ $c->uiux_designer }}" />
                    </div>

                    <div>
                      <label class="block text-sm font-medium text-black">Guidebook</label>
                      <a href="#"
                        class="inline-flex items-center px-4 py-2 bg-yellow-400 border border-transparent rounded-md font-semibold text-white hover:bg-yellow-700 focus:ring focus:ring-yellow-500"><i
                          class="fa-solid fa-eye"></i></a>
                    </div>
                  </div>


                  {{-- kanan --}}
                  <div class="flex flex-col space-y-4">
                    <div>
                      <label class="block text-sm font-medium text-black">Frontend Developer</label>
                      <input type="text" readonly
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                        value="{{ $c->frontend_developer }}" />
                    </div>

                    <div>
                      <label class="block text-sm font-medium text-black">Backend Developer</label>
                      <input type="text" readonly
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                        value="{{ $c->backend_developer }}" />
                    </div>

                    <div>
                      <label class="block text-sm font-medium text-black">Administrator Contact</label>
                      <input type="text" readonly
                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400"
                        value="{{ $c->administrator_contact }}" />
                    </div>
                  </div>
                @endforeach
              </div>

            </div>

          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
