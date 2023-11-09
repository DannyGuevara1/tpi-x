<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script
      src="https://kit.fontawesome.com/5c73f70816.js"
      crossorigin="anonymous"
      defer
    ></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
    @vite(['resources/css/login.css'])
    @vite(['resources/css/styles.css'])
    @vite(['resources/js/login.js'])
    @vite(['resources/css/message.css'])
	

</head>
<body>
<div class="main-container">
<div class="container" id="container">

	<div class="form-container sign-up-container" id="form-sing-up">
		<form name="formRegistro" action="{{route('user.registration')}}" method="POST" enctype="multipart/form-data" id="formRegistro">
            @csrf
            @method('POST')
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span class="spanLogin">or use your email for registration</span>
			<input type="text" name="name" id="name" placeholder="Name" style="border-color: @error('name') red;  @else green; @enderror"/>
			<input type="email" name="email" id="email" placeholder="Email" style="border-color: @error('email') red;  @else green; @enderror"/>
			<input type="password" id="password"  name="password" placeholder="Password" />
			<input type="text" name="age" id="age" placeholder="Age" style="border-color: @error('age') red;  @else green; @enderror"/>
			<input type="text" name="username" id="username" placeholder="Username" style="border-color: @error('username') red;  @else green; @enderror" />
            <input type="text" name="code" id="code" placeholder="Referral Link" style="border-color: @error('code') red;  @else transparent; @enderror" />
			<div class="person-gender">
				<div class="radio-container" style="border-color: @error('gender') red;  @else green; @enderror">
					<input id="person-gender-female" name="gender" type="radio" value="female"/><label for="person-gender-female">Female</label>
					<input id="person-gender-male" name="gender" type="radio" value="male"></input>
					<label for="person-gender-male">Male</label>

				</div>
			</div>

			<button type="submit" style="margin-top: 10px">Sign Up</button>
		</form>
	</div>

	<div class="form-container sign-in-container" id="form-sing-in">
        <form action="{{route('user.validate')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('POST')
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span class="spanLogin">or use your account</span>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<button type="submit" style="margin-bottom: 10px;">Sign In</button>

            @error('Invalid_Credentials')
                <script>
					Swal.fire({
						title: 'Error!',
						text: 'Email o contraseña no son validos',
						icon: 'error',
						confirmButtonText: 'Cool'
					})
				</script>
            @enderror

		</form>
	</div>

	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel">
				<div class="container-img">
					<img src="{{asset('storage/img_profile/shoe.png')}}" alt="Nike shoe">
				</div>
			</div>
			<div class="overlay-panel-btn ">
				<button class="ghost" id="signIn">Sign In</button>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>

		</div>
	</div>

</div>
</div>
</body>
</html>


