<div class="side-nav">

    
    {{-- SIDE NAV MENU --}}

    <ul>

        @foreach($navButtons as $button)

            <li>
                <button 
                    class="btn" 
                    scroll-to="{{$button['scroll-to']}}"
                >{{$button['name']}}</button>
            </li>

        @endforeach

    </ul>


</div>


<script>


    // SCROLL-TO FUNCTION

    function scrollTo(element) {

        window.scroll({
            behavior: 'smooth',
            left: 0,
            top: element.offsetTop - 100
        });

    }


    // BUTTONS IN SIDE NAV

    var buttons = document.querySelectorAll('.side-nav .btn');
    

    // SCROLL TO SECTION ON CLICK

    buttons.forEach((button) => {

        let sectionTag = button.getAttribute('scroll-to');

        button.addEventListener('click', () => {
            scrollTo(document.querySelector('#' + sectionTag));
        });

    });


</script>