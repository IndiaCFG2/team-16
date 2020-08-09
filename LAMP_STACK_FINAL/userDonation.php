<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>User Donation</title>
    <style>
        body{
            background-color: #F5F5F5;
        }
    </style>
  </head>
  <body>
    
    <?php include("navbar.php"); ?>

      <div class="container" style="width: 80%; background-color: white; margin-top: 20px;margin-bottom: 20px;">

        <h2 class="text-center">Donate Items</h2>

          <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="item_type">Choose Item Types</label>
                <select class="form-control" id="item_type">
                  <option>Clothing</option>
                  <option>Electronics</option>
                  <option>Books</option>
                  <option>Others</option>
                </select>
              </div>

              <div class="form-group" enctype='multipart/form-data'>
                <label for="item_name">Item Name</label>
                <input type="text" class="form-control" id="item_name" placeholder="Item Name">
              </div>

              <div class="form-group">
                <label for="years_old">How old is your item in years?</label>
                <input type="number" class="form-control" min="0" id="years_old" >
              </div>

              <div class="form-group">
                <label for="quality_rating">Out of 5 what would you rate product quality</label>
                <input type="number" class="form-control" min="1" max="5" id="quality_rating">
              </div>

              <div class="form-group">
                <label for="donate_desc">Tell us a little bit about your donation</label>
                <textarea class="form-control" rows="3" id="donate_desc"></textarea>
              </div>

              <div class="form-group">
                <label for="file">Please upload an image for your donation</label><br>
                <input type="file"  min="1" max="5" id="file">
              </div>

              <!-- Quick Fix Center Tag -->
              <center>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button><br>
                <span class="error" style="font-size:12px;color:red;"></span>
                <br>
              </center>

            
          </form>

      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
var item_name = $("#item_name").val().trim();
var years_old = $("#years_old").val().trim();
var quality_rating = $("#quality_rating").val().trim();
var donate_desc = $("#donate_desc").val().trim();
var item_type = $("#item_type").val().trim();
var file_data = $('input[type="file"]')[0].files;


//console.log(file_data[0]["name"]+file_data[0]["type"]);


var error = 0 ;
var error_string = "";

if(item_type=="Choose Item Types"){
  error = 1;
  error_string += "Please Choose an item type!<br>";
}

if(item_name==""){
  error = 1;
  error_string += "Item field can not be empty!<br>";
}

if(years_old==""){
  error = 1;
  error_string += "Please specify how many years old is item!<br>";
}

if(quality_rating==""){
  error = 1;
  error_string += "Quality Rating can not be empty<br>";
}

if(donate_desc==""){
  error = 1;
  error_string += "Donation Description can not be empty<br>";
}

if(file_data[0]==undefined){
  error = 1;
  error_string += "Please select an image of your donation!<br>";
}else{
  var file_type = file_data[0]["type"];
  if(file_type.substring(0,5)!="image"){
    error = 1;
  error_string += "Please upload an image file only!<br>";
  }
}




if(error == 1){
  $(".error").html("<b>The following error(s) were found:</b> <br>"+error_string);
}else{

  var formData = new FormData();
  
// var data =  {
//               "item_name":item_name,
//               "item_type":item_type,
//               "years_old":years_old,
//               "donate_desc":donate_desc,
//               "quality_rating":quality_rating,
//               "file" : file_data[0]
//             };  


//           console.log(data);


// $.ajax({
//     url:"local",
//     type:"POST",
//     data:{
//         "item_name":item_name
//     }
// }).done(function(response){

//     // error

//     // success

// });

formData.append("file",file_data[0]);
formData.append("item_name",item_name);
formData.append("item_type",item_type);
formData.append("years_old",years_old);
formData.append("quality_rating",quality_rating);
formData.append("donate_desc",donate_desc);

console.log(formData);

  $.ajax({
          url: 'functions/donationInsert.php',
          method: 'POST',
          data: formData,
          cache: false,
    contentType: false,
    processData: false,
    
          success: function (response) {
              if(response=="1"){
                alert("Donation Entry made successfully!")
              }else{
                alert("Donation Entry failed! Please try again later :(")
              }
          },
          error: function(){
              alert("error in ajax form submission");
          }
      });

}

});

    </script>
  </body>
</html>