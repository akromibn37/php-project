<?php
    session_start();
    if($_SESSION['username']=="")
    {
        echo "please login";
        exit();
    }
    include("exam_class.php");
    $examid = $_GET['item'];
    $conn = new connection();
    $sql = "select * from examdata where examid = $examid";
    $result = $conn->calldb($sql);
    echo "<h1>Exam $examid</h1><br><hr>";
    echo "<form method='post'>";
    while($dbarr = mysqli_fetch_array($result))
    {
        echo "<h3>".$dbarr['No']." ".$dbarr['Question']."</h3><br>";
        echo "<input type=radio value=1 name=".$dbarr['No'].">1.".$dbarr['choice1'];
        echo "<input type=radio value=2 name=".$dbarr['No'].">2.".$dbarr['choice2'];
        echo "<input type=radio value=3 name=".$dbarr['No'].">3.".$dbarr['choice3'];
        echo "<input type=radio value=4 name=".$dbarr['No'].">4.".$dbarr['choice4'];
    }
    echo "<p><input type=submit name=submit value=Submit>";
    echo "</form>";
    echo "<a href=exam_result.php>logout</a><p>";
    if (isset($_POST['submit'])) {
        echo $_POST['1'];
        echo $_POST['2']."<p>";
        echo $_SESSION['id'].",".$_SESSION['username'].",".$_SESSION['status'];
    }
    $conn->closedb();
?>