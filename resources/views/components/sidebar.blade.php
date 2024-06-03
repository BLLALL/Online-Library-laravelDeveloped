<aside>
    <h1 class="lable">أقسام الكتب</h1>
    <ul>
        @foreach($books as $book)
            <li><a href="/categories/{{ $book->category->id }}">{{ $book->category->name }}</a></li>
        @endforeach
    </ul>
    <h1 class="lable">المؤلفين</h1>
    <ul>
        @foreach($books as $book)
            <li><a href="/authors/{{ $book->author->id }}">{{ $book->author->name }}</a></li>
        @endforeach
    </ul>
</aside>
