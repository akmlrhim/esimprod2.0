<div class="p-3 mt-12">
  <nav class="flex justify-between items-center px-3 py-3 " aria-label="Breadcrumb">
    <!-- Left side with larger title -->
    <div class="text-3xl font-bold text-tvri_base_color dark:text-white">
      {{ $title }}
    </div>

    <!-- Right side with Home/$title -->
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <li class="inline-flex items-center">
        <a href="{{ route('dashboard.index') }}"
          class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-tvri_base_color dark:text-gray-400 dark:hover:text-white">
          Home
        </a>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          /
          <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $title }}</span>
        </div>
      </li>
    </ol>
  </nav>
</div>
