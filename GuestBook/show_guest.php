<?php
    $link = mysqli_connect("localhost","root");
    mysqli_set_charset($link,'utf8');
    mysqli_query($link,"use guestbook;");

    $sql = "select * from guestdata order by date desc;";
    $result = mysqli_query($link,$sql);
    while($dbarr = mysqli_fetch_array($result))
    {
        echo "<table border=1>";
        echo "<tr>";

        echo "<td><b>name-surname: </b></td>";
        echo "<td>$dbarr[name]</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><b> E-mail Address: </b></td>";

        echo "<td><a href=mailto:$dbarr[email]>$dbarr[email]</td>";
        echo "</tr>";
        echo "<tr>";
        
        echo "<td><b>comment: </b></td>";
        echo "<td>$dbarr[comment]</td>";
        echo "</tr>";
        echo "<tr>";
        
        echo "<td><b>time: </b></td>";
        echo "<td>$dbarr[date]</td>";
        echo "</tr>";
        echo "<tr>";
        
        echo "<td><b>IP Address: </b></td>";
        echo "<td>$dbarr[ip]</td>";
        echo "</tr>";
        echo "</table><p>";
    }
    mysqli_close($link);
?>