<head>
    <link href={{ asset("logincss/login.css") }} rel="stylesheet">
    <!-- font awesome cdn -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button> 
                <button type="button" class="toggle-btn" onclick="register()">Register</button> 
            </div>
            <div class="social-icons">
                <a href="#" class="logo">Diagramador C4</a>
            </div>
            <!--1-->
            <form id="login" method="POST" action="{{ route('login') }}" class="input-group">
                    @csrf
                    <input type="email" id="email" placeholder="Email" class="input-field 
                    @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus
                    placeholder="Enter a valid email address">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!--password-->
                    <input type="password" id="password" placeholder="Enter Password" class="input-field 
                    @error('password') is-invalid @enderror" name="password"
                    required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input class="check-box" type="checkbox" name="remember" id="remember" 
                {{ old('remember') ? 'checked' : '' }}><span> Remember password</span>
                    <button type="submit" name="Login" class="submit-btn">
                        Log In
                    </button>        
                                    @if (Route::has('password.request'))
                                        <a class="btn-btn-link" href="{{ route('password.request') }}">
                                           <!-- {{ __('¿Olvido su contraseña?') }}-->
                                        </a>
                                    @endif
             
            </form>
            <!--2-->
            <form id="register" method="POST" action="{{ route('register') }}" class="input-group">
                @csrf
                <input id="name" type="text" placeholder="Nombre"
                                        class="input-field @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                
                <input id="email" type="email" placeholder="Email" 
                                        class="input-field @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                <input id="password" type="password" placeholder="Enter Password"
                class="input-field @error('password') is-invalid @enderror" name="password"
                required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <input id="password-confirm" type="password" class="input-field" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">    
                <!--<input type="checkbox" class="check-box"> <span>I agree to the terms & conditions</span>-->
                <button type="submit" class="submit-btn">Register</button>
            </form>
        </div>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }

    </script>

</body>

