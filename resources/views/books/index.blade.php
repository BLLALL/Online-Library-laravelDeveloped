<title>اقرأ</title>
<x-layout>
    <link rel="stylesheet" href="CSS/style.css">
    <header>
        <x-nav/>
    </header>
    <div class="desc">
        <div class="container">
            <p> موقع عربي متكامل لقراءه وتحميل الكتب</p>
            <p class="tst"> وامكانية شراء الكتب الورقيه</p>
            <!-- Search -->
            <div class="search">
                <form method="GET" action="/home">
                    <input type="text" name="search" placeholder="البحث عن اسم كتاب او مؤلف"
                           value="{{ request('search') }}">
                    <button type="submit">
                        <i class="fa-solid fa-magnifying-glass srch "></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container d-flex">
            @if(!request('search'))
                <x-sidebar/>
            @endif
            <div class="all flex-grow-1">
                <div class="newadd  text-right">
                    <h2>
                        المضاف حديثا
                    </h2>
                    @if($books->count())
                        <div
                            class="row row-cols-1 row-cols-lg-{{  4 }} row-cols-md-2 row-cols-sm-1 g-4 ms-2 mt-1">
                            @foreach($books as $book)
                                <div class="col  text-right">

                                    <div class="card one">
                                        <a href="books/{{ $book->id }}" class="text-decoration-none text-black">
                                            <img
                                                src="./images/{{ $book->bookCover ?? 'الماجريات.jpg' }}"
                                                class="w-full h-auto max-w-full max-h-full object-cover"
                                                alt="{{ $book->title }}">
                                        </a>
                                        <div class="card-body">
                                            <a href="books/{{ $book->id }}" class="text-decoration-none text-black">
                                                <h5 class="card-title book-name">{{ $book->title }}</h5>
                                            </a>
                                            <a href="/authors/{{ $book->author->id }}"
                                               class="text-decoration-none text-black"
                                            >
                                                <p class="card-text author">
                                                    {{ $book->author->name }}
                                                </p>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @else
                        <p class="text-center py-1.5">لم نجد شيئا يوافق بحثك</p>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <x-flash/>
    <x-footer/>

</x-layout>
