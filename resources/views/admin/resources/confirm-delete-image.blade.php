<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">


    {{-- FORM CARD --}}

    <x-cards.form class="form-md">


        <form action="/{{$directory}}/{{$resource->slug}}/images/{{$image->hex}}/destroy" method="POST">
            

            @csrf


            {{-- FORM FIELD --}}

            <div class="field">

                @if($image == true)

                    <x-cards.content-delete :title="$resource->title" :image="$image->fetch('tn')" />

                @else

                    <x-cards.content-delete :title="$resource->title" />

                @endif

            </div>


            {{-- BUTTONS --}}

            <div class="buttons">

                <button
                    type="submit"
                    class="btn-success"
                >Confirm delete</button>

                <a
                    href="/admin/{{$model->directory}}"
                    class="btn-danger"
                >Cancel</a>

            </div>


        </form>


    </x-cards.form>


</x-layout.app>