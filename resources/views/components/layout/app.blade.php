<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('images/favicon-94x94.png')}}">
    

    @meta_tags

    <meta property="og:site_name" content="{{config('app.name')}}" />
    {{-- <meta property=“og:title” content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="article" />
    <meta property="article:publisher" content="https://truecrimemetrix.com" />
    <meta property="article:section" content="Coding" />
    <meta property="article:tag" content="Coding" /> --}}
    <meta id="ogImage" property="og:image" content="" />
    {{-- <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="640" />
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:image" content="" />
    <meta property="twitter:site" content="@truecrimemetrix" />

    <script>

        function getMetaData(attr,val){
            return document.querySelector(`[${attr}=${val}]`).content;
        }

        

        window.addEventListener('load', function(){

            var metaTitle = document.getElementsByTagName('title')[0].innerHTML;
            var metaDescription = console.log(getMetaData('name','description'));

       
            document.head.querySelector('meta[property="og:title"]').setAttribute("content", "Example with og title meta tag");

        });
    </script> --}}


    {{-- GOOGLE FONTS --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,400;0,600;0,700;1,300;1,400;1,600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');">


    <!-- GOOGLE ADSENSE -->

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5443411235770747"
     crossorigin="anonymous"></script>



    <!-- GOOGLE ANALYTICS -->
    
    <script defer src="https://www.googletagmanager.com/gtag/js?id={{config('settings.google_analytics_tag')}}"></script>
    <script defer>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '{{config('settings.google_analytics_tag')}}');
    </script>




    {{-- BUILD SCRIPTS --}}

    @if(environmentIsProduction())

        @foreach(explodeCssAssets() as $cssAsset)

            <link href="{{ asset('build/assets/'.trim($cssAsset))}}"  rel="preload" as="style" onload="this.rel='stylesheet'">

        @endforeach

        @foreach(explodeJsAssets() as $jsAsset)

            <script src="{{ asset('build/assets/'.trim($jsAsset)) }}" defer></script>

        @endforeach


    @else

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    @endif


    {{-- COOKIE CONSENT --}}

    @cookieconsentscripts

    
</head>
<body>

    
    <x-layout.navigation />


    <main>

        <x-blocks.container class="{{isset($containerClass) ? $containerClass : null}}">
        
            @if(empty($pageHeadings) === false)
                <x-cards.page-headings :pageHeadings="$pageHeadings" />
            @endif
            
            {{$slot}}

        </x-blocks.container>

    </main>


    <x-layout.footer />


    <x-cards.toast />


    <x-blocks.blackout />


    @cookieconsentview


</body>
</html>