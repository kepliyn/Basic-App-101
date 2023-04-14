<?php

require 'database.php';
$func = new functions();

if (isset($_SESSION['search'])) {

    $statement = $func->pdo->prepare('SELECT * FROM objects WHERE item_name = :search');
    $statement->bindParam(":search", $_SESSION['search']);
    $statement->execute();

    unset($_SESSION["search"]);

}elseif (isset($_POST['search'])) {

    $statement = $func->pdo->prepare('SELECT * FROM objects WHERE item_name = :search');
    $statement->bindParam(":search", $_POST['search']);
    $statement->execute();
    
} else {
    $statement = $func->pdo->query('SELECT * FROM objects');
}

if (isset($_POST['INSPECT'])) {
    $_SESSION["inspected"] = $_POST['INSPECT'];

    header('location: index5.php');
}

?>

<bold>and here is a search bar</bold>

<form action = 'index4.php' method="POST">
<input type="text" placeholder="search...." name = 'search'></input>
<input type = 'submit' value = "cat>dog">
</form>





<?php 
while ($result = $statement->fetch()) { 
    
if ($result['edited'] == 0) {
    $edit_status = 'unedited';
} else {
    $edit_status = "edited";
}   
?>

<p><?php echo $result['item_name']; echo " "; echo $result['item_description']; echo " " . $edit_status ?></p>
<form action = 'index4.php' method = 'POST'>
<input type = "hidden" value = "<?php echo $result['item_id'] ?>" name = 'INSPECT'> </input>
<input type = "submit" value = 'inspect'> </input>
</form>


<?php } ?>