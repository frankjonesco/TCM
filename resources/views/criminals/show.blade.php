<x-layout.app :pageHeadings="$pageHeadings">


    {{-- SET OG:META FOR SHARING THIS PAGE --}}

    <script>
        window.addEventListener('load', function(){
            document.querySelector('#ogType').setAttribute('content', 'article');
            document.querySelector('#ogImage').setAttribute('content', '{{$criminal->imagePath()}}');
            document.querySelector('#ogImageWidth').setAttribute('content', 1280);
            document.querySelector('#ogImageHeight').setAttribute('content', 640);
            document.querySelector('#ogTwitterImage').setAttribute('content', '{{$criminal->imagePath()}}');
        });
    </script>


    {{-- RESOURCE LAYOUT --}}

    <section class="resource-layout">


        {{-- IMAGE --}}

        <x-elements.resource-image :resource="$criminal" />


        {{-- TEXT --}}

        <div>

            {!!nl2p($criminal->description)!!}

        </div>


    </section>  


</x-layout.app>
