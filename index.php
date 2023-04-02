<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>

<div class="container col-8 mt-5 bg-light">
    <div class="row d-flex justify-content-center">
        <div class="col-8">
            <h1>Register</h1>
            <hr>
            <form method='POST' action='handlers/imagehandler.php' enctype='multipart/form-data' class="border">
              <?php if(isset($_SESSION['errors'])):
                    foreach($_SESSION['errors'] as $error):
                ?>

                      <div class="alert alert-danger">
                        <?= $error ?>
                    </div>

                      <?php endforeach;
                        unset($_SESSION['errors']);
                    endif;
                    if(isset($_SESSION['success'])):                      
                      ?>

                      <div class="alert alert-success">
                        <?= $_SESSION['success'] ?>
                      </div>

                      <?php
                      unset($_SESSION['success']);
                    endif;
                      ?>
                <div class="mb-3">
                    <label for="img" class="form-label">Choose your img</label>
                    <input class="form-control" name="image" type="file" id="img">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>