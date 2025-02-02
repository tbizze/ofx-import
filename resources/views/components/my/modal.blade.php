<div
    class="flex flex-col space-y-4 min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-gray-900/85">
    <div class="flex flex-col p-8 bg-white shadow-md hover:shodow-lg rounded-2xl">

        {{-- <div class=" w-96 items-end grid grid-cols-4">
            <div class="flex items-center bg-slate-100 col-span-4">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-16 h-16 rounded-2xl p-3 border border-blue-100 text-blue-400 bg-blue-50" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="flex flex-col ml-3">
                    <div class="font-medium leading-none">Delete Your Acccount ?</div>
                    <p class="text-sm text-gray-600 leading-none mt-1">By deleting your account you will lose your all
                        data
                    </p>
                </div>
            </div>
            <div class="col-start-2 col-end-5 justify-between  bg-slate-400 p-2">


                <x-my.button style="danger" class="normal-case border-2 hover:shadow-lg"><span
                        class="font-medium tracking-wider text-sm">
                        Delete</span>
                </x-my.button>

                <x-my.button link href="{{ route('dashboard') }}" class="ml-4 normal-case border-2 hover:shadow-lg"
                    onclick="document.getElementById('notification-info').style.display='none'">
                    <span class="font-medium tracking-wider text-sm">Cancelar
                    </span>
                </x-my.button>
            </div>
        </div> --}}


        <div class="flex">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-16 h-16 rounded-2xl p-3 border border-red-100 text-red-400 bg-red-50" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="flex flex-col w-full ml-3 pt-2">
                <div class="font-medium leading-none">Delete Your Acccount ?</div>
                <p class="text-sm text-gray-600 leading-none mt-1">By deleting your account you will lose your all
                    data
                </p>
            </div>
        </div>
        <div class=" flex flex-row-reverse mt-2 gap-2">
            <x-my.button style="danger" class="normal-case border-2 hover:shadow-lg"><span
                    class="font-medium tracking-wider text-sm">
                    Delete</span>
            </x-my.button>

            <x-my.button link href="{{ route('dashboard') }}" class="ml-4 normal-case border-2 hover:shadow-lg"
                onclick="document.getElementById('notification-info').style.display='none'">
                <span class="font-medium tracking-wider text-sm">Cancelar
                </span>
            </x-my.button>
        </div>
    </div>
</div>
