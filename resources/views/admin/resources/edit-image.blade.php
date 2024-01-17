<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">


    
            

        


        <div class="flex gap-6">




            <div class="w-2/3">

                @if($image == true)

                    <img src="{{$resource->imagePath()}}" alt="">

                @endif

            </div>



            <div class="w-1/3">


                <x-cards.form>


                    <form action="/{{$directory}}/{{$resource->slug}}/images/{{$image->hex}}/update" method="POST">


                        @csrf
                        @method('PUT')


                        {{-- BG POSITION --}}

                        <div class="field">
                        
                            <label for="bg_position">
                                Background position
                            </label>

                            <select name="bg_position">
                                <option value="center">Center</option>
                                <option value="left">Left</option>
                                <option value="right">Right</option>
                            </select>
                        
                        </div>




                        {{-- CAPTION --}}

                        <div class="field">

                            <label for="caption">
                                Caption
                            </label>

                            <input
                                type="text"
                                name="caption"
                                placeholder="Caption"
                                value="{{old('caption') ?: $image->caption}}"
                            >

                            <x-elements.validation-error element="caption" />

                        </div>




                        {{-- COPYRIGHT --}}

                        <div class="field">

                            <label for="copyright">
                                Copyright
                            </label>

                            <input
                                type="text"
                                name="copyright"
                                placeholder="Copyright"
                                value="{{old('copyright') ?: $image->copyright}}"
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
                                value="{{old('copyright_link') ?: $image->copyright_link}}"
                            >

                            <x-elements.validation-error element="copyright_link" />

                        </div>


                        {{-- BUTTONS --}}

                        <div class="buttons">

                            <button
                                type="submit"
                                class="btn-success"
                            >Save</button>

                            <a
                                href="/admin/{{$directory}}"
                                class="btn-danger"
                            >Cancel</a>

                        </div>

                    </form>

                </x-cards.form>

            </div>
        
        </div>


    </form>


</x-layout.app>