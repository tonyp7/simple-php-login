<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once('config.inc.php');
require_once('login.inc.php');?><!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title><?php echo htmlspecialchars($config['title']); ?></title>


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <script>
document.addEventListener('DOMContentLoaded', docReady, false);

function docReady () {
  // code here...
}

    </script>
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form method="POST">
    <img class="mb-4" src="assets/door-open.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
	
	<div class="row mt-2">
		<div class="col"><hr></div>
		<div class="col-auto"><em>or</em></div>
		<div class="col"><hr></div>
	</div>
<?php if ($config['github']['active'] == true) { print_github_button($config['github']['client_id'], $config['github']['redirect_uri']); } ?>

<?php if ($config['google']['active'] == true) { ?>
	<a id="google-button" class="w-100 btn btn-lg btn-block btn-social btn-google mt-1">
		<img class="bi" src="assets/g-normal.svg" alt=""> Sign in with Google
	</a>
<?php } ?>
    <p class="mt-5 mb-3 text-muted">&copy; 2022 simple-php-login</p>
  </form>
</main>


    
  </body>
</html>
