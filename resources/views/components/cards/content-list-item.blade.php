

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

        @php
            $category = $resource->category;

            if($resource->modelData('name') === 'Criminal'){
                $category = $resource->criminal_case->category;
            }
            if($resource->modelData('name') === 'Article'){
                $category = $resource->criminal_case->category;
            }
        @endphp

        @unless(isset($hidePip) && $hidePip === true)
            @if(isset($listSize) && $listSize === 'sm')

                <x-elements.category-pip :category="$category" class="category-pip-sm" />

            @else

                <x-elements.category-pip :category="$category" />

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




        {{--  --}}

        @if($resource->modelData('name') === 'Judge')

            <span class="font-poppins font-light text-sm pb-1.5">{{$resource->county->name.', '.$resource->state->name}}</span>

        @endif




        @unless(isset($listSize) && $listSize === 'sm')

            {{-- RESOURCE PUBLISHING INFORMATION --}}

            <x-elements.resource-publishing-information :resource="$resource" />

        @endunless




    </div>
    

</div>