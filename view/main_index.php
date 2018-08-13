<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="../css/style.css" type="text/css" rel="stylesheet" />
    <title><?=$title?></title>
  </head>
  <body>
  	<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background: url(../images/footer_mid_bg.png);">
      <a href="#" class="navbar-brend"></a>
      <img src="http://pluspng.com/img-png/bootstrap-png-bootstrap-1024.png" width="30" height="30" alt="logo">
    <!-- button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggle-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <!-- Home -->
            <a href="../" class="nav-link" style="color: #f0f0f0;">Home truba shatal</a>
          </li>          
          <li class="nav-item">
            <!-- About Us -->
            <a href="/about" class="nav-link" style="color: #f0f0f0;">About Us</a>
          </li>
          <li class="nav-item">
            <!-- About Us -->
              <?php if($_SESSION['auth']):?>
                  <?php $auth = 'Log out'; $link = '/logout'?>
              <?php endif ?>
              <?php if(!$_SESSION['auth']):?>
                  <?php $auth = 'Log in'; $link = '/login'?>
              <?php endif ?>

            <a href="<?=$link?>" class="nav-link" style="color: #f0f0f0;"><?=$auth?></a

          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input type="text" class="form-control mr-sm-2" placeholder="Поиск..." aria-label="Search">
          <button id="top-bar-btn" class="btn btn-outline-success my-2 my-sm-0">Поиск</button>
        </form>
      </div>    
    </nav>
  <div class="header ">
        <div class="row">
            <div class="col-xs-10" style="margin: 25px;"> 
                <h1 style="padding: 15px 40px;"><?=$title?></h1>              
            </div>            
        </div>
    </div>    
  <div class="container content">
    <?=$content?>
  </div>    
  <div id="footer">
          <div id="footer-top"></div>
          <div id="footer-middle">
              <div id="middle-content">
                  <div class="footer-box">
                      <div id="magazine">
                          <p>This Blog was founded in 2018.</p>
                          <p>This Blog is a Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo odit adipisci temporibus commodi magnam omnis maxime sint vel suscipit tenetur numquam, ipsum perferendis iste asperiores! Voluptate, nam! Officia, animi placeat..</p>
                          <p>Our mission is to serve our clients big or small with 
      the same passion, integrity, loyalty and 
      effectiveness, without the high expense normally 
      associated with these types of services.</p>
                      </div>
                  </div>
                  <div class="footer-box">
                      <div id="recent-post">
                          <h3><span>Recent Post</span></h3>
                          <ul>
                              <li><a href="#">TVGuide.com Watchlist Predicts Fall 
      TV Shows’ Success</a></li>
                              <li><a href="#">7 Ways to Create a Memorable 
      Customer Experience With Social Media</a></li>
                              <li><a href="#">Apple Gives Its Key Execs $400 
      Million in Bonuses</a></li>
                              <li><a href="#">How 5 Tech Giants Are Giving Back to 
      Education</a></li>
                              <li><a href="#">Battlefield 3 Has Record Opening 
      Weekend Despite Tech Woes</a></li>
                              <li><a href="#">The Evolving Role of Social Media in 
      News Organizations [LIVE Q&amp;A]</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="footer-box" id="footer-box">
                      <div id="archives">
                          <h3><span>Our archives</span></h3>
                          <ul>
                              <li><a href="#">March 2017</a></li>
                              <li><a href="#">February 2017</a></li>
                              <li><a href="#">January 2017</a></li>
                              <li><a href="#">December 2016</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="clear"></div>
              </div>  
          </div>              
          <div id="footer-bottom">
              <div id="bottom-content">
                  <p class="left">Copyright &copy; 2011 <a href="#">Ride Magazine</a> All Rights Reserved.</p>
                  <p class="right">Powered by <a href="#">WordPress</a> - Designed &amp; Developed By <a href="#">Mahdi El Hanafi</a>.</p>
                  <p>Reconstructed by <a href="#">Alkior</a>.</p>
              </div>
          </div>
      </div>    
  </body>
</html>