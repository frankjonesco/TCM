@props([
    'alert',
    'type',
])

@if(session()->has('alert'))

    <div {{$attributes->merge(['class' => 'alert-warning'])}}>

        <i class="fa-solid fa-lock mr-2"></i>
        {{session('alert')}}

    </div>


@elseif(isset($alert))

    <div {{$attributes->merge(['class' => 'alert-'.(isset($type) ? $type : 'success')])}}>

        <i class="fa-solid fa-info-circle mr-2"></i>
        {{$alert}}

    </div>


@elseif(isset($formError))

    <div {{$attributes->merge(['class' => 'alert-danger'])}}>

        <i class="fa-solid fa-lock mr-2"></i>
        {{$formError}}

    </div>
    
@endif