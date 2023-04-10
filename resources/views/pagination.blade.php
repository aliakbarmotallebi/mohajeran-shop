@if ($paginator->hasPages())

<nav role="navigation" aria-label="Pagination Navigation" class="flex items-center sm:ml-auto">
  <div class="text-base flex">
    <span class="mx-1">
      @if ($paginator->firstItem())
      {{ $paginator->firstItem() }} -
      {{ $paginator->lastItem() }}</span>
      @else {{ $paginator->count() }} @endif
    </span>
    از
    <span class="mx-1"> {{ $paginator->total() }} </span>
  </div>
  @if ($paginator->onFirstPage())
    <span class="w-5 h-5 ml-5 flex items-center justify-center text-gray-300">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </span>
  @else
    <a href="{{ $paginator->previousPageUrl() }}" class="w-5 h-5 ml-5 flex items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4"><polyline points="9 18 15 12 9 6"></polyline></svg>
    </a>
  @endif


  @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="w-5 h-5 ml-5 flex items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4"><polyline points="15 18 9 12 15 6"></polyline></svg>
    </a>
  @else
    <span class="w-5 h-5 ml-5 flex items-center justify-center text-gray-300">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4"><polyline points="15 18 9 12 15 6"></polyline></svg>
    </span>
  @endif
</nav>
@endif
