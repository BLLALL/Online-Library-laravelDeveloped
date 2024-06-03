<title>{{ $book->title }}</title>
<x-layout>
    <link rel="stylesheet" href="/CSS/book_details.css">
    <!-- navbar -->
    <header>
        <x-nav/>
    </header>
    <!--End navbar -->

    <!-- start details -->
    <main>
        <div class="container">
            <div class="card_details">
                <div class="content_card">
          <span class="detail">
            <div class="name_book">
              <span>{{ $book->title }}</span>
            </div>
            <div class="authors">
              <span class="name">المؤلف:</span>
              <span class="cont hover:underline"><a href="/authors/{{ $book->author->id }}"
                                                    class="text-decoration-none"
                                                    style="color: inherit;">{{ $book->author->name }}</a></span>
            </div>
            <div class="categ">
              <span class="name">القسم:</span>
              <span class="cont hover:underline"><a href="/categories/{{ $book->category->id }}"
                                                    class="text-decoration-none"
                                                    style="color: inherit">{{ $book->category->name }}</a></span>
            </div>
            <div class="lang">
              <span class="name">اللغه:</span>
              <span class="cont">العربية</span>
            </div>

            <div class="type">
              <span class="cont">pdf</span>
              <span class="name">:نوع الملف</span>
            </div>
            <div class="discription">
              <span class="name">وصف الكتاب:</span>
              <span class="cont" style="margin-left: 30px;line-height: 35px;">
                  {{ $book->description }}
              </span>
            </div>
          </span>
                    <img src="/images/{{ $book->bookCover ?? 'الشوقيات.jpg'}}" alt="Ekadolly">
                </div>
            </div>
        </div>
        @if($book->book)
            <div class="circles">
                <div class="loading">
                    <span><i class="fa-solid fa-download"></i></span>
                    <p><a class="font-semibold" href="/download/{{ $book->id }}">تحميل</a></p>
                </div>
                <div class="reading">
                    <span><i class="fa-solid fa-book-open"></i></span>
                    <p><a class="font-semibold" href="/preview/{{ $book->id }}">قراءة</a></p>
                </div>
            </div>
        @else
            <p class="text-center font-bold mt-8">الكتاب غير متوفر لدينا</p>
        @endif
    </main>

</x-layout>
