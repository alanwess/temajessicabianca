<!DOCTYPE html>
  <!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
  <!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
  <!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
  <!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo get_titulo(); ?></title> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Alan Wesley de Souza" />

    <style type="text/css">
      @font-face {
      font-family: 'icomoon';
      src: url("<?= get_template_directory_uri(); ?>/fonts/icomoon/icomoon.eot?srf3rx");
      src: url("<?= get_template_directory_uri(); ?>/fonts/icomoon/icomoon.eot?srf3rx#iefix") format("embedded-opentype"), url("<?= get_template_directory_uri(); ?>/fonts/icomoon/icomoon.ttf?srf3rx") format("truetype"), url("<?= get_template_directory_uri(); ?>/fonts/icomoon/icomoon.woff?srf3rx") format("woff"), url("<?= get_template_directory_uri(); ?>/fonts/icomoon/icomoon.svg?srf3rx#icomoon") format("svg");
      font-weight: normal;
      font-style: normal;
    }
    </style>
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/animate.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/icomoon.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/superfish.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/magnific-popup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-12/css/all.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/style.css">

    <!-- jQuery -->
    <script src="<?= get_template_directory_uri(); ?>/js/jquery.min.js"></script>
    <!-- Modernizr JS -->
      <script src="<?= get_template_directory_uri(); ?>/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
      <script src="<?= get_template_directory_uri(); ?>/js/respond.min.js"></script>
    <![endif]--> 

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald" />

    <?php wp_head(); ?>
  </head>

  <body>
