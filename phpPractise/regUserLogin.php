
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - TalentForge.UI</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "sans-serif";
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: seagreen;
        }

        .wrapper{
            width: 420px;
            background: purple;
            color: #fff;
            font-family: "sans-serif";
        }

        .wrapper h1{
            font-size: 36px;
            text-align: center;
        }

        .wrapper .input-box{
            position: relative;
            width: 100%;
            height: 50px;
            margin: 30px 0;
            
        }

        .input-box input{
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255,255,255, .2)
            border-radius: 40px;
        }

        .input-box input::placeholder{
            color: #fff;
        }

        .input-box i{
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translate(-50%);
            font-size: 20px;
        }


    </style>
<body>
    <div class="wrapper">
        <form action="">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="hyperLink">
                <a href="TalentForgeHomePage.php">Home</a>
                <a href="LoginPage.php">Login</a>
		        <a href="#Privacy">Privacy</a>
            </div>
            <button type="submit" class="btn">Login</button>    
        </form>
    </div>
</body>




</html>