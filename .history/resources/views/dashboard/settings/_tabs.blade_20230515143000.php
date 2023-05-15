<div class="border-y border-gray-200 w-full">
    <ul class="divide-x divide-x-reverse flex whitespace-nowrap -mb-px text-sm font-medium text-center overflow-x-auto overflow-y-hidden" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li>
            <a href="{{ route('dashboard.settings.index') }}" 
                @class([
                    'bg-neutral-100 text-sky-700 font-semibold border-b-2 border-sky-400' => _is_link_active('dashboard.settings.index'),
                    'inline-block p-4 hover:bg-gray-50'
                ])>

                تنظیمات کلی
            </a>
        </li>
        <li>
            <a href="" 
            @class([
                'bg-neutral-100 text-sky-700 font-semibold border-b-2 border-sky-400' => _is_link_active('dashboard.content.products'),
                'inline-block p-4 border-b-2 hover:bg-gray-50'
            ])>
            گالری عکس ها
            </a>
        </li>
        <li>
            <a href="" @class([
                'bg-neutral-100 text-sky-700 font-semibold border-b-2 border-sky-400' => _is_link_active('dashboard.content.groups'),
                'inline-block p-4 border-b-2 hover:bg-gray-50'
            ])>
             هزینه پیک
            </a>
        </li>
        <li>
            <a href="" @class([
                'bg-neutral-100 text-sky-700 font-semibold border-b-2 border-sky-400' => _is_link_active('dashboard.content.variants'),
                'inline-block p-4 border-b-2 hover:bg-gray-50'
            ])>
            واحد های سیستم
            </a>
        </li>
    </ul>
</div>