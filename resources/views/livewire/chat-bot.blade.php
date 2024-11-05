<div x-data="{ active: false, temporaryMessage: '', sending: false, question: '' }"  class="w-full">
    <button @click="active = ! active"
        class="fixed bottom-4 right-4 inline-flex items-center justify-center text-sm font-medium disabled:pointer-events-none disabled:opacity-50 border-none rounded-full w-12 h-12 bg-black hover:bg-gray-700 m-0 cursor-pointer border-gray-200 bg-none p-0 normal-case leading-5 hover:text-gray-900"
        type="button" aria-haspopup="dialog" aria-expanded="false" data-state="closed">
        <svg xmlns=" http://www.w3.org/2000/svg" width="30" height="40" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="text-white block border-gray-200 align-middle">
            <path d="m3 21 1.9-5.7a8.5 8.5 0 1 1 3.8 3.8z" class="border-gray-200">
            </path>
        </svg>
    </button>


    <div x-show="active" x-transition @click.outside="active = false" x-cloak
        style="box-shadow: 0 0 #0000, 0 0 #0000, 0 1px 2px 0 rgb(0 0 0 / 0.05);"
        class="fixed bottom-[calc(4rem+1.5rem)] right-0 bg-white p-6 rounded-lg border border-[#e5e7eb] mx-4 md:mx-10 md:w-[27rem]">

        <!-- Heading -->
        <div class="flex flex-col space-y-1.5 pb-6">
            <h2 class="font-semibold text-gray-900 text-lg tracking-tight">AI Assistant</h2>
            <p class="text-sm text-[#6b7280] leading-3 font-semibold">Powered by Ka<span
                    class="text-orange-600">insight</span></p>
        </div>




        <!-- Chat Container -->
        <div class="overflow-y-scroll max-h-[16rem]">

            <div class="flex gap-3 my-4 text-gray-600 text-sm flex-1"><span
                    class="relative flex shrink-0 overflow-hidden rounded-full w-8 h-8">
                    <div class="rounded-full bg-gray-100 border p-1"><svg stroke="none" fill="black"
                            stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true" height="20" width="20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z">
                            </path>
                        </svg></div>
                </span>
                <div class="flex flex-col">
                    <p class="leading-relaxed"><span class="block font-bold text-gray-700">Kainsight AI </span></p>
                    <p class="leading-relaxed"><span class="block font-thin text-gray-700 text-justify space-y-4">
                            <div class="space-y-2 mt-2 flex gap-1">
                                Hi, ada yang mau kamu tanyakan? <img class="w-5 h-5" src="{{ asset('512.gif') }}"
                                    alt="smile">
                            </div>
                    </p>

                </div>
            </div>

            @foreach ($datas as $data)
                <div class="flex gap-3 my-4 text-gray-600 text-sm flex-1"><span
                        class="relative flex shrink-0 overflow-hidden rounded-full w-8 h-8">
                        <div class="rounded-full bg-gray-100 border p-1"><svg stroke="none" fill="black"
                                stroke-width="0" viewBox="0 0 16 16" height="20" width="20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z">
                                </path>
                            </svg></div>
                    </span>
                    <p class="leading-relaxed"><span class="block font-bold text-gray-700">You
                        </span>{{ $data['question'] }}</p>
                </div>


                <div class="flex gap-3 my-4 text-gray-600 text-sm flex-1"><span
                        class="relative flex shrink-0 overflow-hidden rounded-full w-8 h-8">
                        <div class="rounded-full bg-gray-100 border p-1"><svg stroke="none" fill="black"
                                stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true" height="20" width="20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z">
                                </path>
                            </svg></div>
                    </span>
                    <div class="flex flex-col">
                        <p class="leading-relaxed"><span class="block font-bold text-gray-700">Kainsight AI </span></p>
                        <p class="leading-relaxed"><span class="block font-thin text-gray-700 text-justify space-y-4">
                                <div class="space-y-2 mt-2">
                                    {!! Str::markdown($data['answer']) !!}
                                </div>
                        </p>

                    </div>
                </div>
            @endforeach

            <template x-if="temporaryMessage">
                <div class="flex gap-3 my-4 text-gray-600 text-sm flex-1"><span
                        class="relative flex shrink-0 overflow-hidden rounded-full w-8 h-8">
                        <div class="rounded-full bg-gray-100 border p-1"><svg stroke="none" fill="black"
                                stroke-width="0" viewBox="0 0 16 16" height="20" width="20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z">
                                </path>
                            </svg></div>
                    </span>
                    <p class="leading-relaxed font-bold"> You <span x-text="temporaryMessage"
                            class="block font-normal text-gray-700"></span></p>
                </div>
            </template>

            <template x-if="sending">
                <div class="flex gap-3 my-4 text-gray-600 text-sm flex-1"><span
                        class="relative flex shrink-0 overflow-hidden rounded-full w-8 h-8">
                        <div class="rounded-full bg-gray-100 border p-1"><svg stroke="none" fill="black"
                                stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true" height="20"
                                width="20" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z">
                                </path>
                            </svg></div>
                    </span>
                    <div class="flex flex-col">
                        <p class="leading-relaxed"><span class="block font-bold text-gray-700">Kainsight AI </span>
                        </p>
                        <p class="leading-relaxed"><span class="block font-thin text-gray-700 text-justify space-y-4">
                                {!! Str::markdown($answer) !!}
                        </p>


                        <div wire:loading role="status" class="max-w-sm animate-pulse mt-2">
                            <div class="h-2.5 bg-blue-100 rounded-full w-48 mb-4"></div>
                        </div>
                    </div>
                </div>
            </template>



        </div>
        <!-- Input box  -->
        <div class="flex items-center pt-4">
            <form
                x-on:submit.prevent="
            temporaryMessage= question; 
            sending = true; 
            $wire.send(question).then(()=>{
                sending=false;
                temporaryMessage = '';
            }); 

            question='';

            "
                class="flex items-center justify-center w-full space-x-2">
                <input x-model="question"
                    class="flex h-10 w-full rounded-md border border-[#e5e7eb] px-3 py-2 text-sm placeholder-[#6b7280] focus:outline-none focus:ring-2 focus:ring-[#9ca3af] disabled:cursor-not-allowed disabled:opacity-50 text-[#030712] focus-visible:ring-offset-2"
                    placeholder="Type your message" value="">

                <div>

                </div>

                <button type="submit"
                    class="inline-flex items-center justify-center rounded-md text-sm font-medium text-[#f9fafb] disabled:pointer-events-none disabled:opacity-50 bg-black hover:bg-[#111827E6] h-10 px-4 py-2">

                    <span wire:loading.remove>Send</span>



                    <svg aria-hidden="true" wire:loading role="status" class="inline w-4 h-4 me-3 ms-4"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="#1C64F2" />
                    </svg>

                </button>
            </form>
        </div>

        @error('question')
            <div class="ms-1">
                <small class="text-red-500">{{ $message }}</small>
            </div>
        @enderror

    </div>

</div>
