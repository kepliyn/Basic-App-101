<?php 
require 'database.php';
$func = new functions();

echo "hey there " . $_SESSION['name'] . " are you shure you want to delete your account?";
echo "</br>";

echo "if you really are shure type 'DELETE'";


if (isset($_POST['delete'])) {
    if ($_POST['delete'] == "DELETE"){

        echo "</br>";
        echo "it has been a pleasure ". $_SESSION['name'] . "</br>";

        $sql = "DELETE FROM users WHERE user_id=:id;";
        $placeholders = ['id' => $_SESSION['id']];
        $func->dbActivate($sql, $placeholders);
        echo "delete was sucsessfull";

        header('location: index.php');

    } else {
        echo "</br>";
        echo "by type 'DELETE' i mean type'DELETE' how hard is this to understand?";
    }
}


//here is a little list of things that i want perfected.

// first of all i want the taggs to work.

// and have a personal post list that you can edit with a little edit that pops up when you do
// and uu. i forgor X_X



?>
<form method = POST action = index3.php>
    <input type = text name = delete placeholder = "DELETE"></input>
    <input type = submit value="delete user data"></input>
</form>