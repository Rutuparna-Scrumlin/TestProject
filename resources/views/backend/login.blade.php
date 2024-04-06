<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background: url('assets/images/login-bg.jpg'); 
      background-size: cover;
      background-position: center;
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
      text-align: center;
    }

    .login-container h2 {
      margin-bottom: 30px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-control {
      border-radius: 20px;
    }
    .lebell{
            display: block;
            text-align: left;
        }
    .btn-login {
      border-radius: 0; /* Make button rectangular */
      padding: 8px 40px;
      font-weight: bold;
      background-color: #f28500; /* Button background color */
      border: none;
      transition: background-color 0.3s; /* Smooth hover transition */
    }

    .btn-login:hover {
      background-color: #ff8c61; /* Button hover background color */
    }
  </style>
</head>
<body>
  <div class="login-container">
  <img src="assets/images/smslogo.png" alt="School Logo" width="100">
    <h2>Login</h2>
    @include('layouts.alert_message')
    <form id="loginForm" action="{{ url('login') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="username" class="form-label lebell">Username:</label>
        <input type="text" class="form-control" id="username" name="user_name" placeholder="Enter your username" required>
      </div>
      <div class="form-group">
        <label for="password" class="form-label lebell">Password:</label>
        <div class="input-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
          <div class="input-group-append">
            <span class="input-group-text toggle-password" id="togglePassword">
              <i class="fas fa-eye"></i>
            </span>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-login">Login</button>
    </form>
  </div>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

  <!-- Custom JavaScript -->
  <script>
    


      // Show/hide password functionality
      $('.toggle-password').click(function() {
        var passwordField = $('#password');
        var passwordFieldType = passwordField.attr('type');
        passwordField.attr('type', passwordFieldType === 'password' ? 'text' : 'password');
        $(this).find('i').toggleClass('fa-eye fa-eye-slash');
      });
    
  </script>
  <script>

  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
