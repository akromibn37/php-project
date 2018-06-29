<?php
    $question = $_POST['question'];
    $count = 0;
    $link = mysqli_connect("localhost","root");
    mysqli_set_charset($link,"utf8");
    mysqli_query($link,"use poll;");
    $sql = "select * from pollquestion";
    $result = mysqli_query($link,$sql);
    while($dbarr = mysqli_fetch_array($result))
    {
        $count++;
    }
    // echo $count;
    $count++;
    $sql = "insert into pollquestion (QuestionNo,QuestionName) values($count,'$question');";
    // echo $sql;
    $result = mysqli_query($link,$sql);

    $choicenum = $_POST['choicenum'];
    // echo "choicenum = ".$choicenum;
    $i = 1;
    while($i<=$choicenum)
    {
        $choice = 'choice'.$i;
        $choice = $_POST[$choice];
        $sql = "insert into pollchoice(QuestionNo,ChoiceNo,ChoiceName,Score) values($count,$i,'$choice',0);";
        // echo $sql;
        $result = mysqli_query($link,$sql);
        $i++;
    }
    echo "Insert Finished!";
    mysqli_close($link);

?>
<p><button onclick = "location.href = 'poll_main.php'">Back to Main page</button>