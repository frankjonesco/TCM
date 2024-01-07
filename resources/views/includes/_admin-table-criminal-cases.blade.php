<section class="admin-content">


    {{-- CONTENT HEADING --}}

    <div class="heading">


        <span>Criminal cases</span>


        <div class="flex gap-3">

            <a 
                href="/admin/criminal-cases" 
                class="btn"
            >
                <i class="fa-solid fa-list"></i>
                View all
            </a>
            

            <a
                href="/criminal-cases/create"
                class="btn"
            >
                <i class="fa-solid fa-plus"></i>
                Create criminal case
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
                
                <th>State</th>
                <th>City</th>
                <th>Views</th>
                <th></th>
            </tr>

        </thead>


        {{-- TABLE BODY --}}
                
        <tbody>

            @foreach($criminal_cases as $criminal_case)

                <tr class="{{$loop->iteration % 2 == 0 ? 'alternate-row' : null}}">

                    <td>{{$criminal_case->hex}}</td>
                    <td>
                        <div class="image-and-title">
                            <img src="{{$criminal_case->imagePath(true, 'tn')}}">
                            <span>
                                <a href="{{$criminal_case->link()}}">
                                    {{$criminal_case->title}}
                                </a>
                            </span>
                        </div>
                    </td>
                    <td>
                        {{$criminal_case->state ? $criminal_case->state->name : ($criminal_case->country ? $criminal_case->country->name : null)}}
                    </td>
                    <td>
                        {{$criminal_case->city->name}}
                    </td>
                    <td>
                        {{formatViews($criminal_case->views)}}
                    </td>
                    <td>
                        <x-elements.resource-crud-buttons :resource="$criminal_case" />
                    </td>

                </tr>

            @endforeach

        </tbody>


    </table>


    {{-- PAGINATION --}}

    {{$criminal_cases->links()}}


</section>