<div>
    <form wire:submit="sendComment">

        <div class="space-y-2 px-2">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                message</label>
            <div class="w-full">
                <textarea wire:model="message" x-data="{
                    resize() {
                        $el.style.height = '0px';
                        $el.style.height = $el.scrollHeight + 'px'
                    }
                }" x-init="resize()" @input="resize()" type="text"
                    placeholder="Type your message here. I will resize based on the height content."
                    class="flex w-full h-auto min-h-[80px] px-3 py-2 text-sm text-gray-900 bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-400 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50"></textarea>
            </div>
            @error('message')
                <div>
                    <span class="text-red-500">{{ $message }}</span>
                </div>
            @enderror


            <button type="submit"
                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-[#4f46e5] rounded-sm">
                <svg class="w-3 h-3 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 16">
                    <path
                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                    <path
                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                </svg>
                Send
            </button>




        </div>

    </form>
</div>
