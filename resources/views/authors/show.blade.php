<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل المؤلف</title>
    <link rel="stylesheet" href="/CSS/all.css">
    <link rel="stylesheet" href="/CSS/all.min.css">
    <link rel="stylesheet" href="/CSS/autherDet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&family=Katibeh&family=Reem+Kufi:wght@700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
<!-- navbar -->
<header>
    <x-nav/>
</header>
<!--End navbar -->
<!-- start details -->
<main>
    <div class="container">
        <div class="card_details">
            <div class="photo_author">
                <img src="/images/{{ $author->author_photo ?? "ليس له صورة.png" }}" alt="photo_author">
            </div>
            <div class="all_details">
                <p class="name_author">{{ $author->name }}</p>
                <div class="details_author">
                    <p>{{ $author->description }}</p>
                    <div class="py-2">
                    </div>
                </div>
            </div>
        </div>
        <!-- all books -->
        <div class="allbooks">
            <div class="name">
                <p>كتب المؤلف المتوفرة لدينا</p>
                <hr>
            </div>
            <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 row-cols-sm-1 g-2 ms-2 mt-5">
                @foreach($author->books as $book)
                    <div class="col card_1">
                        <a href="/books/ {{ $book->id }}" class="text-decoration-none">
                            <div class="card one">
                                <img class="img1" src="/images/{{ $book->bookCover ?? "fr.png" }}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h5 class="card-title book-name">{{ $book->title }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</main>
<!-- End details -->
<!--  start footer -->
<footer>
    <p class="cpy">جميع حقوق الملكيه محفوظه للمؤلفين والموقع غير مسؤول عن افكار المؤلفين</p>
    <div class="flx">
        <p>: تواصل معنا </p>
        <div class="container">
            <ul>
                <li><a href="#">Iqraa.facebook.com<i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="#">Iqraa420@gmail.com<i class="fa-solid fa-envelope"></i></a></li>
                <li><a href="#">Iqraa.instagram.com<i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#">Iqraa.twitter.com<i class="fa-brands fa-twitter"></i></a></li>
            </ul>
        </div>
    </div>
</footer>
<!--  end footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
