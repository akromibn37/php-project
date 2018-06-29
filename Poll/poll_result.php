<!DOCTYPE html>
<html>
<head>
    <title>Vote result</title>
</head>
<body>
    <h2>Vote result</h2>
    <?php    
                
        $number = $_POST['Number'];
        $Choice = $_POST['Choice'];
        $link = mysqli_connect("localhost","root");
        mysqli_set_charset($link,"utf8");
        mysqli_query($link,"use poll;");          

        $sql = "update pollchoice set Score = Score+1 where QuestionNo = $number and ChoiceNo = $Choice;";
        $result = mysqli_query($link,$sql);

        $sql = "select Sum(Score) SumVote from pollchoice where QuestionNo = $number;";
        $result = mysqli_query($link,$sql);
        while($dbarr = mysqli_fetch_array($result))
        {
            $sum = $dbarr['SumVote'];
        }
        $flag = 1;
        $sql = "select * from pollquestion pq,pollchoice pc". 
        " where pq.QuestionNo = pc.QuestionNo and pq.QuestionNo = $number;";
        $result = mysqli_query($link,$sql);

        
    ?>
    <table cellspacing=0 cellpadding=0 border=1>
    <?php
        while($dbarr = mysqli_fetch_array($result))
        {
            if($flag==1)
            {
                echo "<tr align=center>";
                echo "<td colspan=3><b>$dbarr[QuestionName]</b></td>";
                echo "</tr>";
                echo "<tr align=center>";
                echo "<td><b>Choice</b></td>";
                echo "<td><b>Marks</b></td>";
                echo "<td><b>Percent</b></td>";
                echo "</tr>";
                $flag = 0;
            }
            $percent = ($dbarr['Score']*100)/$sum;
            echo "<tr align=center>";
            echo "<td><b>$dbarr[ChoiceName]</b></td>";
            echo "<td><b>$dbarr[Score]</b></td>";
            echo "<td>";
            printf ("%.2f",$percent);
            echo "%</td>";
            echo "</tr>";
        }
        echo "<tr align=center>";
        echo "<td><b>Sum Vote Mark</b></td>";
        echo "<td><b>$sum</b></td>";
        echo "<td><b>100%</b></td>";
        echo "</tr>";
        echo "</table>";
        mysqli_close($link);
        
        echo "<hr>";
        echo "<a href=poll_form.php?item=$number>Back to vote</a>";
        echo "&nbsp;<a href='poll_delete.php?check=$number'>Delete this Question</a>"

        
    ?>
   
</body>
</html>