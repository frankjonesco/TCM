<div class="crud-buttons-row">

    <a href="{{$resource->link('edit')}}">
        <i class="fa-solid fa-marker"></i>
    </a>

    <a href="{{$resource->link('images')}}">
        <i class="fa-solid fa-image"></i>
    </a>

    <a href="{{$resource->link('confirm-delete')}}">
        <i class="fa-solid fa-trash"></i>
    </a>

    @if($resource->status === 'private')
        <form action="{{$resource->link('make-public')}}" method="post">
            <a href="#" onclick="submitMakePublic()">
                <i class="fa-solid fa-lock text-red-600"></i>
            </a>
        </form>
    @elseif($resource->status === 'public')
        <form action="{{$resource->link('make-private')}}" method="post">
            <a href="#" onclick="submitMakePrivate(e)">
                <i class="fa-solid fa-lock text-green-600"></i>
            </a>
        </form>
    @endif
   
</div>



<script>

    var form = document.getElementById("upload-form"),
        actionPath = "";
        formData = null;

    var xhr = new XMLHttpRequest();

    var submitMakePrivate = function(e){
        e.preventDefault();
        console.log('asas');

        // form.addEventListener("submit", (e) => {
        //     e.preventDefault();
            
        //     formData = new FormData(form);
        //     actionPath = form.getAttribute("action");

        //     xhr.open("POST", actionPath);
        //     xhr.send(formData);

        // }, false);

    }

    

</script>