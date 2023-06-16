<?php include('email_server.php') ?>
<html>
<head>
   <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], textarea, select, option{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=text]:focus, textarea, select:focus, option:focus {
  background-color: #f1f1f1;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Float signup button and add an equal width */
.sendbtn {
  float: left;
  width: 20%;
}

.error {color: #FF0000;}

/* Add padding to container elements */
.container {
  padding: 20px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .sendbtn {
     width: 100%;
  }
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
  $(document).ready(function(){
      $("#email_search").on("keyup", function(){
        var email_search = $(this).val();
       if (email_search !=="") {
          $.ajax({
            url:"email-search.php",
            type:"post",
            data:{email_search:email_search},
            success:function(data){
              $("#emailList").fadeIn("");
              $("#emailList").html(data);
            }  
          });
        }else{
          $("#emailList").html("");  
          $("#emailList").fadeOut();
        }
      });

      $(document).on("click","p", function(){
        $('#email_search').val($(this).text());
        $('#emailList').fadeOut("fast");
      });
  });
</script>

</head>
<body>
    <form action="" method="post" style="border:1px solid #ccc">
      <div class="container">
       <!-- <label for="temp"><b>Select Template</b></label>
          <select name="template"> 
              <?php 
           //   $sql = "SELECT * FROM `Template`";
             // $result = mysqli_query($db, $sql);
                
               // if (mysqli_num_rows($result) > 0) {
                //  while($row = mysqli_fetch_assoc($result)) { ?>
                  //  <option value="<?php //echo $row['temp_id']?>"> <?php //echo $row['templateName']; ?> </option>
                 
                  <?php
                 // }
              //  } 
             ?>
          </select>  -->   
        <label for="msg"><b>Share Something with people</b></label>
        <textarea placeholder="Write Here......" name="msg"></textarea>
        
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" id="email_search" name="email" required>
        <div id="emailList"></div>
        <span class="error"><?php echo $emailErr ?></span>
    
        <label for="subject"><b>Subject</b></label>
        <input type="text" placeholder="Subject" name="subject" required>
       
        <div class="clearfix">
          <button type="submit" name="send"  class="sendbtn">Send</button>
        </div>
      </div>
    </form>
</body>
</html>

