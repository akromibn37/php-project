<!DOCTYPE html>
<html>
<head>
    <title>Poll</title>
</head>
<body>
    <?php
        $item = $_GET["item"];
        $flag = 1;
        $link = mysqli_connect("localhost","root");
        mysqli_set_charset($link,'utf8');
        mysqli_query($link,'use poll;');
        
        $sql = "select * from pollquestion pq,pollchoice pc". 
                " where pq.QuestionNo = pc.QuestionNo and pq.QuestionNo = $item".
                " order by pq.QuestionNo,pc.QuestionNo;";
        $result = mysqli_query($link,$sql);
        // echo $sql;
    ?>
    <form action="poll_result.php" method="post">
    <?php
        while($dbarr = mysqli_fetch_array($result))
        {
            // echo $dbarr;
            $questionno = $dbarr['QuestionNo'];
            $questionname = $dbarr['QuestionName'];
            $choiceno = $dbarr['ChoiceNo'];
            $choicename = $dbarr['ChoiceName'];
            if($flag ==1)
            {
                echo "<b>$questionname</b><p>";
                echo "<input type=hidden name=Number value=$questionno>";
                $flag = 0;
            }
            echo "<input type=radio name=Choice value=$choiceno> $choicename<br>";
        }
    ?>
    <p><input type="submit" name="submit" value="Vote">
        <input type="reset" name="reset" value="Cancel">
    </form>
    <!-- <button onclick="location.href = 'poll_new_question.php';">Create new poll Question</button> -->
    <button onclick="location.href = 'poll_main.php';">Back to main page</button>
    <?php
        mysqli_close($link);
    ?>
</body>
</html>