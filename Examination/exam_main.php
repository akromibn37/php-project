<?php
    session_start();
    $formname = $_POST['submit'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $link = mysqli_connect("localhost","root");
    mysqli_set_charset($link,'utf8');
    mysqli_query($link,"use examination");
    // echo $formname;
    if($formname=='login')
    {
        $sql = "select * from userdata where username = '".$username."' and password = '"
        .md5($password)."';";
        // echo $sql;
        $result = mysqli_query($link,$sql);
        $dbarr = mysqli_fetch_array($result);
        if($dbarr)
        {
            $_SESSION['username'] = $dbarr['username'];
            $_SESSION['status'] = $dbarr['type'];
            $_SESSION['id'] = $dbarr['id'];
            $id = $dbarr['id'];
            $type = $dbarr['type'];
            // echo "<br>".$id." ".$type."<br>";
            // echo "login finished!!";
            if($type == 'admin')
            {
                header("location:admin_session.php");
            }
            else
            {
                echo "<h3>Hello Student_id $id<h3>";
                echo "<h1>All Exam</h1>";
                echo "<p><hr>";
                $sql = "select * from examdata where No=1;";
                // echo $sql;
                $result = mysqli_query($link,$sql);
                // echo $result;
                // echo sizeof($dbarr);
                while($dbarr=mysqli_fetch_array($result))
                {
                    $exid = $dbarr['examid'];
                    $exam = $dbarr['examname'];
                    // echo $exid." ".$exam;
                    echo "<a href=exam_form.php?item=$exid>$exid $exam</a><br>";
                }
                echo "<hr>";
                if($type=='student')
                {                                                       
                    echo "<h1>Exam result</h1><p>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Exam_id</th>";
                    // echo "<th>Exam_name</th>";
                    echo "<th>Max</th>";
                    echo "<th>Score</th>";
                    echo "</tr>";
                    
                    //get max score
                    $sql1 = "select * from answerdata where id=$id and No=1;";
                    // echo $sql1;
                    $result = mysqli_query($link,$sql1);
                    while($dbarr = mysqli_fetch_array($result))
                    {
                        // // echo $dbarr;
                        // echo count($dbarr) .",".$dbarr[0];
                        // for($i=0;$i<count($dbarr);$i++)
                        // {
                        $sql = "select No from examdata where examid=".$dbarr['examid'].";";
                        // echo $sql;
                        $result = mysqli_query($link,$sql);
                        $max = sizeof($max=mysqli_fetch_array($result));
                        // echo $max;
                        
                        $sql = "select ad.id,ad.examid,ad.No,ad.answer,ed.eanswer"
                        ." from answerdata ad join examdata ed on ad.examid = ed.examid"
                        ." and ad.No = ed.No and ad.examid = ".$dbarr['examid'].";";
                        // echo $sql;
                        $result = mysqli_query($link,$sql);
                        $score = 0;
                        while($check=mysqli_fetch_array($result)) 
                        {
                            if($check['answer']==$check['eanswer']) $score++;
                        }
                        echo "<tr>";
                        echo "<td>".$dbarr['examid']."</td>";
                        // echo "<th>Exam_name</th>";
                        echo "<td>$max</td>";
                        echo "<td>$score</td>";
                        echo "</tr>";
                        // }
                        
                    }
                    echo "</table>";
                    // $conn->closedb();
                    mysqli_close($link);
                }
                if($type=='teacher')
                {
                    echo "<a href='location.href=exam_form?item=teacher'>create exam</a>";
                }
            }
            // echo "<input type='hidden' name='data' value=''>";
        }
        else
        {
            echo "Username and password is incorrect";
            // header("location:index.html");
        }
    }
    else{
        $sql = "insert into userdata (id,username,password,type) values(0,'$username',md5('$password'),'student');";
        // echo $sql;
        $result = mysqli_query($link,$sql);
        // echo $result;
        if($result) echo "register success!";        
        else echo "register failed";
        $conn->closedb();
    }
?>