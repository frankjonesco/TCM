<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">

    @include('includes._admin-table-'.$model->directory)

</x-layout.app>