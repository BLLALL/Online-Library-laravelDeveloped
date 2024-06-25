<title>المؤلفين</title>
<x-layout>
    <link rel="stylesheet" href="/CSS/auther.css">
{{--    <link rel="stylesheet" href="CSS/style.css">--}}

    <header>
        <x-nav/>
    </header>

    <div class="container">
        <div class="auther">
            <h2>
                المؤلفين
            </h2>
            @if($authors->count())
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($authors as $author)

                        <div class="col">
                            <div class="card">
                                <a href="authors/{{ $author->id }}"><img
                                        src="{{ Storage::url( $author->author_photo) ?? './images/أحمد شلبي.jpg'}}" class="card-img-top"
                                        alt="{{ $author->name }}"></a>
                                <div class="card-body">
                                    <a href="/authors/{{ $author->id }}"
                                       class="text-decoration-none text-black"
                                    >
                                    <h5 class="card-title">{{ $author->name }}</h5>
                                    </a>
                                    <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center py-1.5">لا يوجد مؤلفين حتى الان من فضلك أعد المحاولة في وقت لاحق.</p>
            @endif

        </div>
    </div>

    @if($authors->count())
        <x-footer/>

    @endif
</x-layout>
