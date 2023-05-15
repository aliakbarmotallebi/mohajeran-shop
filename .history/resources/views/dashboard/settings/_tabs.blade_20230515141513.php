<div class="border-y border-gray-200 w-full">
    <ul class="divide-x divide-x-reverse flex whitespace-nowrap -mb-px text-sm font-medium text-center overflow-x-auto overflow-y-hidden" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li class="mr-2" role="presentation">
            <a href="" 
                @class([
                    'dashboard__tab--active' => _is_link_active('dashboard.content.brands'),
                    'inline-block p-4 border-b-2 rounded-t-lg'
                ])>
                تنظیمات کلی
            </a>
        </li>
        <li class="mr-2" role="presentation">
            <a href="" 
            @class([
                'dashboard__tab--active' => _is_link_active('dashboard.content.products'),
                'inline-block p-4 border-b-2 rounded-t-lg'
            ])>
            گالری عکس ها
            </a>
        </li>
        <li class="mr-2" role="presentation">
            <a href="" @class([
                'dashboard__tab--active' => _is_link_active('dashboard.content.groups'),
                'inline-block p-4 border-b-2 rounded-t-lg'
            ])>
             هزینه پیک
            </a>
        </li>
        <li class="mr-2" role="presentation">
            <a href="" @class([
                'dashboard__tab--active' => _is_link_active('dashboard.content.variants'),
                'inline-block p-4 border-b-2 rounded-t-lg'
            ])>
            واحد های سیستم
            </a>
        </li>
    </ul>
</div>