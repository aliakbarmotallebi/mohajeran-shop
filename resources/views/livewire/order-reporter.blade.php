<div class="grid grid-cols-12 items-center mb-8 sm:gap-4 xl:gap-y-0 gap-y-5 ">
    <div class="shadow bg-white xl:col-span-4 md:col-span-12 col-span-24 rounded-lg xl:px-6 sm:px-4 px-2 py-7 flex sm:flex-row sm:space-y-0 space-y-5 flex-col items-center">
      <div class="w-10 h-10 rounded-lg flex items-center justify-center sm:ml-4 bg-blue-500 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
      </div>
        <div class="sm:space-y-0 space-y-4 sm:text-right text-center">
          <h5 class="text-gray-500 mb-1.5 text-xs font-medium">
              وضعیت سفارشات سمت سرور
          </h5>
          <div class="text-gray-500 text-xs font-medium flex items-center">
              <div>
                  ارسال شده
                  <span class="dark:text-white text-gray-800 sm:text-21 text-lg mr-1 font-bold">
                      {{ $countOrderCompleted }}
                  </span>
              </div>
              <i class="flex mx-2 h-5 border-l border-gray-50"></i>
              <div>
                  ارسال نشده
                  <span class="dark:text-white text-gray-800 sm:text-21 text-lg mr-1 font-bold">
                      {{ $countOrderPending }}
                  </span>
              </div>
          </div>
        </div>
    </div>
    <div class="shadow bg-white xl:col-span-5 md:col-span-12 col-span-24 rounded-lg xl:px-6 sm:px-4 px-2 py-7 flex sm:flex-row sm:space-y-0 space-y-5 flex-col items-center">
      <div class="w-10 h-10 rounded-lg flex items-center justify-center sm:ml-4 bg-green-500 text-white">
        <svg
        xmlns="http://www.w3.org/2000/svg"
        width="19"
        height="19"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
      >
        <line x1="12" y1="1" x2="12" y2="23" />
        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
      </svg>
      </div>
      <div class="sm:space-y-0 space-y-4 sm:text-right text-center">
        <h5 class="text-gray-500 mb-1.5 text-xs font-medium">
            گزارشات مالی
        </h5>
        <div class="text-gray-500  text-xs font-medium  flex items-center">
            <div>
                ارسال شده
                <span class="dark:text-white text-gray-800 sm:text-21 text-lg mr-1 font-bold">
                    {{ number_format($countOrderTotalCompleted) ?? 0 }}
                </span>
            </div>
            <i class="flex mx-2 h-5 border-l border-gray-50"></i>
            <div>
                ارسال نشده
                <span class="dark:text-white text-gray-800 sm:text-21 text-lg mr-1 font-bold">
                    {{ number_format($countOrderTotalPending) ?? 0 }}
                </span>
            </div>
        </div>
      </div>
    </div>
    <div class="shadow bg-white md:col-span-3 sm:col-span-9 col-span-24  rounded-lg xl:px-6 sm:px-4 px-2 py-6 flex sm:flex-row sm:space-y-0 space-y-5 flex-col items-center ">
      <div class="w-10 h-10 rounded-lg flex items-center justify-center sm:ml-4 bg-yellow-500 text-white">
        <svg
        xmlns="http://www.w3.org/2000/svg"
        width="19"
        height="19"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
      >
        <rect x="2" y="3" width="20" height="14" rx="2" ry="2" />
        <line x1="8" y1="21" x2="16" y2="21" />
        <line x1="12" y1="17" x2="12" y2="21" />
      </svg>
      </div>
      <div class="sm:space-y-0 space-y-4 sm:text-right text-center">
        <h5 class="text-gray-500 mb-1.5 text-xs font-medium">
            جمع کل سفارشات
        </h5>
        <div class="text-gray-500  text-xs font-medium  flex items-center">
            <div>
                سفارش
                <span class="dark:text-white text-gray-800 sm:text-21 text-lg mr-1 font-bold">
                    {{ $countOrders  }}
                </span>
            </div>
        </div>
      </div>
    </div>
</div>
