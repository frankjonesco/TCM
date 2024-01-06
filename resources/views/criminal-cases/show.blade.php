<x-layout.app :pageHeadings="$pageHeadings" :breadcrumbs="$breadcrumbs">


    {{-- SET OG:META FOR SHARING THIS PAGE --}}

    <script>
        window.addEventListener('load', function(){
            document.querySelector('#ogType').setAttribute('content', 'article');
            document.querySelector('#ogImage').setAttribute('content', '{{$criminal_case->imagePath()}}');
            document.querySelector('#ogImageWidth').setAttribute('content', 1280);
            document.querySelector('#ogImageHeight').setAttribute('content', 640);
            document.querySelector('#ogTwitterImage').setAttribute('content', '{{$criminal_case->imagePath()}}');
        });
    </script>


    {{-- RESOURCE LAYOUT --}}

    <section class="resource-layout">


        {{-- IMAGE --}}

        <x-elements.resource-image :resource="$criminal_case" />


        {{-- TEXT --}}

        <div>

            {!!$criminal_case->description!!}

        </div>


    </section>  


</x-layout.app>
