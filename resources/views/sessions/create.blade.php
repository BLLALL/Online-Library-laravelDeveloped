<title>تسجيل الدخول</title>
<x-head />

    <link rel="stylesheet" href="CSS/login.css" />
    <div class="container">
        <div class="logo">
            <h1>اقرأ</h1>
            <i class="fa-solid fa-book-open"></i>
        </div>
    </div>
    <div class="container">
        <div class="sign_up">
            <form action="/signIn" method="POST">
                @csrf
                <h1 class="hh">تسجيل الدخول</h1>
                <hr/>
                <label for="email">البريد الالكتروني</label><br/>
                <input type="email" name="email" id="email" placeholder="email" class="border-2" value="{{old('email')}}"/><br/>
                @error('email')
                <p class="text-white-500 text-sm bg-yellow-900"> {{ $message }} </p>
                @enderror
                <label for="password">كلمة المرور</label><br/>
                <input type="password" name="password" id="password" placeholder="******" class="border-2"  value="{{old('password')}}"/><br/>
                <button type="submit" class="hover:bg-yellow-900">دخول</button>
                <hr/>
                <h3>لا تمتلك حساب</h3>
                <button class="hover:bg-yellow-900"><a href="/signUp" >انشاء حساب</a></button>
            </form>
        </div>
    </div>

