<?php

require 'database.php';
$func = new functions();


echo "your user id is " . $_SESSION["id"] . ".<br>";
echo "welcome to the home page ". $_SESSION["name"] . ". ";

// ---------------------8<------------------------------------------8<------------------------------------------8<---------------------


if(isset($_POST['first_name'])){
    $regexgate = $func->identifyFake($_POST['email_adress']);
    if ($regexgate == 1){
        
        $sql = "UPDATE users SET first_name=:first_name_form, last_name=:last_name_form, email_adress=:email_adress_form, password=:password_form, date_of_birth=:date_of_birth_form WHERE user_id=:id";
        $pass = $func->hash($_POST['password']);
        $placeholders = ['first_name_form' => $_POST['first_name'],'last_name_form' => $_POST['last_name'],'email_adress_form' => $_POST['email_adress'],'password_form' => $pass,'date_of_birth_form' => $_POST['date_of_birth'],'id' => $_SESSION["id"]];
        
        if($_SESSION["mailelectric"] == $_POST['email_adress']){

            $func->dbActivate($sql, $placeholders);
            session_destroy();
            header('location: index.php');
            
        } else {
                $replicavalue = $func->detectReplica($_POST['email_adress']);
                if ($replicavalue == 1){
                echo " that email one is taken pick another boyo ";
                } elseif($replicavalue == 0){
                    $func->dbActivate($sql, $placeholders);
                    session_destroy();
                    header('location: index.php');
                }
            
        }
    } else {
        echo "you IDIOT! that was NOT an email adress!!! where you even TRYING???";
    }
} elseif (isset($_POST['search'])){

    $_SESSION["search"] = $_POST['search'];
    header('location: index4.php');
}



$statement = $func->pdo->prepare('SELECT * FROM objects WHERE user_id = :id');
$statement->bindParam(":id", $_SESSION['id']);
$statement->execute();



?>
<!-- ->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->->-> -->
<form action="index2.php" method="POST">

<input type = "text" placeholder = "name" value="<?php echo $_SESSION["name"] ?>" name="first_name"></br>
<input type = "text" placeholder = "last name" value="<?php echo $_SESSION["aftername"] ?>" name="last_name"></br>
<input type = "text" placeholder = "email" value="<?php echo $_SESSION["mailelectric"] ?>" name="email_adress"></br>
<input type = "text" placeholder = "password" value="<?php echo $_SESSION["wordofpassige"] ?>" name="password"></br>
<input type = "date" placeholder = "date of birth" value="<?php echo $_SESSION["birthday"] ?>" name="date_of_birth"></br>
<input type = "submit" value="apply chainges"> 
</form>

</br>
<bold>and here is a search bar</bold>

<form action = 'index2.php' method="POST">
<input type="text" placeholder="search...." name = 'search'></input>
<input type = 'submit' value = "cat>dog">
</form>
</br>

<bold> THEESE ARE THE POSTS UNDER YOUR ID</bold>

<?php while ($result = $statement->fetch()) { ?>
    
    <?php if ($result['edited'] == 0) {
        $edit_status = 'unedited';
    } else {
        $edit_status = "edited";
    }   ?>
    
    <p><?php echo $result['item_name']; echo " "; echo $result['item_description']; echo " " . $edit_status ?></p>
    
    <?php } ?>



</BR>
<button onclick="window.location='index3.php';">
    delete account
</button>