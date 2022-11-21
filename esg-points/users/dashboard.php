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
    <title>Fornecedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

   

    
    

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    
    <link rel="stylesheet" href="../admin/assets/css/style.css">


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
    

        <!-- Content -->
        <div class="content">
 

            <!-- Animated -->
            <div class="animated fadeIn">
            <h1><i class="pe-7s-cup"></i> ESG Points</h1>
            <p>Programa de Pontos Sustentáveis</p>
                <!-- Widgets  -->
                <div class="row">
                <!--    
                    <*?php
//todays Vehicle Entries
 $query=mysqli_query($con,"select ID from tblvehicle where date(InTime)=CURDATE();");
$count_today_vehentries=mysqli_num_rows($query);
 ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-car"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><*?php echo $count_today_vehentries;?></span></div>
                                            <div class="stat-heading">Todays Vehicle Entries</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    -->
                    <div class="col-lg-6 col-md-6">
                        <?php
//Yesterdays Vehicle Entrie
 $query1=mysqli_query($con,"select SUM(MobileNumber) AS Total from tblregusers;");
 //"select ID from tblvehicle where date(InTime)=CURDATE()-1;");
//$count_yesterday_vehentries=mysqli_num_rows($query1);

$count_yesterday_vehentries=mysqli_fetch_assoc($query1);

#https://acervolima.com/programa-para-converter-km-h-em-milhas-h-e-vice-versa/
// Function to convert
// kmph to mph
function kmphTOmph($kmph)
{
    return 0.6214 * $kmph;
}
 
// Function to convert
// mph to kmph
function mphTOkmph($mph)
{
    return $mph * 1.609344;
}
 
    // Driver Code
  //  $kmph = 150;
   // $mph = 100;
  //  echo "speed in mph is " ,
       //   kmphTOmph($kmph),"\n";
   // /echo "speed in kmph is " ,
               //mphTOkmph($mph);
 ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib text-info">
                                            <div class="stat-text"><span class="count"><?php echo round(mphTOkmph($count_yesterday_vehentries['Total']));?> Points</span></div>
                                            <div class="stat-heading">Impacto Econômico</div>
                                            <div class="stat-heading">Total de Pontos Distribuídos</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <?php
//Last Sevendays Vehicle Entries
 $query2=mysqli_query($con,"select ID AS Total from tblvehicle;");
$count_lastsevendays_vehentries=mysqli_num_rows($query2);
//mysqli_fetch_assoc($query2);
//mysqli_num_rows($query2);
 ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib text-info">
                                        <i class="pe-7s-speaker"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $count_lastsevendays_vehentries;?> Unidades Mapeadas</span></div>
                                            <div class="stat-heading">Impacto Governamental</div>
                                            <div class="stat-heading">Transparência de Resultados</div>
                                            <div class="stat-heading">Inventários de Sustentabilidade</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <?php
//Total Vehicle Entries
 $query3=mysqli_query($con,"select ID from tblvehicle");
$count_total_vehentries=mysqli_num_rows($query3);
 ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib text-warning">
                                        <i class="pe-7s-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $count_total_vehentries?></span></div>
                                            <div class="stat-heading">Impacto Social</div>
                                            <div class="stat-heading">Associados</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--
           <*?php
//total Registered Users
 $query=mysqli_query($con,"select ID from tblregusers");
$regdusers=mysqli_num_rows($query);
 ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><*?php echo $regdusers;?></span></div>
                                            <div class="stat-heading">Total Registered Users</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    -->
           <?php
//total Registered Users
 $query=mysqli_query($con,"select SUM(Status) AS Total from tblvehicle;");
 //"select ID from tblcategory");
$listedcat=mysqli_fetch_assoc($query);
//mysqli_num_rows($query);
 ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib text-success">
                                        <!--<i class="pe-7s-config"></i>-->
                                        <i class="pe-7s-leaf"></i>
                                    </div>
                                    <div class="stat-content">
                                        <!--
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><*?php echo $listedcat;?></span></div>
                                            <div class="stat-heading">Motores</div>
                                        </div>
    -->
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $listedcat['Total'];?></span></div>
                                            <div class="stat-heading">Impacto Sustentável</div>
                                            <div class="stat-heading">Co2e para neutralizar</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
                <!-- /Widgets -->
               
            </div>
            
            <?php include_once('../includes/sidebar-provider.php');?>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>
</html>
