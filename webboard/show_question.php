<!DOCTYPE html>
<html>
<head>
    <title>Show Question</title>
</head>
<body>
    <h2>All topic</h2>
    <hr>
    <?php
        $link = mysqli_connect("localhost","root");
        mysqli_set_charset($link,'utf8');
        mysqli_query($link,"use dashboard");

        $sql = "select * from question;";
        $result = mysqli_query($link,$sql);
        while($dbarr = mysqli_fetch_array($result))
        {
            echo $dbarr['qno'];
            echo "&nbsp;<a href=show_detail.php?item=$dbarr[qno]>$dbarr[qtopic]</a>&nbsp;";
            echo $dbarr['qname'];
            echo "&nbsp;[" . $dbarr['qcount'] . "]<br>\n";
        }
        mysqli_close($link);
    ?>
    <hr><a href="form_question.html">new topic</a>
</body>
</html>