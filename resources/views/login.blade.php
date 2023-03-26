<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real Estate Login Form</title>
    <link rel="stylesheet" href="{{ asset('home/login.css') }}">

</head>

<body>





    <form autocomplete='off' class='form' action="{{ route('login') }}" method="post">
        @csrf
        <div class='control'>
            <h1>
                Sign In
            </h1>
        </div>
        <div class='control block-cube block-input'>
            <input name='email' placeholder='Email' type='text'>

            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
        </div>
        @error('email')
            <small style="color:red; ">{{ $message }}</small>
        @enderror
        <div class='control block-cube block-input' style="margin-top: 20px;">
            <input name='password' placeholder='Password' type='password'>

            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
        </div>
        @error('password')
            <small style="color:red; ">{{ $message }}</small>
        @enderror
        <button class='btn block-cube block-cube-hover' style="margin-top: 20px;" type='submit'>
            <div class='bg-top'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg-right'>
                <div class='bg-inner'></div>
            </div>
            <div class='bg'>
                <div class='bg-inner'></div>
            </div>
            <div class='text'>
                Log In
            </div>
        </button>

    </form>

    <p style="margin-left: 650px;">Don't Have An Account?<a href="{{ route('auth#registerPage') }}"
            style="margin-left:20px;">Register Here!</a>
    </p>
</body>


</html>
