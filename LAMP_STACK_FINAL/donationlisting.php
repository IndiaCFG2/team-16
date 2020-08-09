<!doctype html>
<html lang="en">
  <head>
    <title>Views</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="assets/css/material-kit.css?v=2.2.0" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <style>
      .card-data{
          font-size: 16px;
      }
  </style>
  <body>

  <nav class="navbar navbar-expand-lg bg-primary" >
      <a class="navbar-brand" href="#" style="color:white;">Team Meraki</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="userDonation.php" style="color:white;">Donation Form <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="ngoRequirement.php" style="color:white;">Requirement Form (NGOs)</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="donationlisting.php" style="color:white;">Donation Listing</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="requirementlisting.php" style="color:white;">Requirement Listing</a>
          </li>
          
        </ul>
        
      </div>
    </nav>

    <div class="container mt-4" >

        <div class="row">

        <?php 

        include("functions/connection.php");

        $res = $mysqli->query("SELECT * from donations order by id desc LIMIT 1");

        $row = $res->fetch_assoc();

        if($res->num_rows!=0){

        echo '<div class="col-md-4">
        <div class="card card-profile">
          <div class="card-header card-header-image">
            <a href="#pablo">
              <img class="img" src="donation_images/laptops.jpg" style="height: 225px; width: 100%;">
              <div class="card-title">
                Laptops
              </div>
            </a>
          <div class="colored-shadow" style="background-image: url(&quot;./assets/img/examples/card-profile4.jpg&quot;); opacity: 1;"></div></div>
          <div class="card-body ">
            <div class="text-center" style="margin-top: 15px;">
               <b class="card-data">Years Old : '.$row['old_years'].' </b><br>
               <b class="card-data" style="margin-top: 15px;">Units Available : 20 </b>
            </div>


<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star" style="color: #FFD700;"></span>
<span class="fa fa-star"></span>
<br>

<button type="button" class="btn btn-primary">Know More</button>

          </div>
          
        </div>
      </div>';

        }
        
        
        ?>
        
            <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header card-header-image">
                    <a href="#pablo">
                      <img class="img" src="donation_images/used_tv_2.jpg">
                      <div class="card-title">
                        TV 
                      </div>
                    </a>
                  <div class="colored-shadow" style="background-image: url(&quot;./assets/img/examples/card-profile4.jpg&quot;); opacity: 1;"></div></div>
                  <div class="card-body ">
                    <div class="text-center" style="margin-top: 15px;">
                       <b class="card-data">Years Old : 5 </b><br>
                       <b class="card-data" style="margin-top: 15px;">Units Available : 1 </b>
                    </div>


<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<br>

<button type="button" class="btn btn-primary">Know More</button>

                  </div>
                  
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header card-header-image">
                    <a href="#pablo">
                      <img class="img" src="donation_images/novel.jpg">
                      <div class="card-title">
                        Book
                      </div>
                    </a>
                  <div class="colored-shadow" style="background-image: url(&quot;./assets/img/examples/card-profile4.jpg&quot;); opacity: 1;"></div></div>
                  <div class="card-body ">
                    <div class="text-center" style="margin-top: 15px;">
                       <b class="card-data">Years Old : 1 </b><br>
                       <b class="card-data" style="margin-top: 15px;">Units Available : 1 </b>
                    </div>


<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<br>

<button type="button" class="btn btn-primary">Know More</button>

                  </div>
                  
                </div>
              </div>
              
        </div>

        <!-- <div class="row">
            <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header card-header-image">
                    <a href="#pablo">
                      <img class="img" src="second_hand_tshirt.jpg">
                      <div class="card-title">
                        T-Shirt
                      </div>
                    </a>
                  <div class="colored-shadow" style="background-image: url(&quot;./assets/img/examples/card-profile4.jpg&quot;); opacity: 1;"></div></div>
                  <div class="card-body">
                    <div class="text-center" style="margin-top: 18px;">
                       <b class="card-data">Years Old : 2 </b><br>
                       <b class="card-data" style="margin-top: 15px;">Units Available : 1 </b>
                    </div>


<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star" style="color: #FFD700;"></span>
<span class="fa fa-star"></span>
<br>

<button type="button" class="btn btn-primary">Know More</button>

                  </div>
                  
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header card-header-image">
                    <a href="#pablo">
                      <img class="img" src="ncerts.jpg" style="height: 225px; width: 100%;">
                      <div class="card-title">
                        NCERTS
                      </div>
                    </a>
                  <div class="colored-shadow" style="background-image: url(&quot;./assets/img/examples/card-profile4.jpg&quot;); opacity: 1;"></div></div>
                  <div class="card-body ">
                    <div class="text-center" style="margin-top: 15px;">
                       <b class="card-data">Years Old : 1 </b><br>
                       <b class="card-data" style="margin-top: 15px;">Units Available : 11 </b>
                    </div>


<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star " ></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<br>

<button type="button" class="btn btn-primary">Know More</button>

                  </div>
                  
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-profile">
                  <div class="card-header card-header-image">
                    <a href="#pablo">
                      <img class="img" src="laptops.jpg" style="height: 225px; width:100%;">
                      <div class="card-title">
                        Dell Laptops
                      </div>
                    </a>
                  <div class="colored-shadow" style="background-image: url(&quot;./assets/img/examples/card-profile4.jpg&quot;); opacity: 1;"></div></div>
                  <div class="card-body ">
                    <div class="text-center" style="margin-top: 15px;">
                       <b class="card-data">Years Old : 2 </b><br>
                       <b class="card-data" style="margin-top: 15px;">Units Available : 20 </b>
                    </div>


<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star " style="color: #FFD700;"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<br>

<button type="button" class="btn btn-primary">Know More</button>

                  </div>
                  
                </div>
              </div>
        </div> -->

        

    </div>


<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="assets/js/material-kit.js?v=2.2.0" type="text/javascript"></script></body>
</html>