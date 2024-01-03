<div {{$attributes->exceptProps(['pageHeadings'])->merge(['class' => 'page-headings'])}}>


    @unless(empty($pageHeadings[0]))

        <h1>
            {{$pageHeadings[0]}}
        </h1>

    @endunless


    @unless(empty($pageHeadings[1]))

        <h2>
            {!!$pageHeadings[1]!!}
        </h2>

    @endunless
    

</div>