<!DOCTYPE html>
<html lang="en">
<head> 
    <title>Main</title>
</head>
<body>
<h2>All Poll Question</h2>
<hr>
<?php
    $link = mysqli_connect("localhost","root");
    mysqli_set_charset($link,"utf8");
    mysqli_query($link,"use poll;");
    $sql = "select * from pollquestion";
    $result = mysqli_query($link,$sql);
    while($dbarr = mysqli_fetch_array($result))
    {
        $Qno = $dbarr['QuestionNo'];
        $Qname = $dbarr['QuestionName'];
        echo "<a href=poll_form.php?item=$Qno><b>$Qno &nbsp; $Qname</b><br>";
    }
?>
<hr><a href="poll_new_question.php">Create new Question</a>
</body>
</html>