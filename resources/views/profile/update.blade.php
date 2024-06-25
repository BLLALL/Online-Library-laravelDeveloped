<title>بيانات حسابي</title>
<x-layout>
    <link rel="stylesheet" href="/CSS/profile.css">
    <div class="all">
        <header>
            <x-nav />
        </header>
        <section>
            <div class="details">
                <h1>بياناتي</h1>
                <p> : اسم المستخدم </p>
                <p> {{ $user->name }} </p>
                <p> : البريد الالكتروني </p>
                <p> {{ $user->email }} </p>
            </div>
            <button class="clkchg" onclick="displayChg()">تعديل البيانات</button>
            <div class="changeDetails">
                <form action="/update" id="dis" method="POST">
                    @csrf
                    <label for="name">: (جديد) الاسم</label>
                    <input type="text" name="name" id="name">
                    @error("name")
                    <p class="text-red-950 ">{{ $message }}</p>
                    @enderror
                    <label for="old_password"> : (القديمه) كلمة المرور</label>
                    <input type="password" name="old_password" id="old_password" required>
                    @error("old_password")
                    <p class="text-red-950 ">{{ $message }}</p>
                    @enderror
                    <label for="new_password"> : (جديد) كلمة المرور</label>
                    <input type="password" name="new_password" id="new_password">
                    @error("new_password")
                    <p class="text-red-950 ">{{ $message }}</p>
                    @enderror
                    <label for="email"> : (جديد) البريد الالكتروني</label>
                    <input type="email" name="email" id="email">
                    @error("email")
                    <p class="text-red-950 ">{{ $message }}</p>
                    @enderror
                    <div>
                        <button>تعديل</button>
                    </div>
                </form>
            </div>
        </section>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <script src="/JS/newwwww.js"></script>
    </body>

    </html>
</x-layout>
