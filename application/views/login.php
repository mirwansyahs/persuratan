<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=base_name()?> | Log in</title>
  <link rel="favicon icon" href="<?=base_url()?>assets/img/AdminLTELogo.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.css">
  
  <style type="text/css">
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #fff;
    }
    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      font: 14px arial;
    }
  </style>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url()?>"><b><?=base_name()?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post" id="form-login">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="button" class="btn btn-primary btn-block" id="btnSubmit">Sign In</button>
          </div>
          <!-- /.col -->
          <!-- <div class="col-4">
            <a href="<?=base_url()?>auth/regist">
              <button type="button" class="btn btn-success btn-block">Sign Up</button>
            </a>
          </div> -->
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<div class="load"></div>
<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.js"></script>
<script>
  $('#form-login').submit(function(e)
  {
    auth();
  });

  $('#btnSubmit').click(function()
  {
    auth();
  })

  function auth()
  {
    let formData = $('#form-login').serialize();
    
    $('.load').html(`
      <div class="preloader">
        <div class="loading">
          <img src="<?= base_url('assets/img/logo-transparant.png') ?>" width="80">
          <p>Harap Tunggu</p>
        </div>
      </div>
    `);
    $.ajax({
      url     : '<?=base_url()?>auth/secure', 
      type    : 'POST',
      data    : formData, 
      success : function(response)
      {
        response = JSON.parse(response);
        if (response.succ){
          $('.load').html("");
          // swal.fire("Yeayyyy!", response.msg, "success");
          location.replace("<?=base_url()?>" + response.data.redirect);
        }else{
          $('.load').html("");
          swal.fire("Ooppsss!", response.msg, "error");
        }
      },
      error   : function(err)
      {
        swal.fire("Ooppsss!", "Kamu tidak tersambung ke server kami.", "error");
      }
    });
  }
</script>
</body>
</html>
