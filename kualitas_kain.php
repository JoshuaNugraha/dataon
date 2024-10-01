
<?php 

    include 'db.php';

    // ambil data kualitas kain
    $getJenis = $conn->query("SELECT * FROM master_kualitas");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3>Master Kualitas</h3>
        <div class="row">
            <div class="col-12">
                <a href="input_kualitas.php">
                    <button class="btn btn-primary">
                        + Tambah
                    </button>
                </a>
            </div>
        </div>
        <div class="row mt-3">
           <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kualitas</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
          
            
            <tbody>
                <?php 

                    if($getJenis->num_rows > 0){
                            $no = 1;
                            while($row = $getJenis->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $row['nm_kualitas'] . "</td>";
                                echo "<td>" . $row['detail_kualitas'] . "</td>";
                                echo '<td> <a href="hapus_jenis.php?id='.$row["id"].'">
                                                <button class="btn btn-danger">
                                                        Hapus
                                                </button>
                                            </a>
                                              <a href="input_kualitas.php?id='.$row["id"].'">
                                                    <button class="btn btn-primary">
                                                            Edit
                                                    </button>
                                            </a>
                                        </td>';
                                echo "</tr>";
                                $no++;
                            }
                    }else{
                        echo "<tr> 
                            <td colspan='3' class='text-center'> Belum Ada Data </td>
                            </tr>
                        ";  
                    }
                
                ?>
                
                   
                
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>

