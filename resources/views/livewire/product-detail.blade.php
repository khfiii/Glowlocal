  <div class="w-full space-y-4">
      <div class="space-y-2">
          <h2 class="md:text-2xl text-xl font-bold text-gray-800">{{ $product->title }}</h2>
          <p class="text-gray-800 text-base">{{ formatRupiah($product->price) }}</p>
      </div>
      <div class="flex gap-4 justify-start">

          <div class="grid grid-cols-12 gap-2">

              <button type="button" wire:click="addToChart({{ $product }})"
                  class="p-2 bg-[#1f2937] text-white text-xs rounded-md w-full col-span-7 flex justify-center items-center">

                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" wire:loading.remove viewBox="0 0 24 24"
                      stroke-width="1.5" stroke="currentColor" class="size-4">
                      <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                  </svg>

                  <div class="w-[7rem]" wire:loading.remove>
                      Dapatkan {{ $product->category->name }}
                  </div>

                  <div role="status" wire:loading class="w-[7rem]">
                      <svg aria-hidden="true"
                          class="inline w-4 h-4 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                          viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                              d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                              fill="currentColor" />
                          <path
                              d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                              fill="currentFill" />
                      </svg>
                      <span class="sr-only">Loading...</span>
                  </div>
              </button>
              <button type="button"
                  class="p-2 bg-gray-200 text-xs text-gray-800 rounded-md flex items-center col-span-5">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 mr-1" fill="currentColor" viewBox="0 0 32 32">
                      <path
                          d="M14.236 21.954h-3.6c-.91 0-1.65-.74-1.65-1.65v-7.201c0-.91.74-1.65 1.65-1.65h3.6a.75.75 0 0 1 .75.75v9.001a.75.75 0 0 1-.75.75zm-3.6-9.001a.15.15 0 0 0-.15.15v7.2a.15.15 0 0 0 .15.151h2.85v-7.501z"
                          data-original="#000000" />
                      <path
                          d="M20.52 21.954h-6.284a.75.75 0 0 1-.75-.75v-9.001c0-.257.132-.495.348-.633.017-.011 1.717-1.118 2.037-3.25.18-1.184 1.118-2.089 2.28-2.201a2.557 2.557 0 0 1 2.17.868c.489.56.71 1.305.609 2.042a9.468 9.468 0 0 1-.678 2.424h.943a2.56 2.56 0 0 1 1.918.862c.483.547.708 1.279.617 2.006l-.675 5.401a2.565 2.565 0 0 1-2.535 2.232zm-5.534-1.5h5.533a1.06 1.06 0 0 0 1.048-.922l.675-5.397a1.046 1.046 0 0 0-1.047-1.182h-2.16a.751.751 0 0 1-.648-1.13 8.147 8.147 0 0 0 1.057-3 1.059 1.059 0 0 0-.254-.852 1.057 1.057 0 0 0-.795-.365c-.577.052-.964.435-1.04.938-.326 2.163-1.71 3.507-2.369 4.036v7.874z"
                          data-original="#000000" />
                      <path
                          d="M4 31.75a.75.75 0 0 1-.612-1.184c1.014-1.428 1.643-2.999 1.869-4.667.032-.241.055-.485.07-.719A14.701 14.701 0 0 1 1.25 15C1.25 6.867 7.867.25 16 .25S30.75 6.867 30.75 15 24.133 29.75 16 29.75a14.57 14.57 0 0 1-5.594-1.101c-2.179 2.045-4.61 2.81-6.281 3.09A.774.774 0 0 1 4 31.75zm12-30C8.694 1.75 2.75 7.694 2.75 15c0 3.52 1.375 6.845 3.872 9.362a.75.75 0 0 1 .217.55c-.01.373-.042.78-.095 1.186A11.715 11.715 0 0 1 5.58 29.83a10.387 10.387 0 0 0 3.898-2.37l.231-.23a.75.75 0 0 1 .84-.153A13.072 13.072 0 0 0 16 28.25c7.306 0 13.25-5.944 13.25-13.25S23.306 1.75 16 1.75z"
                          data-original="#000000" />
                  </svg>
                  Rating {{ $product->rating }}
              </button>
          </div>
      </div>
      @if ($product->description)
          <div x-cloak x-data="{
              fullText: @js(strip_tags(Str::markdown($product->description))),
              showMore: false,
              get visibleText() {
                  const words = this.fullText.split(' ');
                  if (this.showMore || words.length <= 100) {
                      return this.fullText;
                  }
                  return words.slice(0, 50).join(' ') + '...';
              },
              get isTextTooLong() {
                  return this.fullText.split(' ').length > 100;
              }
          }" class="text-sm prose prose-sm space-y-4 text-start">
              @if ($product->category->name == 'Ebook')
                  <h2>Sinopsis Ebook</h2>
              @else
                  <h2>Deskripsi Produk</h2>
              @endif

              <p x-text="visibleText"></p>

              <template x-if="isTextTooLong">
                  <button @click="showMore = !showMore" class="text-blue-500 hover:underline mt-2">
                      <span x-show="!showMore">Show More</span>
                      <span x-show="showMore">Show Less</span>
                  </button>
              </template>
          </div>
      @endif
  </div>
