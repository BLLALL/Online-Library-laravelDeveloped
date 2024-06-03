<nav>

    <div class="container">
        <div class="ba">
            <div class="mobile-menu">
                <button id="menu-toggle">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </button>
                <ul class="menu-items">
                    @auth
                        <li class=""><a href="/account"> حسابي</a></li>
                        <form action="/logOut" method="POST">
                            @csrf
                            <button type="submit"
                                    class="inline bg-gray-100 text-white font-semibold bg-opacity-30 rounded-2xl p-2 mx-1.5 special">
                                تسجيل خروج
                            </button>
                        </form>
                    @else
                        <li class="special"><a href="/signIn">تسجيل الدخول</a></li>
                        <li class="special"><a href="/signUp">انشاء حساب</a></li>
                    @endauth
                    <li><a href="/bookstore">المتجر الالكتروني</a></li>
                    <li><a href="/authors">أسماء المؤلفين</a></li>
                    <li><a href="/categories">اقسام الكتب</a></li>
                    <li><a href="/home">الصفحة الرئيسية</a></li>
                </ul>
            </div>
        </div>
        <ul class="list">
            <div class="log">
                @auth

                    <button
                        class="inline bg-gray-100 text-white font-semibold bg-opacity-30 rounded-2xl p-1.5 mx-1.5 border-0 special">
                        <a href="/account" class="  ">{{ auth()->user()->name }}
                            @if(!request()->is('categories'))
                                <i class="fa-regular fa-user inline"></i>
                            @endif
                        </a>
                    </button>

                    <form action="/logOut" method="POST">
                        @csrf
                        <button type="submit"
                                class="inline bg-gray-100 text-white font-semibold bg-opacity-30 rounded-2xl p-2.5 mx-1 border-0 special">
                            <a class="hover:text-black">تسجيل خروج</a>
                        </button>
                    </form>
                @else

                    <li class="inline bg-gray-100 text-white font-semibold bg-opacity-30 rounded-2xl p-2 mx-1.5 special">
                        <a
                            href="/signIn">تسجيل الدخول</a></li>
                    <li class="inline bg-gray-100 text-white font-semibold bg-opacity-30 rounded-2xl p-2 mx-1 special">
                        <a
                            href="/signUp">انشاء حساب</a></li>
                @endauth
            </div>
            <li><a href="/authors">المؤلفين</a></li>
            <li><a href="/categories">أقسام الكتب</a></li>
            <li><a href="/home">الصفحة الرئيسية</a></li>
        </ul>

        <div class="logo">
            <h1 style="color: white">اقرأ</h1>
            <i class="fa-solid fa-book-open"></i>
        </div>
    </div>
</nav>
