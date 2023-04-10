<div class="lg:w-1/4 md:w-1/2 p-4 w-full">
  <div class="border border-gray-200 block relative h-48 rounded overflow-hidden">
    <div class="absolute cursor-pointer top-0 right-0 px-2 py-3">
        <div class="mb-1">

        </div>
    </div>

      <img class="object-cover object-center w-full h-full block" src="{{ $product->getImage() }}">

      <div wire:loading.class.remove="hidden" class="hidden flex items-center justify-center backdrop-blur-sm bg-gray-200/50 absolute w-full h-full top-0">
          <svg class="animate-spin ml-1 mr-3 h-7 w-7 text-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
          </svg>
          <span class="text-dark text-sm font-medium">
              درحال بارگذاری ...
          </span>
      </div>

  </div>


