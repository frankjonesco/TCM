<x-layout.app :pageHeadings="$pageHeadings" :viewAssets="$viewAssets">

    <div class="card form-sm">

        <form 
            action="/admin/databases/clone" 
            method="POST"
            class="text-center"
        >

            @csrf

            <a 
                href="#" 
                class="btn-danger"
                onclick="this.parentNode.submit()"
            >
                Clone database
            </a>

        </form>

    </div>

</x-layout.app>