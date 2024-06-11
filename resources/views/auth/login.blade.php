<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <title>Login</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    /* Custom styles */
    body {
      background-color: #f8f9fa;
    }

    .card {
      border-radius: 15px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      max-width: 700px; /* Increased max-width */
    }

    .navbar-brand {
      color: #00008B;
      font-weight: bold;
      text-align: center; /* Center text */
      font-size: 24px; /* Increased font size */
    }

    .form-label {
      color: #00008B;
      font-weight: bold;
    }

    .form-control {
      border-radius: 10px; /* Increased border-radius */
      padding: 10px; /* Increased padding */
      font-size: 16px; /* Increased font size */
    }

    .btn-primary {
      border-radius: 15px; /* Increased border-radius */
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #F0F8FF;
    }

    .login-image {
      max-width: 200px; /* Increased max-width */
      margin-right: 20px; /* Adjust as needed */
    }

    .form-check-label {
      margin-right: 20px; /* Adjust margin between Remember me and Forgot password */
    }
  </style>
</head>

<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFDB58;">
  <div class="container">
    <a class="navbar-brand mx-auto" href="#"><b>Thesis Master Gate</b></a>
  </div>
</nav>

<!-- Section: Design Block -->
<section class="text-center text-lg-start">
  <div class="card mx-auto mt-5" style="max-width: 700px;">
    <div class="card-body py-5 px-md-5">
      <div class="d-flex align-items-center mb-4">
        <img src="/image/kk.jpg" alt="Login Image" class="login-image">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <!-- Email input -->
          <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Enter email" required autofocus autocomplete="off" />
            @error('email')
              <span class="mt-2 text-danger">{{ $message }}</span>
            @enderror
          </div>

          <!-- Password input -->
          <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Enter password" required autocomplete="off" />
            @error('password')
              <span class="mt-2 text-danger">{{ $message }}</span>
            @enderror
          </div>

          <!-- User type selection -->
          <div class="mb-4">
            <label for="roleType" class="form-label">User Type</label>
            <select class="form-select" id="roleType" name="roleType" required>
              <option value="Platinum">Platinum</option>
              <option value="Staff">Staff</option>
              <option value="Mentor">Mentor</option>
              <option value="CRMP">CRMP</option>

            </select>
          </div>

          <!-- Remember me and Forgot password -->
          <div class="mb-4 d-flex justify-content-between align-items-center">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="remember_me" name="remember">
              <label class="form-check-label" for="remember_me"> Remember me </label>
            </div>
            <div>
              @if (Route::has('password.request'))
                <a class="text-decoration-none" href="{{ route('password.request') }}">Forgot password?</a>
              @endif
            </div>
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block">Login</button>

        </form>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

</body>
</html>




    