<?php

$hostname='localhost';
$username='root';
$password='root';
$database='srms';
$connection= new mysqli($hostname,$username,$password,$database);

$query = 'select * from admin_info';

$table = $connection->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/SAMSfav.png">
    <style>
        html,body{
            padding: 0;
            margin: 0;
        }
        body{
            height: 100vh;
            
        }
    </style>
    <title>SAMS admin portal</title>
</head>
<body >

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Simple Password</th>
                </tr>
                
                    <?php

                        while($row=$table->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>".$row['user_name']."</td>";
                            echo "<td>".$row["password"]."</td>";
                            echo '<td> <a class="btn btn-danger" href="test.php?rowID='.$row["id"] .'">Edit</a> </td>';

                            echo "</tr>";
                        }
                        
                    ?>
                
            </thead>

        </table>
   
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>