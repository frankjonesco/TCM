@if(session()->has('toast'))


    <div 
        id="toast-success" 
        class="toast-box opacity-0 top-[1rem] -translate-y-full"
        data-replace="{ 'opacity-0': 'opacity-100', 'top-[1rem]': 'top-[5rem]', '-translate-y-full': 'translate-y-full' }"
        role="alert" 
    >


        <div class="toast-text">
            {{session('toast')}}
        </div>


    </div>

    
@endif