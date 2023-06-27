<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Public assets --}}
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <form id="login" class="border p-4" action="">
            <div class="d-flex justify-content-center p-2">
                <img id="logo" src="{{asset('img/' . env('LOGO')) }}" alt="HSAC LOGO">
            </div>
            <h5 class="text-center border-bottom">{{ env('APP_NAME') }} <br/><small>{!! env('APP_OWNER') !!}</small></h5>
            <h4 class="text-center pt-5 pb-2">User Login</h4>
            <div class="form-group d-flex justify-content-start align-items-center p-2" style="border: 1px solid #D2D6DE;">
                <input type="text" required id="username" name="username" placeholder="Username" maxlength="25" value="">
                <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group d-flex justify-content-start align-items-center p-2" style="border: 1px solid #D2D6DE;">
                <input type="password" required id="userpassword" name="password" placeholder="•••••••••••••" maxlength="35">
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="form-group">
                <div class="checkbox d-flex justify-content-between mt-3 mb-3">
                    <label><input type="checkbox" id="user_rememberme" name="user_rememberme"> Remember Me</label>
                    <a href="#" onclick="return false" class="pull-right" id="forgot_next" data-toggle='modal' data-target=''>Forgot Password?</a>
                </div>
                <div class="form-group">
                    <button type="submit" id="login" class="form-control btn btn-primary">Log In</button>
                </div> <!-- /.col -->
            </div>
        </form>
    </div>
</body>
</html>