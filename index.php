<?php

//this is where the link to the functions are established
require 'database.php';
//$func can be everything but the functions() is from the database.php so now when you need a function you can just
// pull it out of the $func with the arrow like this:  $func->function()
$func = new functions();



if(isset($_POST['email_adress'])) {

//OVER HERE IS THE INSERT PAGE CODE UNCOMMENT THIS WHEN INSERTING A NEW USER
//  $regexgate = $func->identifyFake($_POST['email_adress']);
//  if ($regexgate == 1){

//         $replicavalue = $func->detectReplica($_POST['email_adress']);
//         if ($replicavalue == 1){
//             echo "that email one is taken pick another boyo";
//         } elseif($replicavalue == 0){

//             $pass = $func->hash($_POST['password']);
//             $sql = "INSERT INTO users (first_name, last_name, email_adress, password, date_of_birth) VALUES (:first_name_form, :last_name_form, :email_adress_form, :password_form, :date_of_birth_form)";
//             $placeholders = ['first_name_form' => $_POST['first_name'],'last_name_form' => $_POST['last_name'],'email_adress_form' => $_POST['email_adress'],'password_form' => $pass,'date_of_birth_form' => $_POST['date_of_birth']];

//         $func->dbActivate($sql, $placeholders);
//         }

//  } else {
//     echo "you IDIOT! that was NOT an email adress!!! where you even TRYING???";
//  }
//OVER HERE IS THE INSERT PAGE CODE UNCOMMENT THIS WHEN INSERTING


//AND THIS IVER HERE IS THE LOGIN METHOD. UNCOMMENT THIS TO USE THE LOGIN PART OF THIS TEXT
 $regexgate = $func->identifyFake($_POST['email_adress']);
 if ($regexgate == 1){
    $func->login($_POST['email_adress'], $_POST['password']);
 } else {
    echo "you IDIOT! that was NOT an email adress!!! where you even TRYING???";
 }
//AND THIS IVER HERE IS THE LOGIN METHOD. UNCOMMENT THIS TO USE THE LOGIN PART OF THIS TEXT

}
?>



<form action="index.php" method="POST">
<input type = "text" placeholder = "email" name="email_adress">
<input type = "text" placeholder = "password" name="password">
<!-- 
<input type = "text" placeholder = "name" name="first_name"></br>
<input type = "text" placeholder = "last name" name="last_name"></br>
<input type = "text" placeholder = "email" name="email_adress"></br>
<input type = "text" placeholder = "password" name="password"></br>
<input type = "date" placeholder = "date of birth" name="date_of_birth"> -->

<input type = "submit">
</form>