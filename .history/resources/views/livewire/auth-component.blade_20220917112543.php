<form class="form-login" autocomplete="off">
    <div class="flex">
        <div class="relative flex flex-wrap items-end w-1/2 h-20 bg-white border rounded-tl-xl">
            <input wire:model="mobile" type="text" class="text-left h-full pt-7 w-full bg-transparent text-sm px-8 rounded-tl-xl outline-none border-none" autocomplete="off" name="" required="">
            <label class="font-medium duration-300 absolute left-0 top-7 pl-7 leading-tighter text-gray-500">تلفن همراه</label>
        </div>
        <div class="relative flex flex-wrap items-end w-1/2 h-20 bg-white border rounded-tr-xl">
            <input wire:model="password" type="password" class="text-left h-full pt-7 w-full bg-transparent text-sm rounded-tr-xl px-8 outline-none border-none" autocomplete="off" name="password" required="">
            <label class="font-medium duration-300 absolute left-0 top-7 pl-7 leading-tighter text-gray-500 text-sm">گذرواژه</label>
        </div>
    </div>
    <div>
        <button wire:target="login" wire:loading.attr="disabled" type="submit" wire:click.prevent="login()" class="text-white flex justify-center items-center text-dark w-full h-20 bg-cyan-500 rounded-b-xl">
            <span wire:target="login" wire:loading.class="hidden" class="text-base font-medium">ورود</span>
            <svg wire:target="login" class="hidden animate-spin ml-1 mr-3 h-7 w-7 text-white" wire:loading.class.remove="hidden"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </button>
</form>
