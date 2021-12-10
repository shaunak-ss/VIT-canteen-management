<?php
$con = mysqli_connect("localhost", "root", "", "train");

if(isset($_POST['submit'])){
    $res=
}
?>
<h1>TIcket cancellation form</h1><br>
<form method="POST">
    <label>Train no</label><br>
    <input name="trainno" type="text"><br>
    <label>class</label><br>
    <input name="class" type="text"><br>
    
    <label>NO cancel</label><br>
    <input name="cano" type="text"><br>

    <input type="submit" name="submit">

</form>