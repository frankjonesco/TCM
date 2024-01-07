<section class="admin-content">


    {{-- CONTENT HEADING --}}

    <div class="heading">


        <span>Judges</span>


        <div class="flex gap-3">

            <a 
                href="/admin/judges" 
                class="btn"
            >
                <i class="fa-solid fa-list"></i>
                View all
            </a>
            

            <a
                href="/judges/create"
                class="btn"
            >
                <i class="fa-solid fa-plus"></i>
                Create judge
            </a>


        </div>

    
    </div>


    {{-- CONTNT TABLE --}}

    <table class='content-table'>


        {{-- TABLE HEAD --}}

        <thead>

            <tr>
                <th>Hex</th>
                <th class="text-left">Title</th>
                
                <th></th>
                <th></th>
                <th>Views</th>
                <th></th>
            </tr>

        </thead>


        {{-- TABLE BODY --}}
                
        <tbody>

            @foreach($judges as $judge)

                <tr class="{{$loop->iteration % 2 == 0 ? 'alternate-row' : null}}">

                    <td>{{$judge->hex}}</td>
                    <td>
                        <div class="image-and-title">
                            <img src="{{$judge->imagePath(true, 'tn')}}">
                            <span>
                                <a href="{{$judge->link()}}">
                                    {{$judge->title}}
                                </a>
                            </span>
                        </div>
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        {{formatViews($judge->views)}}
                    </td>
                    <td>
                        <x-elements.resource-crud-buttons :resource="$judge" />
                    </td>

                </tr>

            @endforeach

        </tbody>


    </table>


    {{-- PAGINATION --}}

    {{$judges->links()}}


</section>