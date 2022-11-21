<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');


if(isset($_POST['submit']))
  {
    $catname=$_POST['catename'];
     
    $query=mysqli_query($con, "insert into  tblcategory(VehicleCat) value('$catname')");
    if ($query) {
    echo "<script>alert('Cadastro realizado com sucesso!');</script>";
echo "<script>window.location.href='manage-category.php'</script>";
  }
  else
    {
     
       echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }

  
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

              

                    <div class="col-sm-6 col-12 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <strong>Aeronaves</strong>
                                <p>Unidades de Emissão</p>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    
                                    <div class="row form-group mb-3">
                                        <div class="col-12">
                                            <input type="text" id="catename" name="catename" class="form-control" placeholder="Modelo" required="true">
                                            <div class="form-text">Ex. A319</div>
                                        </div>
                                    </div>
                                 
                                    
                                    
                                   <p style="text-align: center;">
                                   <button type="submit" class="btn btn-primary " name="submit" >Adicionar</button></p>
                                </form>
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
