<title>{{ $category->name }}</title>
<x-layout>
    <link rel="stylesheet" href="/CSS/auther.css">

    <header>
        <x-nav/>
    </header>

    <div class="container">
        <div class="auther">
            <h2>
                {{ $category->name }}

            </h2>
            @if($category->books->count())
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($category->books as $book)

                        <div class="col">
                            <div class="card">
                                <a href="/authors/{{ $book->id }}"><img
                                        src="{{ Storage::url($book->bookCover) ?? "بلاد ما بين النهرين./images/jpg"}}" class="card-img-top"
                                        alt="{{ $book->title }}"></a>
                                <div class="card-body">
                                    <a href="/authors/{{ $book->id }}"
                                       class="text-decoration-none text-black"
                                    >
                                        <h5 class="card-title">{{ $book->title }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center py-1.5">لا يوجد كتب في هذا القسم.</p>
            @endif

        </div>
    </div>

    @if($category->books->count())
        <x-footer/>

    @endif
</x-layout>
