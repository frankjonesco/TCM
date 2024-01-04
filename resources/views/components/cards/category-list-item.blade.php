<div class="category-list-item">

    <div>
        

        {{-- TITLE & DESCRIPTION --}}

        <span>
            
            <a 
                href="{{$category->link()}}" 
                aria-label="{{$category->linkLabel()}}"
            >
                {{$category->name}}
            </a>

            <div>{{$category->description}}</div>

        </span>



        {{-- COUNT --}}

        <span>

            {{count($category->criminal_cases)}}

        </span> 


    </div>

                
</div>