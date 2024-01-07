<section class="admin-content">


    {{-- CONTENT HEADING --}}

    <div class="heading">


        <span>News articles</span>


        <div class="flex gap-3">

            <a 
                href="/admin/articles" 
                class="btn"
            >
                <i class="fa-solid fa-list"></i>
                View all
            </a>
            

            <a
                href="/articles/create"
                class="btn"
            >
                <i class="fa-solid fa-plus"></i>
                Create article
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

            @foreach($articles as $article)

                <tr class="{{$loop->iteration % 2 == 0 ? 'alternate-row' : null}}">

                    <td>{{$article->hex}}</td>
                    <td>
                        <div class="image-and-title">
                            <img src="{{$article->imagePath(true, 'tn')}}">
                            <span>
                                <a href="{{$article->link()}}">
                                    {{$article->title}}
                                </a>
                            </span>
                        </div>
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        {{formatViews($article->views)}}
                    </td>
                    <td>
                        <x-elements.resource-crud-buttons :resource="$article" />
                    </td>

                </tr>

            @endforeach

        </tbody>


    </table>


    {{-- PAGINATION --}}

    {{$articles->links()}}


</section>