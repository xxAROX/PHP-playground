<div class="container w-50 h-50">
  <form method="post" action="./assets/php/auth/login.php">
    <h1 class="h3 mb-3 fw-normal">Please login to your Account</h1>

    <div class="form">
      <div class="form-floating m-1">
        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
        <label for="email">Email address</label>
      </div>
      <div class="form-floating m-1">
        <input type="password" class="form-control" name="current-password" id="current-password" placeholder="Password" spellcheck="false" autocorrect="off" autocapitalize="off" autocomplete="current-password">
        <label for="current-password">Password</label>
      </div>
    </div>

    <!--div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div-->
    <div class="text-center d-flex">
      <button class="btn btn-success w-50 m-1" type="button" onclick="window.location.href = `/?action=register`;">Register</button>
      <button class="btn btn-primary w-50 m-1" type="submit">Sign in</button>
    </div>
  </form>
</div>
