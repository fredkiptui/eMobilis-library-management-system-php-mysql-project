<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Library Management System | User Dash Board</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <!--        <link href="assets/css/bootstrap.css" rel="stylesheet" />-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet" />
        <!-- GOOGLE FONT -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>

    <body>
        <!------MENU SECTION START-->
        <?php include('includes/header.php');?>
        <!-- MENU SECTION END-->
        <div class="content-wrapper">
            <div class="container"><img src="assets/img/somaonlinecover.png" class="img-responsive" alt="Responsive image"></div>
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h1 class="header-line text-center" style="background-color: #babccf">BOOK HISTORY</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6 bg-success">
                        <div class="alert alert-info back-widget-set text-center">
                            <i class="fa fa-bars fa-5x"></i>
                            <?php 
                                $sid=$_SESSION['stdid'];
                                $sql1 ="SELECT id from tblissuedbookdetails where StudentID=:sid";
                                $query1 = $dbh -> prepare($sql1);
                                $query1->bindParam(':sid',$sid,PDO::PARAM_STR);
                                $query1->execute();
                                $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                                $issuedbooks=$query1->rowCount();
                            ?>
                            <h3>
                                <?php echo htmlentities($issuedbooks);?> </h3>
                            Book Issued
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="alert alert-warning back-widget-set text-center bg-success">
                            <i class="fa fa-recycle fa-5x"></i>
                            <?php 
                                $rsts=0;
                                $sql2 ="SELECT id from tblissuedbookdetails where StudentID=:sid and RetrunStatus=:rsts";
                                $query2 = $dbh -> prepare($sql2);
                                $query2->bindParam(':sid',$sid,PDO::PARAM_STR);
                                $query2->bindParam(':rsts',$rsts,PDO::PARAM_STR);
                                $query2->execute();
                                $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                                $returnedbooks=$query2->rowCount();
                            ?>

                            <h3>
                                <?php echo htmlentities($returnedbooks);?>
                            </h3>
                            Books Not Returned Yet
                        </div>
                    </div>
                    <!-- Carousel image gallery -->
                </div>
                <!-- row -->
                <div>
                    <!-- Carousel image gallery -->
                    <h1 class="text-center">GALLERY</h1>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="assets/img/bk1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/bk2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/img/bk3.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                </div>
                <!-- container -->
            </div>
            <!-- CONTENT-WRAPPER SECTION END-->
            <?php include('includes/footer.php');?>
            <!-- FOOTER SECTION END-->
            <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
            <!-- CORE JQUERY  -->
            <!--        <script src="assets/js/jquery-1.10.2.js"></script>
         BOOTSTRAP SCRIPTS  
        <script src="assets/js/bootstrap.js"></script>-->
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

            <!-- CUSTOM SCRIPTS  -->
            <script src="assets/js/custom.js"></script>
    </body>

    </html>
    <?php } ?>