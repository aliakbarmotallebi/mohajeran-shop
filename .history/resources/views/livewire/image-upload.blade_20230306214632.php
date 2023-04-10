<div class="lg:w-1/4 md:w-1/2 p-4 w-full">
  <div class="border border-gray-200 block relative h-48 rounded overflow-hidden">
    <div class="absolute cursor-pointer top-0 right-0 px-2 py-3">
        <div class="mb-1">
            <label class="block hover:bg-transparent bg-theme-light-gray border border-theme-light-gray text-black rounded w-6 h-6 flex justify-center items-center cursor-pointer">
              <span role="img" aria-label="edit">
                  <svg
                  aria-hidden="true"
                  data-icon="upload"
                  fill="currentColor"
                  focusable="false"
                  height="1em"
                  viewBox="64 64 896 896"
                  width="1em"
                >
                  <path
                    d="M400 317.7h73.9V656c0 4.4 3.6 8 8 8h60c4.4 0 8-3.6 8-8V317.7H624c6.7 0 10.4-7.7 6.3-12.9L518.3 163a8 8 0 00-12.6 0l-112 141.7c-4.1 5.3-.4 13 6.3 13zM878 626h-60c-4.4 0-8 3.6-8 8v154H214V634c0-4.4-3.6-8-8-8h-60c-4.4 0-8 3.6-8 8v198c0 17.7 14.3 32 32 32h684c17.7 0 32-14.3 32-32V634c0-4.4-3.6-8-8-8z"
                  />
                </svg>
              </span>
              <input type="file" wire:model="photo" class="hidden" />
            </label>
        </div>
        @if( $product->hasImage() )
        <div class="mb-1">
            <button wire:click="removeImage" class="hover:text-theme-light-red hover:bg-transparent bg-theme-light-red  border-theme-light-red hover:border-theme-light-red text-white border rounded w-6 h-6">
              <span role="img" aria-label="edit" class="flex justify-center">
                <svg viewBox="64 64 896 896" focusable="false" data-icon="delete" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M360 184h-8c4.4 0 8-3.6 8-8v8h304v-8c0 4.4 3.6 8 8 8h-8v72h72v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80h72v-72zm504 72H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zM731.3 840H292.7l-24.2-512h487l-24.2 512z"></path></svg>              </span>
              <span>
            </button>
        </div>
        @endif

        @if ( $product->isSpecial() )
          <div class="mb-1">
            <button wire:click="setFeatured" class="bg-yellow-500 border-yellow-500  border rounded w-6 h-6">
                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" class="text-white w-4 m-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                  <path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path>
                </svg>
            </button>
          </div>
        @else
          <div class="mb-1">
            <button wire:click="setFeatured" class="group hover:bg-yellow-500 bg-transparent border-yellow-500  border rounded w-6 h-6">
                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="star" class="group-hover:text-white w-4 text-yellow-500 m-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                  <path fill="currentColor" d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"></path>
                </svg>
            </button>
          </div>
        @endif


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

<div class="mt-4">
        <div class="py-5 text-center">
            <a href="{{ route('dashboard.products.edit', $product) }}" class="bg-blue-100 font-bold text-blue-800 border border-blue-100 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rounded-lg text-xs px-5 py-2.5 mr-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current ml-1 inline w-4 h-4" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"/></svg>
                ویرایش محصول
            </a>
        </div>
      <h3>
          <span class="bg-theme-14 text-xs rounded-sm px-2 px-1 text-theme-10 mb-1 ml-4px">
              {{ $product->getMainGroupName() }}
          </span>
          <span class="bg-theme-14 text-xs rounded-sm px-2 px-1 text-theme-10 mb-1">
              {{ $product->getSideGroupName() }}
          </span>
      </h3>
      <h2 class="text-gray-900 title-font text-lg font-medium">
          {{ $product->name }}
      </h2>
      
      <div class="my-1 text-blue-900">
          {{ $product->code }} 
      </div>

      <div class="my-1 text-blue-900">
          {{ $product->fewtak }} 
      </div>
      
      <div class="my-1 text-bold text-xl text-blue-900">
          {{ number_format($product->getPrice()) }} تومان
      </div>
      <div class="flex justify-between">
          <del class="text-gray-300 mt-1">
              {{ number_format($product->sell_price) }} تومان
          </del>
          @if( $product->hasSupply() )
          <span class="bg-teal-500/50 text-xs rounded-sm px-2 px-1 text-gray-700 inline-block m-2">
              موجود
          </span>
          @else
          <span class="bg-red-500/50 text-xs rounded-sm px-2 px-1 text-gray-700 inline-block m-2">
              ناموجود
          </span>
          @endif
      </div>

  </div>
</div>
