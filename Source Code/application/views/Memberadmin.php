<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cimciim Petshop and Care</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()."assets/" ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()."assets/" ?>css/business-casual.css" rel="stylesheet">

  </head>

  <body>

    <div class="tagline-upper text-center text-heading text-shadow text-white mt-5 d-none d-lg-block">Cimciim Petshop and Care</div>
    <div class="tagline-lower text-center text-expanded text-shadow text-uppercase text-white mb-5 d-none d-lg-block">wonderfull place for your pets</div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-faded py-lg-4">
      <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Cimciim Petshop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url()."index.php/Welcome/homeadmin" ?>">Beranda
              </a>
            </li>
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url()."index.php/Member/member" ?>">Member</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url()."index.php/Pelayan/pelayan" ?>">Pelayan</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url()."index.php/Titip/titip" ?>">Titip</a>
            </li>
            <li class="nav-item px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="<?php echo base_url()."index.php/Hewan/adopsiadmin" ?>">Adopsi</a>
            </li>
           <?php if ($this->session->userdata("nama_admin")!=null) {
            # code...
           ?>
          <li class="nav-item px-lg-4 dropdown">
            <a class="nav-link text-uppercase text-expanded dropdown-toggle" data-toggle="dropdown" href=""><?php echo $this->session->userdata("nama_admin");?>
              <i class="fa fa-user fa-fw"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="<?php echo site_url('/Login/logoutadmin'); ?>" style="color:black;"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
              </li>
            </ul>
          </li>
        </ul>
        <?php } ?>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
    <!-- list -->
      <div class="bg-faded p-4 my-4">
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">list
          <strong>member</strong>
        </h2>
        <hr class="divider">
        <center>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">             
            </a>
          </div>
          <hr>

        </div>
      </div>
       <table id="example" class="table table-striped table-bordered">
           <thead>
             <tr>
             <th>Username</th>
             <th>Password</th>
             <th>Nama</th>
             <th>Alamat</th>
             <th>No.Hp</th>
             <th>Aksi</th>
             
             </tr>
           </thead>
           <tbody>
             <?php foreach ( $member as $key => $value) { ?>
              <tr>
              <td><?php echo $value->username_member; ?></td>
              <td><?php echo $value->password_member; ?></td>
              <td><?php echo $value->nama_member; ?></td>
              <td><?php echo $value->alamat_member; ?></td>
              <td><?php echo $value->noHP_member; ?></td>

               <td>
            <a href="<?php echo site_url('Member/delete/'.$value->username_member);?>"
              class="btn btn-danger" style="font-size:20px; padding: 10px;">
              <i class="fa fa-trash" aria-hidden="true"></i>
            </a>
            <a href="<?php echo site_url('Member/update/'.$value->username_member); ?>"
              class="btn btn-warning" style="font-size:20px;padding: 10px;">
              <i class="fa fa-pencil-square"></i>
            </a>
          </td> 
              </tr>
              <?php  }?>
           </tbody>
         </table>
    </div>
</center>
      </div>
    </div>
    <!-- /.container -->

    <footer class="bg-faded text-center py-5">
      <div class="container">
        <p class="m-0">Copyright &copy; <strong>Maulana Wicaksono</strong></p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url()."assets/" ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()."assets/" ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
