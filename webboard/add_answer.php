<?php
    $answerno = $_GET["answerno"];
    $a_answer = $_POST["a_answer"];
    $a_name = $_POST["a_name"];

    $link = mysqli_connect("localhost","root");
    mysqli_set_charset($link,'utf8');
    mysqli_query($link,"use dashboard;");
    $sql = "select * from answer where aquestionno = $answerno;";
    $count = 1;
    $result = mysqli_query($link,$sql);

    while($dbarr = mysqli_fetch_array($result))
    {
        $count++;
    }
    $sql="insert into answer values($count,'$a_answer','$a_name',$answerno);";
    $result = mysqli_query($link,$sql);
    echo $result;
    if($result)
    {
        $sql = "update question set qcount = qcount + 1 where qno=$answerno;";
        $result = mysqli_query($link,$sql);
        echo "Answer recorded.<br><br>";
        echo "<a href=show_detail.php?item=$answerno>Back to topic</a><br>";
        echo "<a href=show_question.php>Main page</a>";
    }
    else
    {
        echo "Error to record answer to the database.";
    }
    mysqli_close($link);
?>

