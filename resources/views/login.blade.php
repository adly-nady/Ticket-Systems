<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/handel_login.css">
</head>

<body>
    <div class="covers_error">
        @if ($errors->has('email'))
            <div class="alert alert-danger" style="width: 300px" role="alert">
                {{ $errors->first('email') }}
            </div>
        @endisset
        @if ($errors->has('password'))
            <div class="alert alert-danger" style="width: 300px" role="alert">
                {{ $errors->first('password') }}
            </div>
        @endisset
</div>
<div class="login_circly" style="text-align: center;">
<h5 style="color:white;font-size: 25px;margin-top: 10%;text-shadow: 2px 2px 5px whitesmoke"> Login
    Ticket
    System </h5>
<form action="/do_login" method="post">
    @csrf
    <div class="container" style="margin-top: 70px;">
        <div class="row justify-content-center">

            <div class="row">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control"
                        style="border: 3px solid rgb(77, 0, 110);border-radius: 20px" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput"
                        style="margin-left: 10px;color:rgb(101, 2, 144) ;text-shadow: 2px 2px 5px black">Email
                        address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control"
                        style="border: 3px solid rgb(78, 0, 111);border-radius: 20px" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword"
                        style="margin-left: 10px;color:rgb(101, 2, 144);text-shadow: 2px 2px 5px black">Password</label>
                </div>
                <div class="form-floating">
                    <button type="submit" class="btn_adly" style="margin-top: 70px;"> Login </button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
</script>

</body>

</html>
