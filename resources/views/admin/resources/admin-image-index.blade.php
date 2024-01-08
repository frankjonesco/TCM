<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">



    <div class="flex justify-end gap-3">


        {{-- UPLOAD NEW IMAGE BUTTON --}}

        <form
            id="formUploadImage"
            action="/{{$directory}}/{{$resource->slug}}/images/upload"
            method="post"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            {{--  Set as main value (hidden) --}}

            <input
                type="hidden"
                name="set_as_main"
                value="{{false}}"
            >


            {{-- Status (hidden) --}}

            <input 
                type="hidden"
                name="status"
                value="public"
            >


            {{-- Upload image button --}}

            <button 
                type="button"
                class="btn-success"
                onclick="imageInput.click()"
            >
                <i class="fa-regular fa-image mr-2"></i> 
                <span id="browseText">
                    Add image
                </span>
            </button>


            {{-- Image file input (hidden) --}}

            <input 
                id="imageInput"
                name="image"
                type="file"
                class="opacity-0 w-0 h-0"
            >


            {{-- JS to submit form on file select --}}

            <script>

                const imageInput = document.querySelector('#imageInput');
                const formUploadImage = document.querySelector('#formUploadImage');

                imageInput.onchange = function() {
                    formUploadImage.submit();
                };

            </script>


        </form>

    </div>


    @if(count($images) > 0)

    

        <section class="grid grid-cols-5 gap-6">

            @foreach($images as $image)

                <div>
                    <div class="border">
                        <img src="{{$image->fetch('tn')}}" alt="" class="w-full">
                    </div>

                    <a href="{{$resource->link('images/'.$image->hex.'/delete')}}" class="btn-danger">
                        <i class="fa-solid fa-trash"></i>
                        Delete
                    </a>
                </div>

            @endforeach

        </section>

    @endif

    

</x-layout.app>