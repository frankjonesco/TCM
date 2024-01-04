@if($category)

        <a 
            href="{{$category->link()}}" 
            {{$attributes->merge(['class' => 'category-pip bg-'.$category->color])}}
        >
            {{$category->name}}
        </a>

@endif
