<title>أقسام الكتب</title>
<x-layout>
    <link rel="stylesheet" href="CSS/cat2.css">

    <header>
        <x-nav/>
    </header>


    <div class="container">
        <!-- title -->
        <div class="title">
            <p class="mb-2">أقسام الكتب</p>
        </div>
        <!-- search -->
        <div class="search">
            <form method="GET">
                <input type="text" name="search" required placeholder="البحث عن قسم">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <!-- category -->
        <div class="book_categories">
            <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 row-cols-sm-1 g-4 ms-2 mt-1">

                @foreach($categories as $category)
                    <div class="col">
                        <div class="card">
                            <a href="categories/{{ $category->id }}"><img
                                    src="./images/{{ $category->category_photo ?? "الادب العربي.jpg"}}"
                                    class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title book-name"><a class="text-decoration-none text-black"
                                                                    href="categories/{{ $category->id }}"> {{ $category->name }} </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @if($categories->count())
        <x-footer/>

    @endif
</x-layout>
