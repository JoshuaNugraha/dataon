<?php 

include "db.php";
if(isset($_GET["id"])){
    $type = "edit";
    $id = $_GET['id'];
    $getJenis = $conn->query("SELECT * FROM master_kualitas WHERE id = '$id'");
    $row = $getJenis->fetch_assoc();
    $name = $row['nm_kualitas'];
    $detail = $row['detail_kualitas'];
 
}else{
    $type = "tambah";
    $name = "";
    $detail = "";
    $id = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
   <div class="container p-5">
     <form action="input_kualitas.php" method="post">
        <div class="form-group">
            <label >Nama Kualitas</label>
            <input type="text" class="form-control"  name="nm_kualitas" value="<?php echo $name; ?>">    
            
        </div>
        <div class="form-group">
            <label >Detail Kualitas</label>
            <input type="text" class="form-control"  name="detail_kualitas" value="<?php echo $detail; ?>">    
            
        </div>
            <input type="hidden" name="type" value="<?php echo $type; ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   </div>
</body>
</html>

<?php 

if(isset($_POST['nm_kualitas'])){
    $nm_jenis = $_POST['nm_kualitas']; 
    $detail = $_POST['detail_kualitas'];
    $id = $_POST['id']; 
    if($_POST['type'] == 'tambah'){
        // atambah kuatias baru        
            $query = $conn->query("INSERT INTO master_kualitas (nm_kualitas, detail_kualitas) VALUES ('$nm_jenis','$detail')"); 
    }else{
        // edit kuatias
        
        $query = $conn->query("UPDATE master_kualitas SET nm_kualitas= '$nm_jenis', detail_kualitas = '$detail' WHERE id = '$id'");
    }
     if($query){
                header("Location: index.php");
                exit();
               
            }else{
                echo "TERJADI KESALAHAN";
            }
$conn->close();
}
?>