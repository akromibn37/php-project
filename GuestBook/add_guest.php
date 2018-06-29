<?php
    $guest_name = $_POST['guest_name'];
    $guest_email = $_POST['guest_email'];
    $guest_comment = $_POST['guest_comment'];
    $remote_addr = $_SERVER['REMOTE_ADDR'];

    if($guest_name=="" || $guest_email==""||$guest_comment=="")
    {
        echo "Please fill all data.<p>";
?>
<input type="button" value="Back to change" onclick="history.back();">

<?php
    exit();
    }
    $currentdatetime = (date("Y") + 543).date("-m-d G:i:s");
    $link = mysqli_connect("localhost","root");
    mysqli_set_charset($link,'utf8');
    mysqli_query($link,"use guestbook;");
    $sql = "insert into guestdata(name,email,comment,date,ip) values('$guest_name',".
            "'$guest_email','$guest_comment','
            $$currentdatetime','$remote_addr')";
    echo $sql;
    $result = mysqli_query($link,$sql);
    if($result)
    {
        echo "Recorded finish<p>";
        mysqli_close($link);
    }
    else
    {
        echo "Error<p>";
    }
    echo "<a href=show_guest.php>show guest</a><br>";
    echo "<a href=form_guest.html>Back to form filler</a><br>";
?>
