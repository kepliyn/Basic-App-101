<?php 

require 'database.php';
$func = new functions();

$date_is = date("Y"). "-" . date('m'). "-" . date('d');

// echo date('F', strtotime(date("d-m-y")));
// echo "</br>";
// $year =  date("Y");
// $month =  date("m");

// $sql = "";


// echo "Today is " . date("Y-d-m") . "<br>";
if (isset($_POST['RENT'])) {
    $_SESSION['a'] = $_POST['RENT'];
 
     header("location: index8.php");
    
}


// if(!isset($_POST['start'])) {
//     header("location: index7.php");
// }
        
        $start = $_POST['start'];
        $end = $_POST['end'];
        //"select * from reservatable_thing WHERE id NOT IN (select reservate_id from reservations WHERE start_date >= '$start' AND end_date <= '$end')");
        $statement = $func->pdo->prepare("select * from reservatable_thing WHERE id NOT IN (select reservate_id from reservations WHERE start_date AND end_date >= '$start' AND end_date AND start_date <= '$end')"); 
        $statement->execute();
        while ($result = $statement->fetch()) {
            echo $result['name'] . " ";
            echo $result['description'] . "";
            echo ". You will find it on floor " . $result['floor'];
            ?> 
                <form action="index6.php" method = "POST">
                <input type = "hidden" value = "<?php echo $result['id'] ?>" name = 'RENT'> </input>
                <input type = "hidden" value = 'RENT'> </input>
                <input type = "submit" value = 'a'> </input>
        </form>
            <?php
            
        }

?>