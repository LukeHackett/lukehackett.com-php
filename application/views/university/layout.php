<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Luke Hackett">
    <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.png");?>">
    <title>Luke Hackett :: Software Engineer</title>

    <!-- CSS -->
    <?php echo $this->carabiner->display('css'); ?>

    <!-- JS -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <?php echo $this->carabiner->display('js'); ?>
  </head>

  <body>
    <div class="container">
      <!-- Main Static Navigation Bar -->
      <div class="navbar navbar-default">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url(""); ?>">Luke Hackett</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li <?php echo $active=="about" ? "class='active'" : ""; ?>>
              <a href="<?php echo site_url('about/huddersfield'); ?>">About</a>
            </li>
            <li <?php echo $active==1 ? "class='active'" : ""; ?>>
              <a href="<?php echo site_url('university/yearone'); ?>">Year One</a>
            </li>
            <li <?php echo $active==2 ? "class='active'" : ""; ?>>
              <a href="<?php echo site_url('university/yeartwo'); ?>">Year Two</a>
            </li>
            <li <?php echo $active==3 ? "class='active'" : ""; ?>>
              <a href="<?php echo site_url('university/yearthree'); ?>">Year Three</a>
            </li>
            <li <?php echo $active==4 ? "class='active'" : ""; ?>>
              <a href="<?php echo site_url('university/yearfour'); ?>">Year Four</a>
            </li>
            <li <?php echo $active==5 ? "class='active'" : ""; ?>>
              <a href="<?php echo site_url('university/yearfive'); ?>">Year Five</a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>

      <!-- Page Content -->
      <?php echo $content; ?> 

    </div>
  </body>
</html>


