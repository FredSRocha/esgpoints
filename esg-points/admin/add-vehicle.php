<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');


if(isset($_POST['submit']))
  {
    $parkingnumber=mt_rand(100000000, 999999999);
    $catename=$_POST['catename'];
     $vehcomp=$_POST['vehcomp'];
    $vehreno=$_POST['vehreno'];
    $ownername=$_POST['ownername'];
    $ownercontno=$_POST['ownercontno'];
    $status=$_POST['status'];
    $enteringtime=$_POST['enteringtime'];
    


    $mi=$status;
    //234.5;
  
    $url = "https://beta3.api.climatiq.io/estimate";
  
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array(
       "Authorization: Bearer 2FM293AB2M4X3KHACQT52D1DHP7K",
       "Content-Type: application/x-www-form-urlencoded",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $data = <<<DATA
    {
            "emission_factor": {
                "activity_id": "passenger_flight-route_type_domestic-aircraft_type_jet-distance_na-class_na-rf_included"
            },
            "parameters": {
          "passengers": 4,
          "distance": {$mi},
          "distance_unit": "mi"
            }
        }
    DATA;
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    
    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $resp = curl_exec($curl);
    curl_close($curl);
    //var_dump($resp);
    $value = json_decode($resp);
    //json_encode(json_decode($resp));
    $status= $value->{'co2e'};
    




     
    $query=mysqli_query($con, "insert into  tblvehicle(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber,Status) value('$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno','$status')");
    if ($query) {
echo "<script>alert('Vehicle Entry Detail has been added');</script>";
echo "<script>window.location.href ='manage-incomingvehicle.php'</script>";
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>";       
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
                                <strong>Emissão</strong>
                                <p><b>Escopo 3.</b> Viagens Aéreas</p>
                            </div>
                            <div class="card-body card-block">
                                <p>Além da distância do voo, o consumo de combustível e as emissões atmosféricas de uma aeronave são condicionados por diversos outros fatores que caracterizam o voo, como a trajetória altimétrica, as variações de velocidade, a carga transportada, as condições de climáticas, etc.</p>
                                <p>A base EMEP/EEA (2016) apresenta uma tabela com valores de emissão e consumo resultantes de modelagem na qual, para cada combinação de modelo de aeronave e fator de emissão/consumo de combustível, são tabelados os totais (em kg) para 17 pontos. Cada ponto designa uma distância de voo, compreendidos entre 231,5 e 12.964 quilômetros [...] (METODOLOGIA DE CÁLCULO, 2019).</p>
                                <p><b>Fonte:</b> <a href="https://www.anac.gov.br/assuntos/paginas-tematicas/meio-ambiente/arquivos/metodologia-de-calculo_v8.pdf">https://www.anac.gov.br/assuntos/paginas-tematicas/meio-ambiente/arquivos/metodologia-de-calculo_v8.pdf</a></p>
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    

                                    <div class="row form-group mb-3">
                                        <div class="col-12">
                                            <select name="catename" id="catename" class="form-control">
                                                <option value="0" selected disabled>Selecione a fonte de emissão</option>
                                                <?php $query=mysqli_query($con,"select * from tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
                                                 <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  <?php } ?> 
                                            </select>
                                            <div class="form-text">Aeronaves</div>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-3">
                                        <div class="col-12">
                                            <input type="text" id="vehcomp" name="vehcomp" class="form-control" placeholder="Motor" required="true">
                                            <div class="form-text">Ex. CFM56-7B27</div>
                                        </div>
                                    </div>
                                 
                                     <div class="row form-group mb-3">
                                        <div class="col-12">
                                        <select id="vehreno" name="vehreno" class="form-control" required>
                                            <option value="" selected disabled>Qual o combustível usado?</option>
                                            <option value="Gasolina de aviacao">Gasolina de aviação</option>
                                            <option value="Querosene de aviacao">Querosene de aviação</option>
                                        </select>
                                   
                                        </div>
                                    </div>
                                    <div class="row form-group mb-3">
                                        <div class="col-12">
                                            <input type="text" id="ownername" name="ownername" class="form-control" placeholder="Consumo de Combustível(kg)" required="true">
                                            <div class="form-text">2.217,5</div>
                                        </div>
                                    </div>
                                     <div class="row form-group mb-3">
                                        <div class="col-12">
                                            <input type="text" id="ownercontno" name="ownercontno" class="form-control" placeholder="Emissão CO (kg)" required="true">
                                            <div class="form-text">7.8 *(Não use vírgulas)</div>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-3">
                                        <div class="col-12">
                                            <input type="text" id="status" name="status" class="form-control" placeholder="Distância (mi)" required="true">
                                            <div class="form-text">eg. 143 mi to 231.5 km</div>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group mb-3">
                                        <div class="col-12">
                                            <img src="assets/img/climatiq-logo.webp" alt="Climatiq API">
                                     <p>O Co2e define a equivalência em dióxido de carbono, CO₂eq ou CO₂e, é uma medida internacionalmente aceita que expressa a quantidade de gases de efeito estufa em termos equivalentes da quantidade de dióxido de carbono. Utilizamos a intelligence da API climatic.io para estabelecer essa importante métrica em nosso inventário.</p>

                                        </div>
                                    </div>  
                                    
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary" name="submit" >Adicionar</button></p>
                                </form>
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
