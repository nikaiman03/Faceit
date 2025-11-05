<!DOCTYPE html>
<html>
<head>
    <title>Login Account</title>
    	<link rel="icon" type="image/png" href="image/logo.png">

    	<style type="text/css">
    		
    		

    		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    		*{
    			margin: 0;
    			padding: 0;
    			box-sizing: border-box;
    			font-family: 'Poppins', sans-serif;

    		}

    		body{
    			display: flex;
    			justify-content: center;
    			align-items: center;
    			background: #131313;
    			min-height: 100vh;
    		}

    		.box{
    			position: relative;
    			width: 370px;
    			height: 500px;
    			background: black;
    			border-radius: 50px 5px;
    			overflow: hidden;
    		}

    		.box::before{
    			content: '';
    			position: absolute;
    			top: -50%;
    			left: -50%;
    			width: 370px;
    			height: 450px;
    			background: linear-gradient(60deg, transparent,#FE3939,red);
    			transform-origin: bottom right;
    			animation: animate 6s linear infinite;
    		}

    		.box::after{
    			content: '';
    			position: absolute;
    			top: -50%;
    			left: -50%;
    			width: 370px;
    			height: 450px;
    			background: linear-gradient(60deg,transparent,#FE3939,red);
    			transform-origin: bottom right;
    			animation: animate 6s linear infinite;
    			animation-delay: -3s;
    		}

    		@keyframes animate{
    			0%{
    				transform: rotate(0deg);
    			}

    			100%{
    				transform: rotate(360deg);
    			}
    		}

    		form{
    			position: absolute;
    			inset: 4px;
    			border-radius: 50px 5px;
    			background: #DFDFDF;
    			z-index: 10;
    			padding: 30px 30px;
    			display: flex;
    			flex-direction: column;
    		}

    		h2{
    			font-size: 33px;
    			font-weight: 500;
    			text-align: center;
    		}

    		.inputBox{
    			position: relative;
    			width: 300px;
    			margin-top: 35px;
    		}

    		.inputBox input{
    			position: relative;
    			width: 100%;
    			padding: 20px 10px 10px;
    			background: transparent;
    			border: none;
    			outline: none;
    			color: #B4B2B2;
    			font-size: 1em;
    			letter-spacing: 0.05;
    			z-index: 10;
    		}

    		input[type="submit"]{
    			font-size: 20px;
    			border: none;
    			outline: none;
    			background: #FF1616;
    			padding: 5px;
    			margin-top: 40px;
    			border-radius: 90px;
    			font-weight: 600;
    			cursor: pointer;
    			width: 100%;
    		}

    		input[type="submit"]:active{
    			background: linear-gradient(90deg, black, red);
    			opacity: 0.8;
    		}

    		.inputBox span{
    			position: absolute;
    			left: 0;
    			padding: 20px 10px 10px;
    			font-size: 1em;
    			pointer-events: none;
    			letter-spacing: 0.05em;
    			transition: 0.5s;
    		}

    		.inputBox input:valid ~ span, .inputBox input:focus ~ span{
    			color: #E51515;
    			transform: translateX(-10px) translateY(-45px);
    			font-size: 0.87em;
    		}

    		.inputBox i{
    			position: absolute;
    			left: 0;
    			bottom: 0;
    			width: 100%;
    			height: 2px;
    			background: black;
    			border-radius: 4px;
    			transition: 0.5s;
    			pointer-events: none;
    			z-index: 9;
    		}

    		.inputBox input:valid ~ i, .inputBox input:focus ~ i{
    			height: 49px;
    		}

    		img{
    			width: 300px;
    		}

    	</style>
</head>
<body>

	<div class="box">
		<form action="process_login.php" method="POST">
				
				<img src="image/DARKV3.png"><br>
				<h2>Login Account</h2>

				<div class="inputBox">
					<input type="text" name="user_name" required>
					<span>Username</span>
					<i></i>
				</div>

				<div class="inputBox">
        			<input type="password" name="password" required>
        			<span>Password</span>
        			<i></i>
        		</div>

        		<input type="submit" value="Login">

		</form>
	</div>


    <!--<h2>Login</h2>
    <form action="process_login.php" method="POST">
        
    </form>-->
</body>
</html>
