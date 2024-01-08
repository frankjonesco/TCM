<section class="admin-content">


    {{-- CONTENT HEADING --}}

    <div class="heading">


        <span>Criminals</span>


        <div class="flex gap-3">

            <a 
                href="/admin/criminals" 
                class="btn"
            >
                <i class="fa-solid fa-list"></i>
                View all
            </a>
            

            <a
                href="/criminals/create"
                class="btn"
            >
                <i class="fa-solid fa-plus"></i>
                Create criminal
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
                
                <th>DOB</th>
                <th>Star sign</th>
                <th>Criminal status</th>
                <th></th>
            </tr>

        </thead>


        {{-- TABLE BODY --}}
                
        <tbody>

            @foreach($criminals as $criminal)

                <tr class="{{$loop->iteration % 2 == 0 ? 'alternate-row' : null}}">

                    <td>{{$criminal->hex}}</td>
                    <td>
                        <div class="image-and-title">
                            <img src="{{$criminal->imagePath(true, 'tn')}}">
                            <span>
                                <a href="{{$criminal->link()}}">
                                    {{$criminal->title}}
                                </a>
                            </span>
                        </div>
                    </td>
                    <td>
                        {{$criminal->date_of_birth_short}}
                    </td>
                    <td>
                        {{$criminal->star_sign}}
                    </td>
                    <td>
                        {{formatViews($criminal->views)}}
                    </td>
                    <td>
                        <x-elements.resource-crud-buttons :resource="$criminal" />
                    </td>

                </tr>

            @endforeach

        </tbody>


    </table>


    {{-- PAGINATION --}}

    {{$criminals->links()}}


</section>