<?php 
require_once __DIR__ .'/database.php';
require_once __DIR__ .'/Departments.php';

$sql = $connection->prepare('SELECT * FROM `departments` WHERE id = ?');
$sql ->bind_param('d' , $id);
$id = $_GET['id'];
$sql->execute();
$result = $sql->get_result();


if($result && $result->num_rows >0){
    $departments=[];

    while ($row=$result->fetch_assoc()) {
        $department = new Department();
        $department->id =$row['id'];
        $department->name =$row['name'];
        $department->email =$row['email'];
        $department->address =$row['address'];
        $department->website =$row['website'];
        $departments[] = $department;
    }
    
}elseif($result && $result->num_rows=0){
 echo 'risultati non displonibili';
}else{
    echo 'errore di query';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>dipartimento in dettaglio</h1>
    <?php foreach($departments as $variabile){?>
        <h2><?php echo $variabile->name; ?> </h2>
        <h2><?php echo $variabile->id; ?> </h2>
        <a href="#"><?php echo $variabile->website; ?></a>
        <h2><?php echo $variabile->address; ?> </h2>
        <h2><?php echo $variabile->email; ?> </h2>
    <?php } ?>
</body>
</html>