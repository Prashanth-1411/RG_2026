<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Sign In | R.G. Ambulance Service</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Outfit',sans-serif; }

        body {
            background: #FFFFFF;
            display: flex; align-items: center; justify-content: center;
            min-height: 100vh; padding: 24px;
        }

        .container {
            background: #FFFFFF;
            border: 1px solid #E5D6A0;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(212,175,55,0.15);
            position: relative; overflow: hidden;
            width: 768px; max-width: 100%; min-height: 520px;
        }

        .form-container {
            position: absolute; top: 0; height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0; width: 50%; z-index: 2;
            padding: 0 48px; display: flex;
            flex-direction: column; justify-content: center;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .sign-up-container {
            left: 0; width: 50%; opacity: 0; z-index: 1;
            padding: 0 48px; display: flex;
            flex-direction: column; justify-content: center;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%); opacity: 1; z-index: 5;
        }

        .container h1 {
            font-weight: 700; margin: 0; color: #B8860B; font-size: 36px;
        }

        .container h2 {
            font-weight: 700; margin: 0; color: #B8860B; font-size: 28px;
        }

        .container p {
            color: #2A2A2A; font-size: 15px; margin: 12px 0 28px;
        }

        .container a {
            color: #D4AF37; text-decoration: none; font-weight: 600; font-size: 14px;
        }

        .container a:hover { color:#C9A227; }

        .container button {
            border-radius: 12px; border: none;
            background: #D4AF37; color: #FFFFFF;
            font-size: 16px; font-weight: 600;
            padding: 0 48px; height: 56px;
            letter-spacing: 0.3px;
            transition: all 0.3s ease; cursor: pointer;
            box-shadow: 0 4px 16px rgba(212,175,55,0.25);
        }

        .container button:hover {
            background: #C9A227;
            box-shadow: 0 6px 24px rgba(212,175,55,0.35);
            transform: translateY(-1px);
        }

        .container button:active { transform: scale(0.98); }

        .container button.ghost {
            background: transparent; border: 2px solid #fff;
            color: #fff; box-shadow: none;
        }

        .container button.ghost:hover {
            background: rgba(255,255,255,0.1);
        }

        .container form {
            background: #fff; display: flex;
            flex-direction: column; align-items: center;
            justify-content: center; width: 100%;
        }

        .container input {
            background: #FFFFFF; border: 2px solid #D4AF37;
            border-radius: 12px; padding: 0 18px;
            margin: 0 0 16px; width: 100%; height: 56px;
            font-size: 15px; color: #2A2A2A;
            font-family: 'Outfit', sans-serif;
            transition: border-color 0.3s ease;
            outline: none;
        }

        .container input:focus {
            border-color: #C9A227;
            box-shadow: 0 0 0 4px rgba(212,175,55,0.15);
            background: #FFFFFF;
        }

        .container input::placeholder {
            color: #8A8A8A;
        }

        .overlay-container {
            position: absolute; top: 0; left: 50%; width: 50%; height: 100%;
            overflow: hidden; transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            background: linear-gradient(160deg, #D4AF37 0%, #C9A227 50%, #B8961E 100%);
            background-repeat: no-repeat; background-size: cover; background-position: 0 0;
            color: #fff; position: relative; left: -100%; height: 100%; width: 200%;
            transform: translateX(0); transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute; display: flex;
            flex-direction: column; align-items: center; justify-content: center;
            padding: 0 40px; text-align: center; top: 0; height: 100%;
            width: 50%; transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0; transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        .overlay h1 {
            color: #fff; font-size: 28px; font-weight: 700;
        }

        .overlay p {
            color: rgba(255,255,255,0.85); font-size: 14px;
            line-height: 1.6; margin: 16px 0 32px;
        }

        label.checkbox-label {
            display: flex; align-items: center;
            width: 100%; font-size: 14px; color: #2A2A2A;
            margin-bottom: 16px;
        }

        label.checkbox-label input {
            width: auto; height: auto; margin: 0 8px 0 0; accent-color: #D4AF37;
        }

        .forgot-password {
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <div class="container @if(request()->has('register')) right-panel-active @endif" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h2>Create Account</h2>
                <p>Join our premium service network</p>
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <button type="submit">Register</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Sign In</h1>
                <p>Welcome to R.G. Ambulance Service</p>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <label class="checkbox-label">
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <div class="forgot-password">
                    <a href="#">Forgot your password?</a>
                </div>
                <button type="submit">Sign In</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>Already have an account? Sign in to access your dashboard.</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>New Here?</h1>
                    <p>Create an account and join thousands of satisfied customers.</p>
                    <button class="ghost" id="signUp">Register</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>
</body>
</html>
