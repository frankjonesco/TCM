{{-- SITE FOOTER --}}

<footer id="siteFooter">


    {{-- SITE LOGO --}}

    <a
        href="/"
        title="Go to True Crime Metrix homepage"
        aria-label="Go to True Crime Metrix homepage"
        class="logo"
    >
        {{config('app.name')}}
    </a>

    


    {{-- NAVIGATION --}}
  
    <nav>


        {{-- ABOUT --}}

        <a 
            href="/about-us"
            title="About {{config('app.name')}}"
            aria-label="About {{config('app.name')}}"
        >
            About
        </a>


        {{-- CONTACT US --}}

        <a 
            href="/contact-us"
            title="Contact us"
            aria-label="Contact us"
        >
            Contact us
        </a>


        {{-- OPPORTUNITES --}}

        <a 
            href="/opportunities"
            title="Opportunities at {{config('app.name')}}"
            aria-label="Opportunities at {{config('app.name')}}"
        >
            Opportunities
        </a>


        {{-- PRIVACY POLICY --}}

        <a 
            href="/privacy-policy"
            title="View privacy policy"
            aria-label="View privacy policy"
        >
            Privacy policy
        </a>


        {{-- TERMS OF USE --}}

        <a 
            href="/terms-of-use"
            title="View terms of use"
            aria-label="View terms of use"
        >
            Terms of use
        </a>

    </nav>




    {{-- SOCIAL NETWORKS --}}

    <div class="social-networks">

        <span>
            Stay connected
        </span>


        {{-- FACEBOOK ICON --}}

        <a 
            href="{{config('settings.facebook_url')}}"
            target="_blank"
            title="Follow {{config('app.name')}} on Facebook"
            aria-label="Follow {{config('app.name')}} on Facebook"
        >
            <i class="fa-brands fa-facebook-f"></i>
        </a>


        {{-- TWITTER ICON --}}

        <a 
            href="{{config('settings.twitter_url')}}"
            target="_blank"
            title="Follow {{config('app.name')}} on Twitter"
            aria-label="Follow {{config('app.name')}} on Twitter"
        >
            <i class="fa-brands fa-twitter"></i>
        </a>


        {{-- YOUTUBE ICON --}}

        <a 
            href="{{config('settings.youtube_url')}}"
            target="_blank"
            title="Find {{config('app.name')}} on YouTube"
            aria-label="Find {{config('app.name')}} on YouTube"
        >
            <i class="fa-brands fa-youtube"></i>
        </a>


        {{-- INSTAGRAM ICON --}}

        <a 
            href="{{config('settings.instagram_url')}}"
            target="_blank"
            title="Follow {{config('app.name')}} on Instagram"
            aria-label="Follow {{config('app.name')}} on Instagram"
        >
            <i class="fa-brands fa-instagram"></i>
        </a>


    </div>




    {{-- LEGALS --}}

    <div class="legals">


        <span>
            {{config('app.name')}} Ltd.
        </span>

        
        <span>
            All rights reserved. &copy; {{date('Y', time())}}
        </span>


        <span>
            Powered by 
            <a 
                href="https://soapboxcoder.com"
                target="_blank"
                title="Go to soapboxcoder.com"
                aria-label="Go to soapboxcoder.com"
            >
                SoapboxCoder
            </a>
        </span>


    </div>


</footer>