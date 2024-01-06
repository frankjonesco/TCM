<div 
    class="content-image-text-overlay {{$resource->imageBgPosition()}}" 
    style="background-image: url('{{$resource->imagePath(true, 'tn')}}');"
>

    <div>


        {{-- CATEGORY PIP --}}

        <x-elements.category-pip :category="$resource->category" />



        {{-- CONTENT HEADING --}}
        
        <a 
            href="{{$resource->link()}}" 
            aria-label="{{$resource->linkLabel()}}"
            class="content-heading"
        >
            {{$resource->title}}
        </a>

        

        {{-- PUBLSIHING INFORMATION --}}

        <x-elements.resource-publishing-information :resource="$resource" />
        


    </div>


</div>