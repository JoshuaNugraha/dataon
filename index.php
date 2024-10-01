<?php 
include 'db.php';
$getKain = $conn->query("SELECT a.id, a.nm_kain, b.nm_jenis FROM kain a JOIN jns_kain b ON a.id_jenis=b.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>Data On - Kain List</title>
</head>
<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="row">
                    <div class="col-auto">
                        <a href="master_jenis.php" style="text-decoration:none;color:white;border:0;">
                            <button class="btn btn-warning text-white">
                                Jenis Kain
                            </button>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="kualitas_kain.php" style="text-decoration:none;color:white;border:0;">
                            <button class="btn btn-secondary">
                                Kualitas Kain
                            </button>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="tambah.php" style="text-decoration:none;color:white;border:0;">
                            <button class="btn btn-primary">
                                + Tambah Kain
                            </button>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="pecahan.php" style="text-decoration:none;color:white;border:0;">
                            <button class="btn btn-success">
                               Pecahan
                            </button>
                        </a>
                    </div>
                </div>
        <table class="mt-4">
        <thead>
            <tr>
                <th rowspan="2">Jenis Kain</th>
                <th rowspan="2">Nama Kain</th>
                <th colspan="3">Kualitas</th>
                
            </tr>
            <tr>
                <th>Kualitas</th>
                <th>Nama Kualitas</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
              <?php 
                        $no = 1;
                          while($row = $getKain->fetch_assoc()) {
                            $id = $row['id'];
                            echo "<tr>";
                            echo "<td rowspan='3'>".$row['nm_jenis']."</td>";
                            echo "<td rowspan='3'>".$row['nm_kain']."</td>";
                            $getKuliats = $conn->query("SELECT c.nm_kualitas, c.detail_kualitas, a.harga
                            FROM kualitas_kain a 
                            JOIN kain b ON a.id_kain=b.id
                            JOIN master_kualitas c ON a.id_kualitas=c.id WHERE b.id='$id'");
                                 while($row2 = $getKuliats->fetch_assoc()) {
                                    $no = 1;
                                    if($no > 1){
                                            echo "<tr>";
                                            echo '<td rowspan="1">'.$row2["nm_kualitas"].'</td>
                                                 <td> '.$row2["detail_kualitas"].' </td><td rowspan="1">'.$row2["harga"].'</td>';
                                            echo"</tr>";
                                    }else{
                                            echo '<td rowspan="1">'.$row2["nm_kualitas"].'</td>
                                            <td> '.$row2["detail_kualitas"].' </td><td rowspan="1">'.$row2["harga"].'</td>';
                                            echo"</tr>";
                                    }
                                    $no++;
                                 }
                           
                            
                            $no++;
                          }
                        ?>
          
        </tbody>
    </table>
            </div>
        </div>
    </div>
    
</body>
</html>

