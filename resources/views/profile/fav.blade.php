<x-layout>
    <link rel="stylesheet" href="../CSS/fav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>مفضلاتي</title>

    <!-- Nav -->
    <header>
        <x-nav/>
    </header>
    <section>
        <h1> مفضلاتي </h1>
        <div class="cards">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                @foreach($favbooks as $favbook)
                <div class="col">
                        <div class="card">
                            <a href="/books/{{ $favbook->id }}"><img src="{{ Storage::url($favbook->bookCover) }}" class="card-img-top" alt="{{ $favbook->title }}"></a>
                            <div class="card-body">
                                <a href="/books/{{ $favbook->id }}" class="text-decoration-none text-black"><h5 class="card-title">{{ $favbook->title }}</h5></a>
                            </div>
                        </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

</x-layout>
