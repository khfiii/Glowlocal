 <div x-data="{ active: $wire.entangle('active') }" class="px-10">
     <!-- component -->
     <button @click="active = ! active"
         class="fixed bottom-20 right-4 inline-flex items-center justify-center text-sm font-medium disabled:pointer-events-none disabled:opacity-50 border rounded-full w-16 h-16 bg-black hover:bg-gray-700 m-0 cursor-pointer border-gray-200 bg-none p-0 normal-case leading-5 hover:text-gray-900"
         type="button" aria-haspopup="dialog" aria-expanded="false" data-state="closed">
         <svg xmlns=" http://www.w3.org/2000/svg" width="30" height="40" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="text-white block border-gray-200 align-middle">
             <path d="m3 21 1.9-5.7a8.5 8.5 0 1 1 3.8 3.8z" class="border-gray-200">
             </path>
         </svg>
     </button>


     <div x-show="active"
         class="fixed bottom-[calc(4rem+6rem)] right-3  bg-white p-6 rounded-lg border border-gray-900 md:w-[30rem] w-[90%]"
         x-transition @click.outside="active = false" x-cloak>

         <!-- Heading -->
         <div class="flex flex-col space-y-1.5 pb-6">
             <h2 class="font-semibold text-lg tracking-tight">Request Ebook? </h2>
             <p class="text-sm text-[#6b7280] leading-3">Masukin link ebook dari google play books 👇</p>
         </div>

         <!-- Chat Container -->
         <div class="pr-4" style="min-width: 100%; display: table;">

         </div>
         <!-- Input box  -->
         <div class="flex flex-col pt-0">
             <form class="flex items-center justify-center w-full space-x-2" wire:submit="send">

                 <input
                     class="flex h-10 w-full rounded-md border border-[#e5e7eb] px-3 py-2 text-sm placeholder-[#6b7280] focus:outline-none  disabled:cursor-not-allowed disabled:opacity-50 text-[#030712]"
                     placeholder="Masukan Link" wire:model="message">


                 <button
                     class="inline-flex items-center justify-center rounded-md text-sm font-medium text-[#f9fafb] disabled:pointer-events-none disabled:opacity-50 bg-black hover:bg-[#111827E6] h-10 px-4 py-2">
                     Kirim</button>
             </form>
            @error('message')
                 <small class="px-1 md:px-0 mt-1 text-red-600">{{ $message }}</small>
            @enderror
         </div>
     </div>
 </div>
