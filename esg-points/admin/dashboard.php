<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
?>


<!doctype html>

 <html class="no-js" lang="">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compliance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

   

    
    

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">


   <style>
    

    </style>
    <style>
        .btn {
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
        }
    </style>
</head>

<body>
    

     
        <div class="content">
 


            <div class="animated fadeIn">
            <h1>INVENTÁRIO DE EMISSÕES ATMOSFÉRICAS</h1>
            <p>Valores Totais</p>
             
                <div class="row">
   
                    <div class="col-lg-6 col-md-6">
                        <?php

 $query1=mysqli_query($con,"select SUM(Status) AS Total from tblvehicle;");


$count_yesterday_vehentries=mysqli_fetch_assoc($query1);


function kmphTOmph($kmph)
{
    return 0.6214 * $kmph;
}
 

function mphTOkmph($mph)
{
    return $mph * 1.609344;
}
 

 ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-global"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib text-info">
                                            <div class="stat-text"><span class="count"><?php echo round(mphTOkmph($count_yesterday_vehentries['Total']));?></span></div>
                                            <div class="stat-heading">Distância (KM aprox.)</div>
                                            <div class="stat-heading">Converted by miles.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <?php

 $query2=mysqli_query($con,"select SUM(OwnerContactNumber) AS Total from tblvehicle;");
$count_lastsevendays_vehentries=mysqli_fetch_assoc($query2);

 ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib text-danger">
                                        <i class="pe-7s-attention"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $count_lastsevendays_vehentries['Total'];?></span></div>
                                            <div class="stat-heading">Emissões CO (kg)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <?php

 $query3=mysqli_query($con,"select ID from tblvehicle");
$count_total_vehentries=mysqli_num_rows($query3);
 ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib text-warning">
                                        <i class="pe-7s-plane"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $count_total_vehentries?></span></div>
                                            <div class="stat-heading">Aeronaves</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

           <?php

 $query=mysqli_query($con,"select SUM(Status) AS Total from tblvehicle;");

$listedcat=mysqli_fetch_assoc($query);

 ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib text-success">
                                        <i class="pe-7s-leaf"></i>
                                    </div>
                                    <div class="stat-content">

                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $listedcat['Total'];?></span></div>
                                            <div class="stat-heading">Co2e</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
             
               
            </div>
     
            <?php include_once('../includes/sidebar-inc.php');?>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>
</html>