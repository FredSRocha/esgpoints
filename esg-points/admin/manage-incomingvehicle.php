<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
  
if($_GET['del']){
$catid=$_GET['del'];
mysqli_query($con,"delete from tblvehicle where ID ='$catid'");
echo "<script>alert('O registro foi excluído com sucesso!');</script>";
echo "<script>window.location.href='manage-incomingvehicle.php'</script>";
          }


  ?>
<!doctype html>

<html class="no-js" lang="">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ESG Points</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .btn {
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
        }
        .form-text {
            margin-left: .35rem;
        }
    </style>
</head>
<body>


        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                   
         

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Gestão de Emissões Aéreas</strong>
                        </div>
                        <div class="card-body">
                             <table class="table text-center">
                <thead>
                                        <tr>
                                            <tr>
         
                    <th>Aeronave</th>
                    <th>Motor</th>
                    <th>Combustível</th>
                    <th>Consumo (kg)</th>
                    <th>Emissão CO (kg)</th>
                    <th>Pegada (Co2e)</th>
                   
                          <th>Ação</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
$ret=mysqli_query($con,"select *from   tblvehicle");

while ($row=mysqli_fetch_array($ret)) {
?>
              
                <tr>
           
            
                <td><?php  echo $row['VehicleCategory'];?></td>
                  <td><?php  echo $row['VehicleCompanyname'];?></td>
                  <td><?php  echo $row['RegistrationNumber'];?></td>
                  <td><?php  echo $row['OwnerName'];?></td>
                  <td><?php  echo $row['OwnerContactNumber'];?></td>
                  <td><?php  echo $row['Status'];?></td>
                  
                  <td>

<a href="manage-incomingvehicle.php?del=<?php echo $row['ID'];?>" class="btn btn-danger" onClick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                  </td>
                </tr>
                <?php 

}?>
              </table>

                    </div>
                </div>
            </div>

   

        </div>
    </div>
    <?php include_once('../includes/sidebar-inc.php');?>
</div>



</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>