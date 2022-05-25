
<!DOCTYPE html>
<html>
	<head>
		<?php include('header.php') ?>
        <?php 
        session_start();
        if(isset($_SESSION['login_id'])){
            header('Location:home.php');
        }
        ?>
		<title>Admin | Simple Online Quiz System</title>
        <link rel="stylesheet" href="./assets/css/styleNew.css">
	</head>

	<body id='login-body' class="bg-light">


    <!-- <div class="container" id="new">
        <div class="left">
        <p>Welcome to Quizeme</p>
        </div> -->
        <!-- <div class="right"> -->
        <div class="card col-md-6 offset-md-3 text-center bg-primary mb-4" style="background:color:red">
             <h1 class="he3-responsive text-white name" >
           Welcome to QuizeMe
             <!--
             <span>|</span>
             <span>| </span>
             <span>ॐ</span>
             <span></span>
             <span>ग</span>
             <span>णे</span>
             <span>शा</span>
             <span>य</span>
             <span></span>
             <span>न</span>
             <span>मः</span>
             <span></span>
             <span>|</span>
             <span></span>
             
             <br><br> -->
            
        
            </h1>
        </div>
		<div class="card col-md-4 offset-md-4 mt-4">
                <div class="card-header-edge text-white">
                    <strong>Login</strong>
                </div>
            <div class="card-body card-new">
                     <form id="login-frm">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="username" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                        <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div> 
                        <div class="form-group text-right">
                            <button class="btn btn-primary btn-block" name="submit">Login</button>
                        </div>
                        
                    </form>
            </div>
        </div>
            
        <!-- </div> -->
    </div>


       

		</body>

        <script>
            $(document).ready(function(){
                $('#login-frm').submit(function(e){
                    e.preventDefault()
                    $('#login-frm button').attr('disable',true)
                    $('#login-frm button').html('Please wait...')

                    $.ajax({
                        url:'./login_auth.php?type=1',
                        method:'POST',
                        data:$(this).serialize(),
                        error:err=>{
                            console.log(err)
                            alert('An error occured');
                            $('#login-frm button').removeAttr('disable')
                            $('#login-frm button').html('Login')
                        },
                        success:function(resp){
                            if(resp == 1){
                                location.replace('home.php')
                            }else{
                                alert("Incorrect username or password.")
                                $('#login-frm button').removeAttr('disable')
                                $('#login-frm button').html('Login')
                            }
                        }
                    })

                })
            })
        </script>
</html>