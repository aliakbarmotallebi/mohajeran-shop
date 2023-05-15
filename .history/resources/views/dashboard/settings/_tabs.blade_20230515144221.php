<div class="border-y border-gray-200 w-full">
    <ul class="divide-x divide-x-reverse flex whitespace-nowrap -mb-px text-sm font-medium text-center overflow-x-auto overflow-y-hidden" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li>
            <a href="{{ route('dashboard.settings.index') }}" 
                @class([
                    'bg-neutral-100 text-sky-600 font-semibold border-b-2 border-sky-600' => _is_link_active('dashboard.settings.index'),
                    'inline-block p-4 hover:bg-gray-50'
                ])>
<svg xmlns="http://www.w3.org/2000/svg" class="inline ml-1" fill="none" viewBox="0 0 24 24">
    <path stroke="#323232" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.273 10.727a1.8 1.8 0 1 1-2.546 2.546 1.8 1.8 0 0 1 2.546-2.546"/>
    <path stroke="#323232" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.5 12c0 .198.018.396.042.588l-.784.613a1 1 0 0 0-.25 1.288l.592 1.026c.249.431.777.613 1.239.428l.624-.251a.61.61 0 0 1 .564.066c.147.097.299.187.456.267.18.091.311.255.339.455l.095.663c.072.492.494.857.991.857h1.183a1 1 0 0 0 .99-.858l.095-.663a.612.612 0 0 1 .341-.455c.157-.079.308-.167.454-.264a.61.61 0 0 1 .567-.068l.623.25a1 1 0 0 0 1.239-.428l.592-1.026a1 1 0 0 0-.25-1.288l-.784-.613c.024-.191.042-.389.042-.587 0-.198-.018-.396-.042-.588l.784-.613a1 1 0 0 0 .25-1.288L16.9 8.485a1.001 1.001 0 0 0-1.239-.428l-.623.25a.614.614 0 0 1-.567-.068 4.363 4.363 0 0 0-.454-.264.609.609 0 0 1-.341-.455l-.095-.662a1 1 0 0 0-.99-.858h-1.182a1 1 0 0 0-.99.858l-.095.664a.617.617 0 0 1-.339.455c-.157.08-.309.17-.456.267a.61.61 0 0 1-.565.065l-.625-.251a1 1 0 0 0-1.238.428l-.592 1.025a1 1 0 0 0 .25 1.288l.784.613c-.025.192-.043.39-.043.588Z" clip-rule="evenodd"/>
    <path stroke="#323232" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 21H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4Z" clip-rule="evenodd"/>
  </svg>
                تنظیمات کلی
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.sliders.index') }}" 
            @class([
                'bg-neutral-100 text-sky-600 font-semibold border-b-2 border-sky-600' => _is_link_active('dashboard.sliders.index'),
                'inline-block p-4 border-b-2 hover:bg-gray-50'
            ])>
            گالری عکس ها
            </a>
        </li>
        <li>
            <a href="" @class([
                'bg-neutral-100 text-sky-600 font-semibold border-b-2 border-sky-600' => _is_link_active('dashboard.content.groups'),
                'inline-block p-4 border-b-2 hover:bg-gray-50'
            ])>
             هزینه پیک
            </a>
        </li>
        <li>
            <a href="" @class([
                'bg-neutral-100 text-sky-600 font-semibold border-b-2 border-sky-600' => _is_link_active('dashboard.content.variants'),
                'inline-block p-4 border-b-2 hover:bg-gray-50'
            ])>
            واحد های سیستم
            </a>
        </li>
    </ul>
</div>