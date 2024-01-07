<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">

    @include('includes._admin-table-articles')
    @include('includes._admin-table-categories')
    @include('includes._admin-table-criminal-cases')
    @include('includes._admin-table-criminals')
    @include('includes._admin-table-judges')

</x-layout.app>