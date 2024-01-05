{{-- SITE NAVIGATION --}}

<nav id="siteNav">


    <x-blocks.container>
        

        {{-- MAIN MENU ICON --}}

        <span>

            <a 
                id="openMainMenuIcon"
                href="#"
                title="Show main menu"
                aria-label="Show main menu"
            >
                <i class="fa-solid fa-bars"></i>
            </a>

        </span>


        {{-- APP NAME --}}

        <span>

            <a 
                href="/"
                title="{{config('app.name')}} homepage"
                aria-label="{{config('app.name')}} homepage"
            >
                {{config('app.name')}}
            </a>

        </span>


        {{-- SEARACH AND AUTH ICONS --}}

        <span>

            @auth

                <a
                    href="/admin"
                    title="Admin - Manage content"
                    aria-label="Admin - Manage content"
                >
                    <i class="fa-solid fa-hammer"></i>            
                </a>
            
            @endauth

            <a 
                id="toggleSearchBar" 
                href="#" 
                title="Search {{config('app.name')}}" 
                aria-label="Search {{config('app.name')}}"
            >
                <i class="fa-solid fa-search"></i>
            </a>

        </span>

        
    </x-blocks.container>


</nav>




{{-- MAIN MENU --}}


<nav id="mainMenu" class="-translate-x-full">


    {{-- CLOSE MENU ICON --}}

    <x-blocks.container class="close-icon">

        <a
            id="closeMainMenuIcon"
            href="#"
            title="Close main menu"
            aria-label="Close main menu"    
        >
            <i class="fa-solid fa-times"></i>
        </a>

    </x-blocks.container>


    {{-- MENU ITEMS --}}

    <x-blocks.container class="menuItems">


        {{-- CATEGORIES --}}

        <span>

            <a 
                href="/categories"
                title="True crime categories"
                aria-label="True crime categories"
            >
                Categories
            </a>

        </span>


        {{-- CRIMINAL CASES --}}

        <span>

            <a 
                href="/criminal-cases"
                title="True crime criminal cases"
                aria-label="True crime criminal cases"
            >
                Criminal cases
            </a>

        </span>


        {{-- CRIMINALS --}}

        <span>

            <a 
                href="/criminals"
                title="True crime criminals"
                aria-label="True crime criminals"
            >
                Criminals
            </a>

        </span>


        {{-- JUDGES --}}

        <span>

            <a 
                href="/judges"
                title="True crime judges"
                aria-label="True crime judges"
            >
                Judges
            </a>

        </span>


        {{-- NEWS ARTICLES --}}

        <span>

            <a 
                href="/articles"
                title="True crime news articles"
                aria-label="True crime news articles"
            >
                News articles
            </a>

        </span>


        {{-- CONTACT US --}}

        <span>

            <a 
                href="/contact-us"
                title="Contact us"
                aria-label="Contact us"
            >
                Contact us
            </a>

        </span>


        {{-- AUTH MENU ITEMS --}}

        @auth

            {{-- ADMIN --}}

            <span>

                <a 
                    href="/admin"
                    title="Admin - Manage content"
                    aria-label="Admin - Manage content"
                >
                    Admin
                </a>

            </span>


            {{-- LOG OUT --}}

            <span>

                <form 
                    action="/logout"
                    method="post"
                >
                    @csrf

                    <a
                        href="#"
                        onclick="this.parentNode.submit()"
                    >
                        Log out
                    </a>
            
                </form>

            </span>

        {{-- GUEST MENU ITEMS  --}}

        @else

            <span>

                <a 
                    href="/login"
                    title="Log in to True Crime Metrix"
                    aria-label="Log in to True Crime Metrix"
                >
                    Log in
                </a>

            </span>

        @endauth


    </x-blocks.container>


</nav>




{{-- SEARCH BAR --}}

<div id="navSearchBar">

    <form 
        id="navSearchForm"
        action="/grab-search-term" 
        method="POST"
    >
        
        @csrf

        <input 
            id="navSearchInput"
            type="text"
            name="search_term"
            placeholder="Search..."
        >

    </form>
    
</div>