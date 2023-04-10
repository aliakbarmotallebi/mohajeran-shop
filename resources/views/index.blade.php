<!doctype html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>Shahrvand Mohajer Home Page</title>
</head>

<body>
  <div class="w-full min-h-screen flex items-center justify-center" >
    <div class="md:w-2/3 w-full px-4 text-white flex flex-col">
        <div class="w-full text-7xl font-bold">
            <h1 class="w-full md:w-2/3 text-[#313131]">
            فروشگاه آنلاین شهروند مهاجر
            </h1>
        </div>
        <div class="flex mt-8 flex-col md:flex-row md:justify-between">
            <p class="w-full md:w-2/3 text-gray-800">
            شهروند مهاجر جهت تسریع و تسهیل فرایند خرید اینترنتی و خدمت‌رسانی به همشهریان عزیز شهر مهاجران،
            بیش از ۵۰۰۰ کالای متنوع در دسته‌بند‌ی‌های گوناگون نظیر لبنیات، خواربار، میوه و سبزیجات تازه، نان، مواد پروتئینی، لوازم بهداشتی و آرایشی ... را به صورت آنلاین عرضه می‌کند

            </p>
            <div class="sm:w-44 pt-6 md:pt-0 flex justify-center flex-col w-full gap-2 text-[#ff971d]">
              <a href="{{ url('login') }}" class="group border-[#ff971d] relative scale-100 ease-in transition delay-150 duration-300 overflow-hidden border text-gray-900 justify-center text-center rounded-lg px-10 py-3 flex items-center">
                <span class="absolute inset-0 bg-white -translate-x-full ease-in group-hover:translate-x-0 transition delay-150 duration-300	"></span>
                <span class="absolute block inset-0 px-10 py-3">
                  ورود به حساب
                </span>
                ورود به حساب
              </a>
                <a href="tel:+989356662413" class="border-white bg-gray-900 hover:bg-gray-700 justify-center text-center rounded-lg shadow px-10 py-3 flex items-center">
                  تماس با ما
                </a>
            </div>
        </div>
        <div class="flex flex-col">

            <div class="flex mt-24 mb-12 flex-col justify-between items-center sm:flex-row">
              <div class="flex gap-2 items-center">
                <div class="hidden sm:block">
                  <img class="h-12 w-12 shadow bg-[#ff5152] rounded-md inline-block shadow-[#ff5152]" src="{{ asset('icon.png') }}" alt="" srcset="">
                </div>
                <div>
                  <h6 class="font-semibold text-xl sm:pb-0 pb-3 text-gray-900">
                    دانلود اپلیکیشن
                  </h6>
                </div>
              </div>
              <div class="flex sm:flex-row flex-end gap-1 flex-col">

                <a href="{{ asset('app.apk') }}" class="flex border items-center gap-1 bg-white px-2 py-3 shadow-lg rounded-md cursor-pointer font-semibold text-gray-900 uppercase">
                  <span class="text-xs font-semibold">دانلود مستقیم</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#ff971d]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                  </svg>
                </a>
                <a href="https://cafebazaar.ir/app/ir.shopjozi.shahrvandmohajer" class="flex border items-center shadow-lg gap-1 bg-white px-2 py-3 rounded-md  cursor-pointer text-gray-900 uppercase">
                  <span class="text-xs font-semibold">دریافت از</span>
                  <svg class="w-16 text-[#ff971d] stroke-current" clip-rule="evenodd" fill-rule="evenodd" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" version="1.1" viewBox="-.01 -.01 391.98 158.75" xmlns="http://www.w3.org/2000/svg">
                    <g transform="translate(-46.809 -1654.1)" fill="none" fill-rule="nonzero">
                     <path d="m426.28 1707.2c-2.2157-1.6031-6.5162-3.7861-14.78-5.7553-2.4717-0.5894-5.3055-1.1549-8.5364-1.6614-4.0693-0.6636-8.7909-1.253-14.245-1.7435l-0.7665-0.068c-1.1039-2.6328-2.25-5.323-3.4599-8.156-0.6429-1.5194-1.261-3.0467-1.9118-4.6666-0.074-0.1914-0.1571-0.3908-0.2393-0.5822-2.3807-5.9539-4.9433-12.068-9.2614-17.499-4.8278-6.0217-11.172-9.3348-17.853-9.3348-6.6829 0-13.019 3.3211-17.854 9.3348-4.35 5.4228-6.8711 11.535-9.2519 17.482l-0.248 0.599c-0.6413 1.6199-1.2602 3.1472-1.9102 4.6666-1.2124 2.833-2.3489 5.5232-3.4607 8.156l-0.7585 0.068c-5.4706 0.4897-10.192 1.0799-14.27 1.7523-3.2301 0.5144-6.048 1.0871-8.5117 1.6613-8.239 1.9677-12.573 4.1522-14.782 5.7554-0.39 0.2855-0.6947 0.6739-0.8829 1.1206a2.7124 2.7124 0 0 0-0.1866 1.4196l0.717 5.3733c1.0871 8.0404 2.2484 17.483 4.1602 27.217 1.4093 7.4932 3.3833 14.868 5.9076 22.059 1.0129 2.8314 2.1415 5.6141 3.4033 8.3051 5.3916 10.959 13.733 20.169 24.07 26.576 10.337 6.4085 22.254 9.7575 34.388 9.6634 12.136-0.093 24-3.625 34.238-10.192 10.238-6.5673 18.439-15.904 23.663-26.944 0.973-2.1599 1.8703-4.3692 2.695-6.6447 5.8821-15.947 8.148-33.545 10.018-47.522l1.0377-7.9646a2.6838 2.6838 0 0 0-0.2273-1.3942 2.653 2.653 0 0 0-0.9013-1.0815zm-71.104-10.481c-6.706 0-12.811 0.1245-18.356 0.3478 0.2959-0.7051 0.6013-1.4117 0.914-2.1415 0.7003-1.6614 1.3758-3.3227 2.0274-4.9841 1.3551-3.6186 2.9423-7.1455 4.7544-10.556a31.095 31.095 0 0 1 2.817-4.2184c1.3511-1.6613 4.1777-4.527 7.8426-4.527 3.6672 0 6.4931 2.833 7.8529 4.527 1.0512 1.3264 1.994 2.7381 2.8171 4.2184 1.8073 3.412 3.3952 6.9389 4.7543 10.556 0.6508 1.6614 1.3184 3.3227 2.0259 4.9841 0.3142 0.7298 0.6109 1.4364 0.9156 2.1415-5.5464-0.2233-11.651-0.3478-18.367-0.3478z" stroke-width="7.567"/>
                     <g transform="matrix(.079758 0 0 .079758 50.588 1657.7)" stroke-width="94.875">
                      <path d="m912.23 1042.8v-784.34c0-116.52 165.35-196.6 266.46-88.26 23.79 25.74 40.03 64.48 40.03 113.2v730.89c0 57.41-16.09 90.7-42.8 121.16-91.13 104.02-263.69 28.59-263.69-92.65zm912.3 167.7v-801.79l0.49 0.08c0.93-20.38 6.48-40.29 16.25-58.22 35.56-67.08 135.46-109.15 218.04-55.23 73.88 48.24 73.03 121.3 72.03 207.26v0.05c-0.11 10.13-0.23 20.42-0.23 30.89 0 7.9-0.11 29.32-0.28 59.7v0.26c-0.83 154.86-2.88 541.31 2.54 557.79a45.03 45.03 0 0 0 10.34 16.4 44.763 44.763 0 0 0 16.31 10.48c15.81 6.61 64.57 5.26 121.12 3.71 82.54-2.28 181.7-5 219.14 15.87 110.29 61.3 101.68 194.17 35.66 250.13a154.35 154.35 0 0 1-105.57 40.61h-310.64a320.22 320.22 0 0 1-118.64-27.45c-32.07-13.73-60.09-36.71-85.1-57.5a150.65 150.65 0 0 1-16.25-19.24 223.75 223.75 0 0 1-16.25-18.92c-28.17-37.37-58.95-104.2-58.95-154.87z"/>
                      <path d="m966.72 1605c-43.47-36.57-54.46-75.01-54.49-130.61 0.05-47.62 32.99-88.91 60.99-109.93 39.32-29.37 64.94-29.25 123.11-28.98 5.99 0.03 12.36 0.06 19.08 0.06 19.15 0 38.25-0.03 57.29-0.08h0.08c38.01-0.1 75.89-0.18 113.74 0.08 68.61 0.41 81.86-17.13 81.86-85.59-0.28-75.17-0.18-150.37-0.1-225.59v-0.08c0.05-37.63 0.1-75.26 0.1-112.89l-0.02-8.58c-0.11-55.78-0.16-86.52 44.92-131.83 66.51-66.99 176.47-52.72 222.43 8.52 27.61 36.71 39.14 60.6 39.14 124.75v406.05c0 200.01-131.96 331.42-331.41 331.42h-253.04c-54.57 0-93.31-11.14-123.69-36.71zm-966.72-437.11c0.03 66.7 21.47 123.26 85.51 153.12a134.16 134.16 0 0 0 60.58 14.22h327.85c147.15 0 288.61-140 288.61-306.49v-448.84c0.32-39.95-14.61-78.53-41.75-107.85-66.18-68.95-174.52-63.51-228.68 4.95-33.38 42.31-36.06 58.38-36.06 131.4v338.57c0 4 0.05 7.75 0.08 11.27 0.25 26.02 0.38 39.27-15.01 55.73-15.56 16.79-27.32 16.31-50.32 15.43-5.95-0.24-12.63-0.49-20.34-0.49h-170.95c-79.01 0-136.91 8.11-178 74.96-8.12 12.49-21.51 44.53-21.53 64.02zm1671.3 463.1c0 94.61 64.39 160.4 156.82 160.4 164.85 0 201.07-228.62 62.68-290.81-116.85-52.47-219.25 41.66-219.25 130.41zm-259.39-1098.3c-33.78-33.78-43.52-68.14-43.52-116.86v0.08c0-79.17 74.15-146.17 153.24-146.17 79.1 0 152.18 70.01 152.18 153.15-0.24 141.55-170.38 201.25-261.89 109.8z"/>
                     </g>
                    </g>
                   </svg>
                </a>
                <a href="https://myket.ir/app/ir.shopjozi.shahrvandmohajer" class="flex border items-center shadow-lg gap-1 bg-white px-2 py-3  rounded-md cursor-pointer text-gray-900 uppercase">
                  <span class="text-xs font-semibold">دریافت از</span>
                  <svg class="w-20 text-[#ff971d] stroke-current"  version="1.0" viewBox="0 0 1100 445" xmlns="http://www.w3.org/2000/svg">
                    <g transform="matrix(.1 0 0 -.1 0 445)" fill="none" stroke-width="150">
                     <path d="m8580 3833c-93-12-238-46-331-79-703-245-1132-973-1004-1705 56-322 202-600 440-835 538-533 1386-587 1995-128 296 223 501 549 582 927 29 136 32 424 5 564-115 613-573 1089-1182 1229-102 23-146 27-295 29-96 2-191 1-210-2zm-89-839c75-23 136-55 200-107l54-44 45 40c118 105 308 156 465 124 163-34 302-132 378-268 67-119 70-143 75-545 3-320 2-365-13-393-23-46-70-71-133-71-46 0-57 4-90 34l-37 34-5 364c-6 403-6 400-77 479-57 63-105 84-193 84-57 0-84-5-116-22-54-29-102-79-128-133-20-42-21-66-26-355-4-230-8-316-18-333-34-59-136-81-199-42-67 41-67 41-73 390-5 300-6 317-27 356-42 78-122 132-209 141-106 11-206-42-259-138l-30-54-5-360c-5-332-6-362-24-388-26-38-66-57-123-57-60 0-104 26-126 73-15 31-17 78-17 374 0 255 4 355 15 406 46 216 222 388 438 427 67 12 190 4 258-16zm-99-1341c176-148 551-150 732-4 69 56 90 30 34-41-46-57-129-113-206-140-97-33-287-33-385 0-110 38-237 148-237 205 0 25 13 21 62-20z"/>
                     <path d="m3835 3456c-432-112-771-252-855-354-60-73-80-232-40-321 25-54 158-191 343-354 253-222 301-310 207-378-57-42-132-50-432-47-255 3-287 5-321 22-54 27-84 77-107 181-22 105-47 135-108 135-58 0-80-24-138-145-58-124-83-151-181-197-96-45-222-67-466-80-367-19-694 9-815 71-36 18-111 91-112 109-1 4-5 27-10 52-6 32-3 77 11 158 21 127 18 160-18 194-33 30-100 32-140 2-38-28-79-107-105-201-30-113-31-295 0-377 61-165 213-271 472-328 98-21 128-23 435-23 271 0 351 4 450 19 254 39 422 101 524 192 28 25 53 45 54 43 2-2 14-22 29-44 29-46 87-89 150-113 97-36 617-24 783 18 158 40 255 121 310 256l22 55 38-46c109-134 232-224 366-270 77-26 99-29 259-33 195-4 267 6 368 56 69 33 158 119 195 189 106 198 82 558-42 641-45 29-121 30-162 1-63-45-73-108-38-262 49-216 2-273-234-284-171-7-262 7-366 58-78 39-101 58-335 288-251 246-383 369-506 471-83 68-90 78-90 112 0 26 7 32 58 55 105 46 411 143 625 198 116 30 223 63 237 73 34 26 50 59 50 110 0 85-43 127-142 137-42 4-87-3-223-39z"/>
                     <path d="m5304 3467c-64-58-64-66-43-647 29-831 47-948 158-1059 85-85 184-115 381-115 156-1 207 12 292 73l53 39 48-44c120-108 308-140 436-74 87 44 166 155 190 268 25 119 7 272-45 373-61 121-156 183-279 183-136 1-240-75-392-286-46-65-99-129-116-142-89-68-291-59-364 16-70 72-67 47-73 723-5 576-6 612-24 649-26 52-68 76-134 76-45 0-57-4-88-33zm1235-1313c32-23 61-90 61-146 0-95-81-139-190-103-74 25-110 58-110 103 0 79 87 162 169 162 27 0 56-7 70-16z"/>
                     <path d="m1305 2608c-36-13-82-53-101-90-32-62-9-161 49-209 61-49 164-41 221 17l33 34 32-34c39-40 95-57 148-46 128 29 176 181 87 279-63 70-166 75-237 12l-32-29-32 28c-31 27-90 51-123 49-8 0-28-5-45-11z"/>
                     <path d="m4211 1429c-104-63-115-186-26-268 56-51 112-62 177-33 42 18 88 66 88 91 0 18 18 12 25-8 9-30 70-79 115-92 108-33 228 80 206 194-29 155-242 189-315 49-11-20-20-32-21-25 0 19-59 82-91 99-41 21-118 18-158-7z"/>
                    </g>
                   </svg>
                </a>
                <a href="sms://1234566788?body=1" class="flex border items-center gap-1 bg-white px-2 py-3 rounded-md shadow-lg cursor-pointer font-semibold text-gray-900 uppercase">
                  <span class="text-xs font-semibold">   ارسال پیامک به 300012014</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#ff971d]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                  </svg>
               </a>
              </div>

            </div>

            <div class="mt-4 py-3 px-1 rounded-lg">

              <div class="w-full text-center my-2 text-[#313131]">
                <span class="font-bold ml-2">آدرس: </span>
                <address class="inline-block not-italic">
            شهرمهاجران، خیابان ملاصدرا، بازارچه شرقی، پاساژ تبارک، طبقه اول، فروشگاه شهروند مهاجر
                </address>
              </div>
              <div class="w-full text-center text-[#313131]">
                <span class="font-bold ml-2">تلفن پشتیبانی: </span>
                <a href="tel:08638623001">3001 3862 086</a>
              </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
