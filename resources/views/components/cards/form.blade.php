@if($errors->any())
    <x-elements.alert :form-error="$errors->first()" />
@endif

<div {{$attributes->merge(['class' => 'card form'])}}>
    {{$slot}}
</div>