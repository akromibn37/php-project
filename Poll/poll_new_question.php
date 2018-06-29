<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h2>New poll question</h2>
    <form action="poll_insert_question.php" name="form1" method="post" id ='form1'>
    Question:<p>
    <input type="text" name="question"><p>
    Choice:<p>
    <select name="choicenum" id="choicenum" onchange="addinput()">
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
        <option value=5>5</option>
        <option value=6>6</option>
        <option value=7>7</option>
        <option value=8>8</option>
        <option value=9>9</option>
        <option value=10>10</option>
    </select>
    
    </form>
    <button onclick="location.href='poll_main.php';">Back to Main page</button>
    <script>
        function addinput()
        {
            var x = document.getElementById("form1")
            var y = document.getElementById("choicenum").value
            if (document.contains(document.getElementById("inp"))) 
            {
                document.getElementById("inp").remove();
            } 
            var div = document.createElement('div')
            div.id = 'inp'
            var str = ""
            for(var i = 1;i<=y;i++)
            {
                str += i + ". <input type='text' name='choice"+ i +"'> <p>"
            }
            str+= "<input type='submit' name='submit' value='send'>"
                    +"<input type='reset' name='cancel' value='cancel'>"
            div.innerHTML = str
            x.appendChild(div)
        }
    </script>
</body>
</html>