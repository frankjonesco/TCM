<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">


    {{-- FORM CARD --}}

    <x-cards.form class="form-{{$model->form_size}}">


        <form action="{{$resource->link('destroy')}}" method="POST">
            

            @csrf
            @method('DELETE')


            {{-- RESOURCE --}}

            <input
                type="hidden" 
                name="resource" 
                value="{{$resource}}"
            >


            {{-- FORM FIELD --}}

            <div class="field">

                @if($model->has_image == true)

                    <x-cards.content-delete-item :title="$resource->title" :image="$resource->fetchImage('tn')" />

                @else

                    <x-cards.content-delete-item :title="$resource->title" />

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


</x-layout.template>