<?php
include 'header-dashboard.php';
include 'header-common-dashboard.php';
//include('includes/config.php');
//get User id by session 
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
$emailid = $_SESSION['emailid'];
$message = '';
?>
<style type="text/css">
    div#college-list .College-Search-inner-- {
        display: flex;
        align-items: flex-start;
        flex-wrap: wrap;
        position: relative;
        margin-bottom: 30px;
        overflow: hidden;
        padding: 20px 15px;
        box-shadow: 2px 0 2px -2px rgba(0,0,0,0.16),3px 3px 3px -1px rgba(0,0,0,0.12)!important;
        border-radius: 23px;
        height: 100%;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
    }
    div#college-list .card {
    background: transparent;
    box-shadow: unset;
}
.modal-header {
    border-bottom: 1px solid #019ff0;
    background-color: #019ff0;
    color: #fff;
}
</style>

<!-- Begin Page Content -->
<div class="container-fluid">   
    <div class="row">
        <div class="col-md-12 col-sm-12">  
            <div class="content-heading" id="welcometext-div">
              <h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">New <span style="color:#019ff0">Alerts</span></h3>
            </div>
        </div>       
    </div>    

    <div class="row sort-n-search-bar">
        <div class="col-sm-12" style="padding:20px;"></div>
        <!--search bar-->
        <div class="col-md-1 col-xs-3 sort-toggle-btn"></div>
        <div class="col-md-8 col-sm-12 search-section">
            <div class="result-search-bar">
                <div class="search-form">
                    <form method="POST" id="searchbynameform">
                        <div class="input-group">
                            <input type="text" id="search_schoolname" name="search_schoolname" value="<?php echo ($_POST['search_schoolname'])? $_POST['search_schoolname'] : ''; ?>" class="form-control" placeholder="Find a School by Name">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="instnm" id="btnsearchschoolname" style="min-height: 50px;"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end search bar-->
        <div class="col-md-2">
            <a class="nav-link dashboard-logout selected_clgs_popup" href="#" >Sign Up</a>
        </div>
    </div>

  
        <div class="row" id="college-list">
            <?php 
            $cond ="`news-feed`!=''";
            if(isset($_POST['instnm'])){
                $instnm = $_POST['search_schoolname'];
                $cond .= " AND `INSTNM` LIKE '%".$instnm."%'";

            }
            $sql = "SELECT * FROM `hd2018` WHERE ".$cond;
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) { ?>
                <div class="col-md-4 col-sm-12 card">
                    <input type="checkbox" class="green-tickbox clgcb" value="<?php echo $row['UNITID']; ?>" id="clgchk<?php echo $row['UNITID']; ?>" name="clgcb[]">
                    <div class="College-Search-inner--" id="box177834">
                        <div class="col-sm-12 col-md-11 col-xs-12 pr-0" onclick="toggleClgUpper(<?php echo $row['UNITID']; ?>)">
                            <h3><?php echo $row['INSTNM']; ?></h3>
                            <p><?php echo $row['CITY'].', '.$row['STABBR'] ?></p>
                        </div>
                        <!-- <div class="col-sm-12 col-md-12 col-xs-12 btn-college-list">
                            <div class="collage-details table-responsive-sm">
                                <ul>
                                    <li> <a class="clg-website-address mybluebtnsmall " href="school-profile/a-t-still-university-of-health-sciences" target="_blank">More Information</a> </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div> 
              <?php

               
              }
            } else {
              echo "0 results";
            }


            ?>
            
                       
        </div>

    
     
        
    
</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>




<!-- functions -->
<?php

function getCounselorDetail($cnslrIds) {
    global $con;
    $sql = "SELECT * FROM `tbl_users` WHERE id='" . $cnslrIds . "' ";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        return $row;
    }
}
?>

<!-- popup -->
<div class="modal fade" id="selectedclgmodal" role="dialog" class="selectedclgmodal">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            <div class="modal-body" id="selectedclg">
                <div class="col-xs-12 col-md-12 mb-30">
                <label>Subscribe to receive daily news updates</label>
                <form action="" method="post">                   

                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" required >
                  </div>

                  <div class="form-group">
                        <label for="pwd">First Name</label>
                        <input type="text" name="fname" class="form-control" id="fname" required>
                    </div>
                  
                  <div class="form-group">
                        <label for="pwd">Last Name</label>
                        <input type="text" name="lname" class="form-control" id="lname" required>
                    </div>

                <input type="hidden" value="" name="ipeds">

                <button type="submit" class="btn btn-primary next mybluebtn" id="subscribe">Subscribe</button>
                </form>

                <div class="alert alert-danger" role="alert" id="errorMsg" style="display:none">
                  
                </div>

                <div class="alert alert-info" role="alert" id="notifi" style="display:none">
                 
                </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>




<script src="vendor/jquery/dist/jquery.js"></script>
<!-- MODERNIZR-->
<script src="vendor/modernizr/modernizr.custom.js"></script><!-- STORAGE API-->
<script src="vendor/js-storage/js.storage.js"></script><!-- SCREENFULL-->
<script src="vendor/screenfull/dist/screenfull.js"></script><!-- i18next-->
<script src="vendor/i18next/i18next.js"></script>
<script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script>
<script src="vendor/jquery/dist/jquery.js"></script>
<script src="vendor/popper.js/dist/umd/popper.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.js"></script><!-- =============== PAGE VENDOR SCRIPTS ===============-->
<!-- SLIMSCROLL-->
<script src="vendor/jquery-slimscroll/jquery.slimscroll.js"></script><!-- SPARKLINE-->
<script src="vendor/jquery-sparkline/jquery.sparkline.js"></script><!-- FLOT CHART-->
<script src="vendor/flot/jquery.flot.js"></script>
<script src="vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js"></script>
<script src="vendor/flot/jquery.flot.resize.js"></script>
<script src="vendor/flot/jquery.flot.pie.js"></script>
<script src="vendor/flot/jquery.flot.time.js"></script>
<script src="vendor/flot/jquery.flot.categories.js"></script>
<script src="vendor/jquery.flot.spline/jquery.flot.spline.js"></script><!-- EASY PIE CHART-->
<script src="vendor/easy-pie-chart/dist/jquery.easypiechart.js"></script><!-- MOMENT JS-->
<script src="vendor/moment/min/moment-with-locales.js"></script><!-- =============== APP SCRIPTS ===============-->
<script src="js/app.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick-theme.css"/>
<script src="//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
<script src="js/mycustomjs.js"></script>
<?php //include 'footer-dashboard.php'; ?>
<script>
   function toggleClgUpper(id)
 {
    $( '#clgchk' + id).trigger( "click" );
 }

 $(".selected_clgs_popup").click(function (e) {
        e.preventDefault();
       console.log("this is testing");
        $('#selectedclgmodal').modal('show');     
        var array = [];
        var ipeds = $(".clgcb");
        $(ipeds).each(function() {
        if ($(this).is(':checked')) {
            array.push($(this).val());
        }        
        })
        if (array.length === 0) {
            $('#errorMsg').css("display","block");
            $('#errorMsg').html("Please select College for news alert");
            $('#subscribe').prop('disabled', true);
            return false;
        }else{
            $('#errorMsg').css("display","none");
            $('#errorMsg').html("");
            $('#subscribe').prop('disabled', false);
        }


    });

$("#subscribe").click(function(e){
    e.preventDefault();
    var email = $("#email").val();
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var ipeds = $(".clgcb");
    var array = [];

    if(email =='' || fname == '' || lname == ''){
        alert("All fields are required.");
        return flase;
    }
    $(ipeds).each(function() {
        if ($(this).is(':checked')) {
            array.push($(this).val());
        }        
    })
   
   
    
    var ids = $("#ids").val();
    var myKeyVals = { email : email, fname : fname, lname : lname, ids : array }
     $.ajax({
        url: "ajax_function_new.php?action=subscription_confirmation",
        type: 'post',
        data: myKeyVals,
        // dataType: "json",
        beforeSend: function () {
            // setting a timeout
            $(".loader").css('display', 'block');

        },
        success: function (response) {
            $(".loader").css('display', 'none');

            $('#notifi').css("display","block");
            $('#notifi').html(response);

            
            console.log(response);
           
            // $("#submitMsz").text(response.msz);
            // setTimeout(function () {                          
            //     $('form#connectForm')[0].reset();
            //                 //$("#submitMsz").text('');
            // }, 2000);
        }
     });
})
</script>