{{-- Image caption & copyright --}}
@if($resource->main_image->caption || $resource->main_image->copyright)
    <div {{$attributes->merge(['class' => 'flex justify-between items-center w-full text-sm font-roboto border border-slate-300 bg-amber-50 rounded-sm shadow-sm px-4 py-2 my-4 text-gray-600'])}}>
        <span class="w-4/5">
            {{$resource->main_image->caption}}
        </span>
        @if($resource->main_image->copyright)
            <span>
                &copy;
                <a 
                    href="{{$resource->main_image->copyright_link}}" 
                    aria-label="Go to the site for {{$resource->main_image->copyright}}" 
                    target="_blank"
                    class="no-underline hover:underline"
                >
                    
                    {{$resource->main_image->copyright}}
                </a>
            </span>
        @endif
    </div>
@endif