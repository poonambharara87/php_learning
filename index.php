
<?php  include 'database.php';?>
<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
    <body>

    <h1>User Data</h1>
    <td><a href="insert.php?>">Add user</a></td>
        <table id="customers">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        
        <?php
                $data = new DB();
                $result = $data->showData();   
            
                 while($row=mysqli_fetch_array($result)){
                  
                 ?>
                    <tr>
                      <td> <?php echo $row['id']?></td>
                      <td> <?php echo $row['usrname']?></td>
                      <td> <?php echo  $row['usremail']?></td>
                      <!-- don't put single quote when value of id -->
                      <td><a href="edit.php?id=<?php echo $row['id']?>">Edit</a></td>
                      <td><a href="delete.php?id=<?php echo $row['id']?>">Delete</a></td>
                    </tr>
                 
                 <?php
                 }
            ?>
        

        </table>

    </body>
</html>


