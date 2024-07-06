<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>

        {{-- blade-formatter-disable --}}
        <style type="text/tailwindcss">
            .btn {
                @apply mx-4 rounded-md px-2 py-1 text-center text-slate-900 hover:bg-slate-100
            }

            .btn2 {
                @apply rounded-md px-2 py-1 text-center text-slate-900 hover:bg-slate-100
            }

            .shadow {
                box-shadow: 0 0.1rem 1.5rem 0 rgba(0, 0, 0, 0.37);
                border: 0.1rem solid rgba(255, 255, 255, 0.18);
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
                backdrop-filter: blur(10px);
            }

            .link{
                @apply font-medium text-gray-900
            }

            .card{
                border: solid 0.1rem black; 
                padding: 0.8rem 1.6rem;
                border-radius: 0.5rem; 
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border:1px solid rgba(255, 255, 255, 0.18);
                box-shadow: 0 0.1rem 3rem 0 rgba(0, 0, 0, 0.37);
            }

            .cardForTasks{
                border: solid 0.1rem black; 
                padding: 0.3rem 0.8rem;
                margin: 0.8rem 0.2rem;
                border-radius: 0.5rem; 
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border:1px solid rgba(255, 255, 255, 0.18);
                box-shadow: 0 0.1rem 0.6rem 0 rgba(0, 0, 0, 0.37);
            }
           
            .vermelho {
                color: #be123c;
            }

            .verde {
                color: #22c55e;
            }
            
            .background {
                background-repeat: no-repeat;
                background-size: cover;
                background: #f7fbfc;
            } 

            label {
                @apply block uppercase text-slate-700 mb-2 font-semibold 
            }

            input, textarea {
                @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none rounded-lg
            }

        </style>
        {{-- blade-formatter-enable --}}

        <title>Laravel 11 Task List App</title>
    </head>
    
    <body class="container mx-auto mt-10 mb-10 max-w-lg background">
        <h1 class="font-semibold mb-4 text-2xl flex justify-start">@yield('title')</h1>
        <div x-data="{ flash: true }" class="px-4 py-4">
            @if (session()->has('success'))
                <div x-show="flash" class="relative mb-10 px-4 py-3 verde font-light font-style: italic rounded border border-green-400 bg-green-100"
                    role="alert">
                    <div>{{ session('success') }}</div>

                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                          stroke-width="1.5" @click="flash = false"
                          stroke="currentColor" class="h-6 w-6 cursor-pointer">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </div>
            @endif 
            @yield('content')
        </div>
    </body>
</html>