<section class="admin-content">


    {{-- CONTENT HEADING --}}

    <div class="heading">


        <span>Categories</span>


        <div class="flex gap-3">

            <a 
                href="/admin/categories" 
                class="btn"
            >
                <i class="fa-solid fa-list"></i>
                View all
            </a>
            

            <a
                href="/categories/create"
                class="btn"
            >
                <i class="fa-solid fa-plus"></i>
                Create category
            </a>


        </div>

    
    </div>


    {{-- CONTNT TABLE --}}

    <table class='content-table'>


        {{-- TABLE HEAD --}}

        <thead>

            <tr>
                <th>Hex</th>
                <th class="text-left">Name</th>
                <th>Criminal Cases</th>
                <th></th>
            </tr>

        </thead>


        {{-- TABLE BODY --}}
                
        <tbody>

            @foreach($categories as $category)

                <tr class="{{$loop->iteration % 2 == 0 ? 'alternate-row' : null}}">

                    <td>{{$category->hex}}</td>
                    <td class="!text-left">
                        <a 
                            href="{{$category->link()}}" 
                            title="{{$category->linkLabel()}}" 
                            aria-label="{{$category->linkLabel()}}"
                        >
                            {{$category->name}}
                        </a>
                    </td>
                    <td>
                        {{count($category->criminal_cases)}}
                    </td>
                    <td>
                        <x-elements.resource-crud-buttons :resource="$category" />
                    </td>

                </tr>

            @endforeach

        </tbody>


    </table>


    {{-- PAGINATION --}}

    {{$categories->links()}}


</section>