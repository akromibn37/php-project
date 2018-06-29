<?php
    if(isset($_GET['check'])){
        delete($_GET['check']);
    }  
    function delete($number)
    {
        // echo $number;
        $link = mysqli_connect("localhost","root");   
        mysqli_set_charset($link,"utf8");
        mysqli_query($link,"use poll;");
        $sql = "delete from pollchoice where QuestionNo=$number;";        
        $result = mysqli_query($link,$sql);
        // echo $sql." ".$result;
        $sql = "delete from pollquestion where QuestionNo=$number;";
        // echo $sql." ".$result;
        $result = mysqli_query($link,$sql);
        mysqli_close($link);
        echo "delete finished";
    }
    echo "<a href=poll_main.php>Back to main</a>"
?>