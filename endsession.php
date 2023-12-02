<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<style>
.box
{
    background: white;
    width:300px;
    border-radius:10px;
    padding:50px
    position: relative;
    margin-left:40%;
    margin-top:20%;
}
.modal-body
{
    padding:30px;

}
body
{   
    background: linear-gradient(90deg, rgb(233, 233, 236) 18%, rgb(242, 242, 244) 41%, rgb(239, 238, 240) 65%, rgb(241, 241, 245) 87%);

    width:100%;
    justify-content:center;
    align-items: center;   
}
</style>
</head>
<body>


<?php
echo'
<div class="box">
    <div class="modal-body">
        <p><i class="fa fa-question-circle"></i> Are you sure you want to log-off? <br /></p>
        <div class="actionsBtns">
            <form method="POST">
                <input type="submit" class="btn btn-default btn-primary" data-dismiss="modal" name="submit" value="Logout" />
                <button class="btn btn-default" data-dismiss="modal" name="cancel">Cancel</button>
            </form>
         
        </div>
    </div>
</div>
';

session_start();

if(isset($_POST["cancel"])) {
    header("Location:Home.php");
}

if(isset($_POST["submit"])) {
    if(isset($_SESSION['admin'])) {
        unset($_SESSION['admin']);
        session_destroy();
        header("Location:Login.html");
    }
}
?>
</body>
</html>