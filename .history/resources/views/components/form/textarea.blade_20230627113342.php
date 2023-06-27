<div class="mb-2">
    <x-form.label :label="$label" :name="$name" :required="$required"/>

    <textarea id="editor" name="{{ $name }}" rows="4" class="shadow-sm border bg-white  @error($name) bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500  @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
        placeholder="{{ $placeholder }}"
        @if($readonly)
            disabled readonly
        @endif

    >{{ old($name, $value ?? '') }}</textarea>

    <x-form.error :name="$name"/>
</div>
