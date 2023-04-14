    <?php 
    
    $date_is = date("Y"). "-" . date('m'). "-" . date('d');


    if (isset($_POST['start']) && isset($_POST['end'])) {
        
        if ($_POST['start'] > $_POST['end']) {
            header("location: https://media.tenor.com/IO2RHSX5V9IAAAAC/cat-cursed-cat.gif");

        } else {
            header("location: index6.php");
        }
    }
    
    
    ?>
    
    
    
    <form action="index6.php" method="POST">
    <input type = "date" min="<?php echo $date_is;?>" name="start">
    <input type = "date" min="<?php echo $date_is;?>" name="end">
    <input type = "submit">
    </form>