@extends('layout/layoutMain')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col">

        <main class="login-container ">
            <form action="/authenticateAdmin" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Login Admin</h1>
                
                <div class="kolom mb-3">
                    <label for="inputEmail" class="visually-hidden">Email address</label>
                    <input type="text" id="inputUser" name="username" class="form-control mb-2" placeholder="Username anda" required autofocus>
                </div>

                <div class="kolom mb-3">
                    <label for="inputPassword" class="visually-hidden">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control mb-2" placeholder="Kata Sandi anda" required>
                 </div>
                
        
                <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Login</button>
            </form>

            <div class="row mt-2">
                <div class="col text-center">
                    <a class="btn btn-link" href="/">Switch to Login Member</a>
                </div>
            </div>
        </main>

    </div>
    <div class="col"></div>
</div>

@endsection