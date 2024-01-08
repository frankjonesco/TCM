<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">


    {{-- CK EDITOR JS --}}

    @include('includes._ckeditor-head-script')
    
     
    
    {{-- FORM CARD --}}

    <x-cards.form class="form-{{$model->form_size}}">


        <form action="/{{$model->directory}}/store" method="POST" enctype="multipart/form-data">


            @csrf
            @method('POST')

                        
            {{-- FORM FIELDS --}}

            @foreach($form_fields as $form_field)
                @include('includes.form.'.$form_field)
            @endforeach


            {{-- BUTTONS --}}

            @include('includes.form.buttons-create')


        </form>


    </x-cards.form>
    

</x-layout.app>