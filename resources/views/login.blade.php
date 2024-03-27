<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache"/>
  <meta http-equiv="Expires" content="0"/>
  <title>Login | AIPT-UINSU</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <div class="wrapper" >
    <header data-aos="fade-up" data-aos-duration="800">Login</header>
    @if (session()->has('error'))
      <div style="color: red; font-weight: bold;" role="alert" data-aos="fade-up" data-aos-duration="800">
        {{ session()->get('error') }}
      </div>
    @endif
    <form action="/login" method="post">
      @csrf
      <div class="field email @error('username') shake @enderror" data-aos="fade-up" data-aos-duration="900">
        <div class="input-area">
          <input type="text" name="username" placeholder="Username" oninput="validateNumericInput(this)" value="{{ $errors->has('username') ? '' : old('username') }}" maxlength="12">
          <i class="icon fas fa-envelope"></i>
          @error('username')
            <i class="error error-icon fas fa-exclamation-circle"></i>
          @enderror
        </div>
        @error('username')
          <div class="error error-txt">{{ $message }}</div>
        @enderror
      </div>
      <div class="field password @error('password') shake @enderror" data-aos="fade-up" data-aos-duration="1100">
        <div class="input-area">
          <input type="password" name="password" placeholder="Password">
          <i class="icon fas fa-lock"></i>
          @error('password')
            <i class="error error-icon fas fa-exclamation-circle"></i>
          @enderror
        </div>
        @error('password')
          <div class="error error-txt">{{ $message }}</div>
        @enderror
      </div>
      <div data-aos="fade-up" data-aos-duration="1300" class="pass-txt"><a href="index.php">Lupa Password?</a></div>
      <input data-aos="fade-up" data-aos-duration="1500" type="submit" value="Login">
    </form>
   
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script src="{{ asset('js/login.js')  }}"></script>

</body>
</html>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="cover">
      <div class="front">
        <img src="https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/Graduation.jpg" alt="">
        <div class="text">
          <span class="text-1">Selamat Datang <br> Di Website AIP-UINSU</span>
          
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login </div>
            @if (session()->has('error'))
            <div style="color: red; font-weight: bold;" role="alert" data-aos="fade-up" data-aos-duration="800">
              {{ session()->get('error') }}
            </div>
            @endif
            <form action="/login" method="post">
              @csrf
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input type="text" placeholder="Masukan Username" oninput="validateNumericInput(this)" value="{{ $errors->has('username') ? '' : old('username') }}" maxlength="12" required>

                </div>
                @error('username')
                <div class="error error-txt">{{ $message }}</div>
                @enderror
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input type="password" placeholder="Masukan Password" required>

                </div>
                @error('password')
                  <div class="error error-txt">{{ $message }}</div>
                @enderror
                <div class="button input-box">
                  <input type="submit" value="Login">
                </div>
                
              </div>
          </form>
      </div>

    </div>
    </div>
  </div>

  <script>
    const imageUrls = [
      'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/2-11.jpg',
      'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/Graduation.jpg',
      'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/IMG_2051.jpg',
      'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/uin.png'
    ];
    
    let currentIndex = 0;
    
    function changeBackground() {
      document.body.style.backgroundImage = `url('${imageUrls[currentIndex]}')`;
      currentIndex = (currentIndex + 1) % imageUrls.length;
    }
    
    const firstImage = new Image();
    firstImage.src = imageUrls[0];
    firstImage.onload = function() {
      changeBackground();
      setInterval(changeBackground, 5000);
    };
    </script>
</body>
</html>

