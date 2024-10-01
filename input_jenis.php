<?php 

include "db.php";
if(isset($_GET["id"])){
    $type = "edit";
    $id = $_GET['id'];
    $getJenis = $conn->query("SELECT * FROM jns_kain WHERE id = '$id'");
    $row = $getJenis->fetch_assoc();
    $name = $row['nm_jenis'];
 
}else{
    $type = "tambah";
    $name = "";
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
     <form action="input_jenis.php" method="post">
        <div class="form-group">
            <label >Nama Kain</label>
            <input type="text" class="form-control"  name="nm_jenis" value="<?php echo $name; ?>">    
            
        </div>
            <input type="hidden" name="type" value="<?php echo $type; ?>">
            <input type="hidden" name="id" value="<?php echo $id ?>">        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   </div>
</body>
</html>

<?php 

if(isset($_POST['nm_jenis'])){
    $nm_jenis = $_POST['nm_jenis']; 
    $id = $_POST['id']; 
    if($_POST['type'] == 'tambah'){
        // atambah jenis baru        
            $query = $conn->query("INSERT INTO jns_kain (nm_jenis) VALUES ('$nm_jenis')"); 
    }else{
        // edit jenis
        
        $query = $conn->query("UPDATE jns_kain SET nm_jenis= '$nm_jenis' WHERE id = '$id'");
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