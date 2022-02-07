<?php 
require_once __DIR__ .'/Departments.php';

require_once __DIR__ .'/database.php';

$sql = 'SELECT * FROM `departments`';
$result = $connection->query($sql);
if($result && $result->num_rows >0){
    $departments=[];

    while ($row=$result->fetch_assoc()) {
        $department = new Department();
        $department->id =$row['id'];
        $department->name =$row['name'];
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
    <h1>lista nomi</h1>
    <?php foreach($departments as $variabile){?>
        <h2><?php echo $variabile->name; ?> </h2>
        <h2><?php echo $variabile->id; ?> </h2>
        <a href="departments-details.php?id=<?php echo $variabile->id; ?>">link</a>
    <?php } ?>
</body>
</html>