@extends('layout/layoutMain')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col">

        <main class="login-container ">
            <form action="/login" method="POST">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Login Member</h1>
                
                <div class="kolom mb-3">
                    <label for="inputEmail" class="visually-hidden">Email address</label>
                    <input type="text" id="inputUser" name="username" class="form-control mb-2" placeholder="Email Anda" required autofocus>
                </div>

                <div class="kolom mb-3">
                    <label for="inputPassword" class="visually-hidden">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control mb-2" placeholder="Kata Sandi anda" required>
                 </div>
                
        
                <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Login</button>
                
            </form>

            <div class="row mt-2">

                <div class="col text-center">
                    <a class="btn btn-link" href="/register">Register</a>
                </div>


                <div class="col text-center">
                    <a class="btn btn-link" href="/loginAdmin">Switch to Login Admin</a>
                </div>
            </div>
        </main>

    </div>
    <div class="col"></div>
</div>



@endsection