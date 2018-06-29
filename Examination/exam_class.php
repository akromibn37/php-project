<?php
    class connection{
        var $link;  
        var $result;
        function connection(){
            $this->link=mysqli_connect("localhost","root","","examination");
        }
        function calldb($sql){
            $this->result = mysqli_query($this->link,$sql);
            return $this->result;
        }
        function closedb(){
            mysqli_close($this->link);
        }
    }