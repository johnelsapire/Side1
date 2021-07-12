<?php
session_start();
include 'cdn.php';
if(isset($_SESSION['id'])) {
    ?>
    <script>
        window.location.href="home.php";
    </script>
   <?php
}
else {
    

?>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<body>
    
   
    <div class='row'>
        <div class='col-sm-8'>
            <div class='content'>
                <h2>Welcome.</h2>
                <h4>Sign in to continue!</h4><br><br>
                <br>
                <div id='err'><br>
                invalid login details!
                </div>
                <form name='login' method='post'action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'>
                 <br>   <label for='email'>Email</label><input type='email' name='email'><br>
                <label for='pass'>password</label><br><input type='password' name='pass'>
                <br><br><span id='f'><a>Forgotten password?</a></span>
                <br><br>
                <input type='submit' value='Sign in'id='submit'>
                
            </div>
            <br><br>
            <j>Already a user<span id='f'><a href='webwalletlogin.php'>Sign up</a></span></j>
            </form>
        </div>
    </div>
    <br><br><br>
</body>
<script>
    $('#err').hide();
</script>
<?php
if($_SERVER['REQUEST_METHOD']=='POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['pass']);
    
    $check = $conn->query("select * from user_details where email='$email' and password='$password'");
    if($check->num_rows>0) {
        while($row=$check->fetch_assoc()) {
          $_SESSION['id']=$row['id'];
          if(isset($_SESSION['id'])) {
             ?>
             <script>
                 window.location.href='home.php';
             </script>
             <?php
          }
        }
    }
    else {
        $err_msg='invalid email/password';
       ?>
       <script>
           $('#err').show();
       </script>
       <?php
    }
}
else {
   # echo 'null response';
}
?>
<style>
@media screen and (min-width:450px){
    form {
        border:1px solid blue;
        display:block;
        margin:auto;
        width:50%;
        background:white;
        padding:4%;
        border-radius:7px;
    }
    j {
      
        color:rgb(2,30,100);
    }
    input {
        padding:1%;
        margin-top:5%;
        
    }
    body {
        background:rgb(2,30,100);
    }
    h2 {
        color:white;
    }
    h4 {
        color:white;
        font-weight:bolder;
    }
}
#err {
    width:85%;
    padding:3%;
    text-align:center;
    color:white;
    background:red;
    border-radius:4px;
}
#submit {
    color:white;
    border:hidden;
    background:rgb(2,30,100);
    width:93.5%;
}
a {
    text-decoration:none;
    color:cornflowerblue;
}
#f {
    float: right;
    font-size:75%;
    margin-right:5%;
}
label {
    
    display:relative;
    background:#fff;
    font-size:70%;
}
input{
    border:hidden;
    border:1px solid #ccc;
    padding:4%;
    border-radius:4px;
    width:85%;
    margin-top:2%;
}
input:focus {
    
}
    .row {
        font-family:'Roboto',sans-serif;
        margin-top:17%;
        margin-left:5%;
        
    }
    h2 {
        font-weight:bolder;
    }
    h4 {
        font-family:'Roboto',sans-serif;
        color:grey;
        letter-spacing:0.5px;
        font-weight:lighter;
    }
</style>
<?php
}
?>
