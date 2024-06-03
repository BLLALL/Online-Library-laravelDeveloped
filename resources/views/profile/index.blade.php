<title>حسابي</title>
<x-layout>
    <link rel="stylesheet" href="/CSS/my_acc.css">

    <!-- Nav -->
    <header>
        <x-nav/>
    </header>
    <div class="container">
        <section>
            <div class="headimg">
                <h1> الحساب الشخصي</h1>
            </div>
            <div class="btns">
                <button x-on:click="{{ redirect('/accDetails') }}"><a href="/accDetails">بيانات حسابي</a><i class="fa-solid fa-user sp"></i></button>
                <button><a href="/favourites">مفضلاتي</a><i class="fa-solid fa-heart sp"></i></button>
            </div>
        </section>
    </div>
</x-layout>

