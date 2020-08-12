<?php 
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];
    include('database_connection.php');

    $update = "UPDATE id SET id = id + 1 WHERE id = '".$id."'";

    if (mysqli_query($connect, $update))
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error updating record: " . mysqli_error($connect);
    }
    die;
}
?>
