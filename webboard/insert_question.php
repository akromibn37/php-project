<?php 
    $topic = $_POST["topic"];
    $detail = $_POST["detail"];
    $name = $_POST["name"];

    $link = mysqli_connect("localhost","root");
    mysqli_set_charset($link,'utf8');
    $sql = "use dashboard";
    $result = mysqli_query($link,$sql);   
    $sql = "insert into question values('0','$topic','$detail','$name',0)";
    $result = mysqli_query($link,$sql);
    if($result)
    {
        echo "Insert finished.";
        mysqli_close($link);
    }
    else
    {
        echo "Cannot insert data to table.";
    }
    echo "<br><a href=show_question.php>show all topic</a><br>";
    echo "<a href=form_question.html>Back</a>";
?>