<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Login Form</title>
</head>
<body class="h-100 bg-dark">
  <div class="container">
    <div class="row justify-content-center align-items-middle">
      <div class="col-12 col-md-6 col-lg-6 col-xl-4 py-5 my-5">
        <div class="card">
          <div class="card-header">
            Regisztráció
          </div>
          <div class="card-body">
            <form method="POST" class="needs-validation" novalidate>
              <div class="form-group">
                <label for="username">Felhasználónév:</label>
                <input type="text" class="form-control" id="username" name="username" required value="<?= set_value('username'); ?>">
                <div class="invalid-feedback" id="username_invalid">
                  A beírt felhasználónév nem megfelelő
                </div>
              </div>
              <div class="alert alert-danger text-left pt-2 d-none" id="username_in_use">A megadott felhasználónév már foglalt.</div>
              
              <?php echo form_error('username'); ?>

              <div class="form-group">
                <label for="email">E-mail cím:</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?= set_value('email'); ?>"required>
                <div class="invalid-feedback" id="email_invalid">
                  Kérem adjon meg valós email-címet!
                </div>
              </div>
              <div class="alert alert-danger text-left pt-2 d-none" id="email_in_use">A megadott e-mail cím már foglalt.</div>

              <?php echo form_error('email'); ?>

              <div class="form-group">
                <label for="password">Jelszó:</label>
                <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,}$" required>
                <small id="passwordHelp" class="form-text text-muted">A jelszó legalább 7 karakter, kisbetűt, nagybetűt és számot is tartalmaz.</small>
                <div class="invalid-feedback">
                  A beírt jelszó nem megfelelő!
                </div>
              </div>

              <?php echo form_error('password'); ?>

              <div class="form-group">
                <label for="password_confirm">Jelszó megerősítése:</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
                <div class="invalid-feedback">
                  A beírt jelszó megerősítés nem egyezik!
                </div>
              </div>
              <?php echo form_error('password_confirm'); ?>
              <button type="submit" class="btn btn-primary mt-5 btn-block">küldés</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="<?php echo asset_url();?>js/form-validation.js"></script>
  <script src="<?php echo asset_url();?>js/username-and-email-checker.js"></script>
</body>
</html>