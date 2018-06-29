<?php
    if($_GET['operator']==1)
    {
        echo $_GET['num1'] + $_GET['num2'];
    }
    else if($_GET['operator']==2)
    {
        echo $_GET['num1'] - $_GET['num2'];
    }
    else if($_GET['operator']==3)
    {
        echo $_GET['num1'] * $_GET['num2'];
    }
    else if($_GET['operator']==4)
    {
        echo $_GET['num1'] / $_GET['num2'];
    }