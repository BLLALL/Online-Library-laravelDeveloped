<x-head/>
<title>إنشاء حساب</title>

<link rel="stylesheet" href="CSS/neeew.css">
<nav>
    <div class="container">
        <div class="logo">
            <h1>اقرأ</h1>
            <i class="fa-solid fa-book-open"></i>
        </div>
    </div>
</nav>
<body>
<div class="container">
    <form action="/signUp" method="POST">
        @csrf
        <h1 class="hh">انشاء حساب</h1>
        <hr>
        <label for="name">اسم المستخدم</label><br>
        <input type="text" id="name" name="name" placeholder="username" class="border-2" value="{{old('name')}}">
        @error('name')
        <p class="text-red-950 text-sm"> {{ $message }} </p>
        @enderror
        <br>
        <label for="mail">البريد الالكتروني</label><br>
        <input type="email" name="email" id="mail" placeholder="name@gmail.com" class="border-2" value="{{old('email')}}"><br>
        @error('email')
        <p class="text-red-900 text-sm"> {{ $message }} </p>
        @enderror
        <label for="password">كلمه المرور</label><br>
        <input type="password" name="password" id="password" placeholder="******" class="border-2" value="{{old('password')}}">
        @error('password')
        <p class="text-red-900 text-sm"> {{ $message }} </p>
        @enderror
        <br>
        <button type="submit">انشاء حساب</button>
        <hr>
        <h3>بالفعل تمتلك حساب</h3>
        <button><a href="/login">تسجيل الدخول</a></button>
    </form>
</div>
</body>
