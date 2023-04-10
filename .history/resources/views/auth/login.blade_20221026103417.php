@extends('auth.layouts.base') @section('title', 'صفحه ورود به حساب') @section('content')

<div class="min-h-screen bg-blue-900 flex flex-col justify-center">
    <div class="mx-auto w-full  md:max-w-xl lg:max-w-3xl">
        <div class="w-full">
            <div class="flex justify-center mb-3">
                <svg class="w-80 h-80 fill-current" enable-background="new 0 0 220.3 165.2" version="1.1" viewBox="0 0 220.3 165.2" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                    <g fill="none" stroke="#fff" stroke-width="1">
                    <circle class="st0" cx="90.79" cy="55.86" r="4.3"/>
                    <path class="st0" d="m134.43 54.47c-3.62-2.22-8.12-2.22-11.74 0-1.12 0.69-1.47 2.15-0.79 3.28 0.45 0.73 1.23 1.14 2.03 1.14 0.42 0 0.85-0.11 1.24-0.35 2.05-1.26 4.71-1.26 6.76 0 1.12 0.69 2.59 0.33 3.28-0.79 0.7-1.12 0.35-2.59-0.78-3.28z"/>
                    <path class="st0" d="m128.56 65.99c-1.32 0-2.38 1.07-2.38 2.38 0 9.1-7.4 16.5-16.5 16.5s-16.5-7.4-16.5-16.5c0-1.32-1.07-2.38-2.38-2.38-1.32 0-2.38 1.07-2.38 2.38 0 11.73 9.54 21.27 21.27 21.27s21.27-9.54 21.27-21.27c-0.01-1.32-1.08-2.38-2.4-2.38z"/>
                    <path class="st0" d="m154.36 93.37-6.09-58.62c-0.86-8.27-7.78-14.51-16.09-14.51h-5.86v-0.64c0-9.18-7.47-16.64-16.64-16.64s-16.65 7.46-16.65 16.64v0.64h-4.91c-8.32 0-15.24 6.24-16.09 14.51l-6.09 58.62c-0.47 4.55 1.01 9.11 4.08 12.51 3.06 3.4 7.44 5.35 12.02 5.35h56.23c4.57 0 8.95-1.95 12.02-5.35 3.05-3.4 4.54-7.96 4.07-12.51zm-56.56-73.77c0-6.55 5.33-11.88 11.88-11.88s11.88 5.33 11.88 11.88v0.64h-23.76v-0.64zm48.94 83.08c-2.16 2.4-5.25 3.77-8.48 3.77h-56.22c-3.23 0-6.32-1.37-8.48-3.77s-3.21-5.61-2.88-8.82l6.09-58.62c0.6-5.84 5.48-10.24 11.35-10.24h4.91v4.77h-0.26c-1.32 0-2.38 1.07-2.38 2.38 0 1.32 1.07 2.38 2.38 2.38h5.28c1.32 0 2.38-1.07 2.38-2.38 0-1.32-1.07-2.38-2.38-2.38h-0.25v-4.77h23.75v4.77h-0.26c-1.32 0-2.38 1.07-2.38 2.38 0 1.32 1.07 2.38 2.38 2.38h5.28c1.32 0 2.38-1.07 2.38-2.38 0-1.32-1.07-2.38-2.38-2.38h-0.26v-4.77h5.86c5.87 0 10.75 4.4 11.35 10.24l6.09 58.62c0.34 3.21-0.71 6.43-2.87 8.82z"/>
                    <rect class="st0" x="24.99" y="154.73" width="4.8" height="4.83"/>
                    <path class="st0" d="m40.48 137.13-8.12-3.78c-0.5-0.25-1-0.46-1.49-0.62s-1.09-0.24-1.79-0.24c-1.01 0-1.99 0.21-2.96 0.62-0.97 0.42-1.82 1.04-2.55 1.87l-3.47 4.23 3.78 3.32 3.47-3.85c0.23-0.25 0.5-0.45 0.81-0.6s0.64-0.23 0.96-0.23c0.25 0 0.63 0.1 1.13 0.3l5.25 2.53-3.66 3.32c-1.31 1.21-2.94 1.81-4.91 1.81h-9.45c-0.5 0-0.92-0.17-1.25-0.51s-0.49-0.76-0.49-1.27v-6.61h-5.44v12.54c0 1.39-0.13 2.44-0.38 3.17s-0.76 1.41-1.51 2.04-2.03 1.46-3.81 2.49l2.04 4.57c2.44-1.21 4.31-2.35 5.59-3.42s2.19-2.28 2.72-3.64c0.42-1.07 0.66-2.39 0.75-3.93 0.54 0.16 1.12 0.26 1.78 0.26h8.65c1.61 0 3.17-0.28 4.68-0.83s2.84-1.37 4-2.46l6.12-5.7h4.19v-5.29h-4.04c-0.25 0.03-0.45-0.01-0.6-0.09z"/>
                    <path class="st0" d="m94.4 136.49c-1.26-0.68-2.64-1.02-4.15-1.02h-10.2v5.4h2.34v3.17c0 0.5-0.17 0.93-0.51 1.27s-0.75 0.51-1.23 0.51h-4.15c-0.7 0-1.36 0.09-1.99 0.25 0.3-0.85 0.47-1.75 0.47-2.7 0-1.49-0.37-2.86-1.11-4.14-0.74-1.27-1.76-2.28-3.04-3.02s-2.67-1.11-4.15-1.11c-1.49 0-2.83 0.37-4.02 1.11-1.2 0.74-2.13 1.74-2.81 3s-1.02 2.64-1.02 4.15v2.45h-3.67c-0.48 0-0.88-0.17-1.21-0.51s-0.49-0.76-0.49-1.27v-17.97h-5.44v18.31c0 1.28 0.31 2.47 0.94 3.57 0.63 1.09 1.49 1.96 2.57 2.61 1.08 0.64 2.28 0.96 3.59 0.96h3.7v1.47c0 1.41 0.36 2.72 1.08 3.93s1.68 2.16 2.89 2.87 2.52 1.06 3.93 1.06h9.44v-5.36h-2.49v-1.4c0-0.75 0.22-1.37 0.66-1.85s1.03-0.72 1.76-0.72h4.57c1.87 0 3.33-0.66 4.4-1.94 0.36 0.33 0.74 0.64 1.17 0.91 1.2 0.74 2.53 1.11 4.02 1.11s2.86-0.37 4.14-1.11c1.27-0.74 2.28-1.75 3.02-3.02s1.11-2.65 1.11-4.13-0.37-2.83-1.11-4.02c-0.75-1.2-1.75-2.14-3.01-2.82zm-30.21 6.87c0-0.73 0.24-1.33 0.72-1.81s1.07-0.72 1.78-0.72c0.73 0 1.34 0.24 1.83 0.72s0.74 1.08 0.74 1.81c0 0.71-0.24 1.29-0.74 1.76-0.49 0.47-1.1 0.7-1.83 0.7h-2.49v-2.46zm2.57 12.13c-0.68 0-1.27-0.24-1.76-0.74-0.49-0.49-0.74-1.08-0.74-1.76v-1.47h2.42c0.88 0 1.72-0.14 2.52-0.39-0.31 0.93-0.48 1.91-0.48 2.96v1.4h-1.96zm25.3-10.33c-0.48 0.49-1.08 0.74-1.81 0.74s-1.33-0.24-1.79-0.74c-0.47-0.49-0.7-1.1-0.7-1.83v-2.45h2.49c0.73 0 1.33 0.23 1.81 0.7s0.72 1.05 0.72 1.76c0 0.72-0.24 1.33-0.72 1.82z"/>
                    <path class="st0" d="m130.81 144.04c0 0.48-0.17 0.89-0.51 1.25-0.34 0.35-0.75 0.53-1.23 0.53h-2.27c-0.93 0-1.61-0.52-2.04-1.55l-4.64-12.88-5.14 1.92 3.59 9.74c0.15 0.5 0.23 0.83 0.23 0.98 0 0.55-0.19 0.99-0.57 1.3-0.38 0.32-0.84 0.47-1.4 0.47h-8.99v5.7h8.99c1.16 0 2.1-0.15 2.83-0.45s1.5-0.85 2.3-1.66c0.4 0.6 1.01 1.11 1.81 1.51 0.81 0.4 1.72 0.6 2.76 0.6h2.57c1.31 0 2.51-0.32 3.59-0.96s1.94-1.51 2.57-2.61c0.63-1.09 0.94-2.28 0.94-3.57v-8.08h-5.4v7.76z"/>
                    <rect class="st0" x="130.92" y="128.22" width="4.83" height="4.87"/>
                    <path class="st0" d="m151.35 136.51c-1.21-0.74-2.54-1.11-4-1.11-1.51 0-2.9 0.37-4.15 1.11-1.26 0.74-2.26 1.74-3 3s-1.11 2.64-1.11 4.15c0 1.49 0.37 2.83 1.11 4.02 0.74 1.2 1.74 2.13 3 2.81s2.64 1.02 4.15 1.02h2.45c0 0.73-0.2 1.36-0.6 1.89s-1.15 1.09-2.25 1.7c-1.1 0.6-2.76 1.38-5 2.34l1.7 4.8c3.07-1.33 5.41-2.54 7.01-3.61s2.76-2.33 3.47-3.78c0.72-1.45 1.08-3.34 1.08-5.68v-5.51c0-1.51-0.34-2.89-1.02-4.15-0.69-1.26-1.63-2.26-2.84-3zm-1.55 9.65h-2.45c-0.73 0-1.34-0.24-1.83-0.72s-0.74-1.08-0.74-1.81 0.24-1.33 0.74-1.81c0.49-0.48 1.1-0.72 1.83-0.72 0.7 0 1.29 0.24 1.76 0.72s0.7 1.08 0.7 1.81v2.53z"/>
                    <rect class="st0" x="205.42" y="129.51" width="4.87" height="4.83"/>
                    <rect class="st0" x="202.06" y="122.71" width="4.83" height="4.87"/>
                    <rect class="st0" x="198.63" y="129.51" width="4.83" height="4.83"/>
                    <path class="st0" d="m210.26 136.3v9.52h-1.36c-0.48 0-0.88-0.17-1.21-0.51s-0.49-0.76-0.49-1.27v-6.61h-5.43v6.68c0 0.5-0.16 0.93-0.49 1.27s-0.74 0.51-1.25 0.51c-0.5 0-0.92-0.17-1.25-0.51s-0.49-0.76-0.49-1.27v-6.68h-5.4v6.61c0 0.5-0.17 0.93-0.51 1.27s-0.76 0.51-1.26 0.51h-3.24c-0.7 0-1.36 0.09-1.99 0.25 0.3-0.85 0.47-1.75 0.47-2.7 0-1.49-0.37-2.86-1.11-4.14-0.74-1.27-1.76-2.28-3.04-3.02s-2.67-1.11-4.15-1.11-2.83 0.37-4.02 1.11c-1.2 0.74-2.13 1.74-2.81 3s-1.02 2.64-1.02 4.15v2.45h-3.21c-0.5 0-0.92-0.17-1.25-0.51s-0.49-0.76-0.49-1.27v-6.61h-5.4v12.54c0 1.41-0.09 2.51-0.26 3.29-0.18 0.78-0.56 1.55-1.15 2.3-0.59 0.76-1.56 1.66-2.89 2.72l3.02 3.96c1.81-1.36 3.18-2.58 4.12-3.66 0.93-1.08 1.59-2.28 1.98-3.59 0.3-1.02 0.49-2.27 0.55-3.74 0.54 0.16 1.11 0.27 1.77 0.27h3.21v1.47c0 1.41 0.36 2.72 1.08 3.93s1.68 2.16 2.89 2.87 2.52 1.06 3.93 1.06h9.44v-5.36h-2.49v-1.4c0-0.75 0.22-1.37 0.66-1.85s1.03-0.72 1.76-0.72h3.66c1.9 0 3.37-0.66 4.44-1.94 1.07 1.35 2.56 2.02 4.47 2.02s3.4-0.67 4.48-2.02c0 0 0-0.01 0.01-0.01 1.05 1.3 2.51 1.96 4.39 1.96h6.8v-15.22h-5.47zm-34.71 7.06c0-0.73 0.24-1.33 0.72-1.81s1.07-0.72 1.78-0.72c0.73 0 1.34 0.24 1.83 0.72s0.74 1.08 0.74 1.81c0 0.71-0.24 1.29-0.74 1.76-0.49 0.47-1.1 0.7-1.83 0.7h-2.49v-2.46zm2.57 12.13c-0.68 0-1.27-0.24-1.76-0.74-0.49-0.49-0.74-1.08-0.74-1.76v-1.47h2.42c0.88 0 1.72-0.14 2.52-0.39-0.31 0.93-0.48 1.91-0.48 2.96v1.4h-1.96z"/>
                    </g>
                </svg>
            </div>
            <livewire:auth-component />
        </div>

    </div>
</div>
@endsection