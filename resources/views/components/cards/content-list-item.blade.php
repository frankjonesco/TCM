

<div {{$attributes->merge(['class' => 'content-list-item'])}}>


    {{-- IMAGE THUMBNAIL --}}

    <div class="image">

        <a 
            href="{{$resource->link()}}" 
            title="{{$resource->linkLabel()}}"
            aria-label="{{$resource->linkLabel()}}"
        >

            <img 
                src="{{$resource->imagePath(true, 'tn')}}"
                alt="{{$resource->imageAltText()}}"
            >

        </a>


    </div>



    {{-- TEXT --}}

    <div class="text">


        {{-- CATEGORY PIP --}}

        {{-- if resource hasPip
            unless hidePip is TRUE  
                showPip --}}

        @unless(isset($hidePip) && $hidePip === true)
            @if(isset($listSize) && $listSize === 'sm')

                <x-elements.category-pip :category="$resource->category" class="category-pip-sm" />

            @else

                <x-elements.category-pip :category="$resource->category" />

            @endif
        @endunless

        
        {{-- TITLE --}}
        
        <a 
            href="{{$resource->link()}}" 
            aria-label="{{$resource->linkLabel()}}"
            class="title"
        >
            {{$resource->title}}
        </a>


        @unless(isset($listSize) && $listSize === 'sm')

            {{-- RESOURCE PUBLISHING INFORMATION --}}

            <x-elements.resource-publishing-information :resource="$resource" class="text-xl" />

        @endunless


    </div>
    

</div>