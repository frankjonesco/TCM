<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">


    {{-- CK EDITOR JS --}}

    @include('includes._ckeditor-head-script')


    {{-- FORM CARD --}}
    
    <x-cards.form class="form-{{$model->form_size}}">


        <form action="{{$resource->link('update')}}" method="POST">


            @csrf
            @method('PUT')
            


            {{-- FORM FIELDS --}}
            
            @foreach($form_fields as $form_field)

                @include('includes.form.'.$form_field)

            @endforeach



            {{-- BUTTONS --}}

            @include('includes.form.buttons-edit')



        </form>



    </x-cards.form>



</x-layout.app>