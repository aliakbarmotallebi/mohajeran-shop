<div class="border-b border-gray-200 w-full">
    <ul class="flex whitespace-nowrap -mb-px text-sm font-medium text-center overflow-x-auto overflow-y-hidden" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li class="mr-2" role="presentation">
            <a href="{{  route('dashboard.content.brands') }}" 
                @class([
                    'dashboard__tab--active' => _is_link_active('dashboard.content.brands'),
                    'inline-block p-4 border-b-2 rounded-t-lg'
                ])>
                مدیریت برند ها
            </a>
        </li>
        <li class="mr-2" role="presentation">
            <a href="{{  route('dashboard.content.products') }}" 
            @class([
                'dashboard__tab--active' => _is_link_active('dashboard.content.products'),
                'inline-block p-4 border-b-2 rounded-t-lg'
            ])>
               مدیریت محصولات
            </a>
        </li>
        <li class="mr-2" role="presentation">
            <a href="{{  route('dashboard.content.groups') }}" @class([
                'dashboard__tab--active' => _is_link_active('dashboard.content.groups'),
                'inline-block p-4 border-b-2 rounded-t-lg'
            ])>
               مدیریت گروه ها
            </a>
        </li>
        <li class="mr-2" role="presentation">
            <a href="{{  route('dashboard.content.variants') }}" @class([
                'dashboard__tab--active' => _is_link_active('dashboard.content.variants'),
                'inline-block p-4 border-b-2 rounded-t-lg'
            ])>
               مدیریت مدل ها
            </a>
        </li>
    </ul>
</div>