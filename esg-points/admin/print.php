  <?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');


?>          
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
        .btn-print {
          text-align: center;
          cursor: pointer;
          margin: 1em auto;
          font-size: 3rem;
          padding: 0.5em;
          border: 1px solid #d8d8d8;
          border-radius: 4px;
          display: flex;
          background-color: #25d366;
          color: #075e54;
        }
    </style>       
<?php

$ret=mysqli_query($con,"select * from tblvehicle");

while ($row=mysqli_fetch_array($ret)) {
  ?>

<div  id="exampl">

      <table border="1" class="table table-bordered mg-b-0">
        <tr>
          <th colspan="4" style="text-align: center; font-size:22px;"> AERONAVE <?php  echo $row['VehicleCategory'];?></th>

        </tr>
   
   <tr>
                                <th>ID</th>
                                   <td><?php  echo $row['ParkingNumber'];?></td>
                                              

                                <th>Modelo</th>
                                   <td><?php  echo $row['VehicleCategory'];?></td>
                                   </tr>
                                   <tr>
                                <th>Motor</th>
                                   <td><?php  echo $packprice= $row['VehicleCompanyname'];?></td>
                             
                                <th>Combustível</th>
                                   <td><?php  echo $row['RegistrationNumber'];?></td>
                                   </tr>
                                   <tr>
                                    <th>Consumo de Combustível (kg)</th>
                                      <td><?php  echo $row['OwnerName'];?></td>
                                  
                                       <th>Emissão de CO (kg)</th>
                                        <td><?php  echo $row['OwnerContactNumber'];?></td>
                                    </tr>
                                    <tr>
                               <th>Data</th>
                                <td><?php  echo $row['InTime'];?></td>
    <th>Co2e</th>
    <td>
    <?php  echo $row['Status'];?>
    
 </td>
  </tr>


</table>
            <?php }  ?>

    <button type="button" class="btn-print"><i class="pe-7s-print" aria-hidden="true" OnClick="CallPrint(this.value)"  ></i></button>

          </div>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
            <script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
}
</script> 
