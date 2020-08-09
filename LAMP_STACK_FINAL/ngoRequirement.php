<!doctype html>
<html lang="en">
  <head>
    <title>NGO Requirements</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      body{
          background-color: #F5F5F5;
      }
  </style>
  </head>
  <body>
    
  <?php include("navbar.php"); ?>
    
    <div class="container" style="background-color: white;margin-top: 20px;margin-bottom: 20px;width: 80%;">

      <h2 class="text-center">NGO Requirements</h2>
        
            <form method="POST">

                <div class="form-group">
                  <label for="email">NGO Email address</label>
                  <input type="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                
                <div class="form-group">
                  <label for="req_type">Item Type</label>
                  <select class="form-control selectpicker" data-style="btn btn-link" id="req_type">
                    <option>Clothes</option>
                    <option>Electronics</option>
                    <option>Books</option>
                    <option>Other</option>
                  </select>
                </div>

                

                <div class="form-group">
                  <label for="item_name">Item Name</label>
                    <input type="text" class="form-control" id="item_name" placeholder="Item Name">
                </div>

                

                <div class="form-group">
                  <label for="quantity_required">Quantity Required</label>
                    <input type="number" class="form-control" id="quantity_required" min="1">
                </div>

                
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                </div>

                <center>
                <button type="submit" id="submit" class="btn btn-primary">Submit</button><br>
                <span class="error" style="color: red; font-size: 12px;"></span>
              </center>
        
              </form>
         
        

    </div>

    

    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">

$("#submit").click(function(e){

  e.preventDefault();

  $(".error").html("");

  var ngo_email = $("#email").val().trim();
  var req_type = $("#req_type").val().trim();
  var item_name = $("#item_name").val().trim();
  var quantity_required = $("#quantity_required").val();
  var description = $("#description").val();

  var error = 0 ;
  var error_string = "";

  if(ngo_email==""){
    error = 1 ;
    error_string += "Email field is empty<br>";
  }

  if(req_type==""){
    error = 1 ;
    error_string += "Item Type field is empty<br>";
  }

  if(item_name==""){
    error = 1 ;
    error_string += "Item Name is empty<br>";
  }

  if(quantity_required==""){
    error = 1 ;
    error_string += "Quantity Required should be non-zero<br>";
  }

  if(description==""){
    error = 1 ;
    error_string += "Description field is empty<br>";
  }

  if(error == 1){
    $(".error").html(error_string);
  }else{
    // ajax 

  //   var ngo_email = $("#email").val().trim();
  // var req_type = $("#req_type").val().trim();
  // var item_name = $("#item_name").val().trim();
  // var quantity_required = $("#quantity_required").val();
  // var description = $("#description").val();

    $.ajax({
      // flask
      url:"functions/ngoRequirementInsert.php",
      method:"POST",
      data:{
        "ngo_email":ngo_email,
        "item_type":req_type,
        "item_name":item_name,
        "quantity_required":quantity_required,
        "description":description
      }
    }).done(function(response){


      if(response=="1"){
        alert("Requirements Registered Successfully")
      }else{
        alert("We Faced Some Errors processing your data, Please try again later!");
      }


    });

  }


});


</script>
</body>
</html>