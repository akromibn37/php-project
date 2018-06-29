<?php 
    $item = $_GET["item"];
    $link = mysqli_connect("localhost","root");
    mysqli_set_charset($link,'utf8');
    mysqli_query($link,"use dashboard;");

    function renHTML($strTemp)
    {
        $strTemp = nl2br(htmlspecialchars($strTemp));
        return $strTemp;
    }
    $sql = "select * from question where qno=$item;";
    $result = mysqli_query($link,$sql);
    $dbarr = mysqli_fetch_array($result);
?>
Question <b>
<?php
    echo renHTML($dbarr['qtopic']);
?>
</b><br>
<table width="100%" border="1" bgcolor="#E0E0E0" bordercolor="black">
<tr><td>
<?php
    echo renHTML($dbarr['qdetail']);
?>
 by <b>
<?php
    echo renHTML($dbarr['qname']);
?>
</b>
</td></tr>
</table><br>
<?php
    $sql = "select * from answer where aquestionno=$item;";
    $result = mysqli_query($link,$sql);
    if($result)
    {
        while($dbarr = mysqli_fetch_array($result))
        {
?>
Answer No. <b>
<?php echo $dbarr['ano']; ?>
</b><br>
    <table width="100%" border="1">
    <tr><td>
<?php echo renHTML($dbarr['adetail']); ?><br>
by <b>
<?php echo renHTML($dbarr['aname']); ?>
</b>
    </td></tr>
    </table>
<?php
        }
    }
    echo "<form method='post' action=add_answer.php?answerno=".$item.">";
    mysqli_close($link);
?>
Answer : <br>
<textarea name="a_answer" cols="40" rows="5"></textarea></br>
name : <input type="text" name="a_name" size="30"><br><br>
<input type="submit" value="send">&nbsp;
<input type="reset" value="cancel">
</form><p>
<button onclick="location.href = 'show_question.php'">Back to Question page.</button>