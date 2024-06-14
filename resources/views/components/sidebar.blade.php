<?php
$authors = \App\Models\Author::get();
$categories = \App\Models\Category::get()->unique();
?>
<style>

</style>
<aside class="book-sections">
    <h1 class="">أقسام الكتب</h1>
    <ul>
        @foreach($categories as $category)
             @if(!ctype_alpha($category->name))
                <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
            @endif
        @endforeach
    </ul>
    <h1 class="author-item">المؤلفين</h1>
    <ul>
        @foreach($authors as $author)
            <li><a href="/authors/{{ $author->id }}">{{ $author->name }}</a></li>
        @endforeach
    </ul>
</aside>
