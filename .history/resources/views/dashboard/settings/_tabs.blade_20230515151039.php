<div class="border-y border-gray-200 w-full">
    <ul class="divide-x divide-x-reverse flex whitespace-nowrap -mb-px text-sm font-medium text-center overflow-x-auto overflow-y-hidden" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li>
            <a href="{{ route('dashboard.settings.index') }}" 
                @class([
                    'bg-neutral-100 text-sky-600 font-semibold border-b-2 border-sky-600' => _is_link_active('dashboard.settings.index'),
                    'inline-flex items-center p-4 hover:bg-gray-50'
                ])>
<svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.273 10.727a1.8 1.8 0 1 1-2.546 2.546 1.8 1.8 0 0 1 2.546-2.546"/>
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.5 12c0 .198.018.396.042.588l-.784.613a1 1 0 0 0-.25 1.288l.592 1.026c.249.431.777.613 1.239.428l.624-.251a.61.61 0 0 1 .564.066c.147.097.299.187.456.267.18.091.311.255.339.455l.095.663c.072.492.494.857.991.857h1.183a1 1 0 0 0 .99-.858l.095-.663a.612.612 0 0 1 .341-.455c.157-.079.308-.167.454-.264a.61.61 0 0 1 .567-.068l.623.25a1 1 0 0 0 1.239-.428l.592-1.026a1 1 0 0 0-.25-1.288l-.784-.613c.024-.191.042-.389.042-.587 0-.198-.018-.396-.042-.588l.784-.613a1 1 0 0 0 .25-1.288L16.9 8.485a1.001 1.001 0 0 0-1.239-.428l-.623.25a.614.614 0 0 1-.567-.068 4.363 4.363 0 0 0-.454-.264.609.609 0 0 1-.341-.455l-.095-.662a1 1 0 0 0-.99-.858h-1.182a1 1 0 0 0-.99.858l-.095.664a.617.617 0 0 1-.339.455c-.157.08-.309.17-.456.267a.61.61 0 0 1-.565.065l-.625-.251a1 1 0 0 0-1.238.428l-.592 1.025a1 1 0 0 0 .25 1.288l.784.613c-.025.192-.043.39-.043.588Z" clip-rule="evenodd"/>
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 21H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4Z" clip-rule="evenodd"/>
  </svg>
                تنظیمات کلی
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.sliders.index') }}" 
            @class([
                'bg-neutral-100 text-sky-600 font-semibold border-b-2 border-sky-600' => _is_link_active('dashboard.sliders.index'),
                'inline-flex items-center p-4 border-b-2 hover:bg-gray-50'
            ])>
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.004 10v7.002a4.002 4.002 0 0 1-4.002 4.002H6.998a4.002 4.002 0 0 1-4.002-4.002V6.998a4.002 4.002 0 0 1 4.002-4.001H13"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m2.996 13 1.296-1.295a2.412 2.412 0 0 1 3.411 0L12 16.002m-5 5.002 6.299-6.298a2.412 2.412 0 0 1 3.41 0l3.942 3.94M18.003 7.999l2.5-2.501m-5.001 0 2.5 2.5m.001.001V2.997"/>
              </svg>
            گالری عکس ها
            </a>
        </li>
        <li>
            <a href="" @class([
                'bg-neutral-100 text-sky-600 font-semibold border-b-2 border-sky-600' => _is_link_active('dashboard.content.groups'),
                'inline-flex items-center p-4 border-b-2 hover:bg-gray-50'
            ])>
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 2v6M9 5l3-3 3 3m-3 17v-6m3 3-3 3-3-3m8-2h2a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2M7 17H5a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h2"/>
              </svg>
             هزینه پیک
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.units.index') }}" @class([
                'bg-neutral-100 text-sky-600 font-semibold border-b-2 border-sky-600' => _is_link_active('dashboard.units.index'),
                'inline-flex items-center p-4 border-b-2 hover:bg-gray-50'
            ])>
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2Z" clip-rule="evenodd"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 11v7"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 9a2 2 0 1 0-2 2v0a2 2 0 0 0 2-2Zm6 5a2 2 0 1 0-2 2v0a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 7v5m0 4v2"/>
              </svg>
            واحد های سیستم
            </a>
        </li>
    </ul>
</div>