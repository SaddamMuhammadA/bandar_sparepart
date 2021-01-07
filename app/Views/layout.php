<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Bandar Sparepart</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('bootstrap-4.0.0/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 5rem;
        }
        .starter-template {
        padding: 3rem 1.5rem;
        text-align: center;
        }
        h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
      body {font-family: "Open Sans"}
      html {
              height: 100%;
              color: #777;
              line-height: 1.8;
            }
      /* Create a Parallax Effect */
      .img {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        
      }

      /* First image (Logo. Full height) */
        background-image: url('bg.jpg');
        min-height: 100%;

      .w3-wide {letter-spacing: 10px;}
      .w3-hover-opacity {cursor: pointer;}
    </style>
  </head>

  <body>

        <?= $this->include('navbar') ?>

    <main role="main" class="container">

     <?= $this->renderSection('content') ?>

    </main><!-- /.container -->

    <script src="<?= base_url('jquery-3.5.1.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap-4.0.0/dist/js/bootstrap.min.js') ?>"></script>
    <?= $this->renderSection('script') ?>
  </body>
</html>
