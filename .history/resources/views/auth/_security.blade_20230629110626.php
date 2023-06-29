<form method="POST">
    <section
        class="mx-auto max-w-sm text-center">
        <div class="space-y-4">
            <header class="mb-3 text-2xl font-bold">
                <span class="text-xl text-white pb-10 w-full block text-center">ورود به حساب پنل مدیریت</span>
            </header>
            <div class="w-full rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                <input  wire:model="mobile" type="text" placeholder="نام کاربری" name="mobile"
                    class="my-3 w-full border-none bg-transparent outline-none focus:outline-none" />
            </div>
            <div class="flex w-full items-center space-x-2 rounded-2xl bg-gray-50 px-4 ring-2 ring-gray-200 focus-within:ring-blue-400">
                <input wire:model="password" type="password" placeholder="گذرواژه" name="password"
                    class="my-3 w-full border-none bg-transparent outline-none text-xl" />
                <a href="#" class="font-medium text-gray-400 hover:text-gray-500 whitespace-nowrap">!بازیـابی</a>
            </div>
            <button
                type="submit"
                wire:target="login" 
                wire:loading.attr="disabled" type="submit" wire:click.prevent="login()"
                class="w-full flex justify-center rounded-2xl border-b-4 border-b-slate-600 bg-slate-500 py-3 font-bold text-white hover:bg-slate-400 active:translate-y-[0.125rem] active:border-b-slate-400">
                <span  wire:target="login" wire:loading.class="hidden" class="mx-auto text-base font-medium" >ورود</span>
                <svg wire:target="login" wire:loading.class.remove="hidden" class="hidden animate-spin ml-1 mr-3 h-7 w-7 text-white" wire:loading.class.remove="hidden"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </div>
    </section>
</form>