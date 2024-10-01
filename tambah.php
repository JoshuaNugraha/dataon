<?php 
include 'db.php';

$getJenis = $conn->query("SELECT * FROM jns_kain");
$getKualitas = $conn->query("SELECT * FROM master_kualitas");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Data On - Tambah Kain</title>
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-12 p-5">
                <form method="post" action="tambah.php">
                    <div class="form-group">
                        <label>Nama Kain</label>
                        <input type="text" class="form-control"  name="nm_kain">
                       
                    </div>
                    <div class="form-group">
                        <label>Jenis Kain</label>
                         <select class="form-control" name="jns_kain">

                         <?php 
                              while($row = $getJenis->fetch_assoc()) {
                                $id_jns  = $row['id'];
                                echo "<option value='$id_jns'>". $row['nm_jenis'] . "</option>";
                              }
                         ?>
                            
                        </select>
                       
                    </div>
                    
                    <?php 
                        while($row = $getKualitas->fetch_assoc()){
                            $id_kualitas = $row['id'];
                            echo '<label> Harga Kualitas '.$row['nm_kualitas'].' </label>'.'<input type="number" class="form-control"  name="'.$id_kualitas.'" >';
                        }
                    ?>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
                
    </div>

</body>
</html>


<?php 
if(isset($_POST['nm_kain'])){
   
    $name = $_POST['nm_kain'];
    $id_jenis = $_POST['jns_kain'];
    $in_kain = $conn->query("INSERT INTO kain (nm_kain, id_jenis) VALUES ('$name', '$id_jenis')");
    
    //  $data = array(
    //     'id_kain' => $conn->insert_id,
      
    // );
    $id_kain = $conn->insert_id;

    if($in_kain){
        $getKualitas = $conn->query("SELECT * FROM master_kualitas");
        while($row_kualitas = $getKualitas->fetch_assoc()){
        $id_kualitas = $row_kualitas['id'];
        $kualitas = $_POST[$id_kualitas];
 
        $in_kualitas = $conn->query("INSERT INTO kualitas_kain (id_kain, id_kualitas, harga)
        VALUES ('$id_kain', '$id_kualitas', '$kualitas')
        ");

        
    }
    }
    header("Location: index.php");
    exit();
    
   
 
}

?>