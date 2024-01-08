<x-layout.app :pageHeadings="$pageHeadings">

    <section class="flex gap-6">

        <div class="w-2/3">
            <div>
                <img id="image" src="{{$image->fetch()}}">
            </div>
        </div>
        
        <div class="w-1/3 sidebar">

            <x-cards.form>
                <h3 class="font-bold pb-4">Image details</h3>
                <form action="/{{$resource->modelData('directory')}}/{{$resource->slug}}/images/{{$image->hex}}/render" method="POST" class="flex flex-col">
                    @csrf


                    <input type="hidden" name="x" id="imgX" class="mx-8 mb-6">
                    <input type="hidden" name="y" id="imgY" class="mx-8 mb-6">
                    <input type="hidden" name="w" id="imgW" class="mx-8">
                    <input type="hidden" name="h" id="imgH" class="mx-8 ">


                    {{-- BG position --}}

                    <div class="field">

                        <label for="bg_position">
                            Background position
                        </label>

                        <select name="bg_position">

                            <option value="{{null}}"
                            >Default (center)</option>

                            <option value="left"
                            >Left</option>

                            <option value="right"
                            >Right</option>

                        </select>

                        <x-elements.validation-error element="bg_position" />

                    </div>


                    {{-- CAPTION --}}

                    <div class="field">

                        <label for="caption">
                            Image caption
                        </label>

                        <textarea
                            name="caption"
                            placeholder="Image caption"
                            rows="3"
                        >{{old('caption')}}</textarea>

                        <x-elements.validation-error element="caption" />

                    </div>


                    {{-- COPYRIGHT --}}

                    <div class="field">

                        <label for="short_name">
                            Copyright
                        </label>

                        <input
                            type="text"
                            name="copyright"
                            placeholder="Copyright owner"
                            value="{{old('copyright')}}"
                        >

                        <x-elements.validation-error element="copyright" />

                    </div>


                    {{-- COPYRIGHT LINK --}}

                    <div class="field">

                        <label for="copyright_link">
                            Copyright link
                        </label>

                        <input
                            type="text"
                            name="copyright_link"
                            placeholder="Copyright link"
                            value="{{old('copyright_link')}}"
                        >

                        <x-elements.validation-error element="copyright_link" />

                    </div>

        
                    {{-- BUTTONS --}}

                    <div class="col-span-2 flex flex-col items-center gap-5">

                        <button 
                            type="submit"
                            class="btn-success"
                        >Save</button>

                        <a
                            href="/dashboard"
                            class="block text-xs underline"
                        >Or select another image</a>

                    </div>

                </form>

            </x-cards.form>

        </div>

    </section>


    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js'></script>

    <script>
        const image = document.getElementById('image');
        const cropper = new Cropper(image, {
            viewMode: 2,
            aspectRatio: 96 / 54,
            autoCropArea: 0.8,
            movable: false,
            scalable: false,
            zoomable: false,
            crop(event) {
                x = event.detail.x;
                y = event.detail.y;
                width = event.detail.width;
                height = event.detail.height;
                document.getElementById('imgX').value=Math.round(x * 10) / 10;
                document.getElementById('imgY').value=Math.round(y * 10) / 10;
                document.getElementById('imgW').value=Math.round(width * 10) / 10;
                document.getElementById('imgH').value=Math.round(height * 10) / 10;
                // console.log(event.detail.x);
                // console.log(event.detail.y);
                // console.log(event.detail.width);
                // console.log(event.detail.height);
                // console.log(event.detail.rotate);
                // console.log(event.detail.scaleX);
                // console.log(event.detail.scaleY);
            },
        });
    </script>
</x-layout.app>