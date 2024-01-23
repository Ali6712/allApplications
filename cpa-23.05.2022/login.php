<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CPA - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/media/image/favicon.png"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="assets/css/app.min.css" type="text/css">
</head>
<body class="form-membership">

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
</div>
<!-- end::page loader -->

<div class="form-wrapper">

    <!-- logo -->
    <div class="logo">
        <img src="assets/media/image/logo.png" alt="image">
    </div>
    <!-- ./ logo -->

    <h5>Sign in</h5>

    <!-- form -->
    <form  action="controllers/login.php" method="POST">

        <div class="form-group">
            <input type="email" class="form-control" id="FLD_EMAIL" name="FLD_EMAIL" placeholder="Email" required autofocus>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="FLD_BCODE"  name="FLD_BCODE" placeholder="Password" required>
        </div>
        
        <button class="btn btn-primary btn-block">Sign in</button>
        <hr>
         <p class="text-muted">Copyright by <?php echo date('Y');?>.</p>
    </form>
    <!-- ./ form -->

</div>

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>

<!-- App scripts -->
<script src="assets/js/app.min.js"></script>
</body>

</html>