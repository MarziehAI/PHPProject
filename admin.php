<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelos Enterprises</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <header>
        <div id="headerContent">
            
            <nav>
                <ul>
                    <li class="menu">
                        <a href="index.php">
                            <img src="images/GE-icon.png" alt="Gelos Enterprises" width="47" height="55">
                        </a>
                    </li>
                    <li class="menu"><a href="login.php">LOGIN</a></li>
                    <li class="menu"><a href="register.php">REGISTER</a></li>
                    <li class="menu"><a href="marks.php">MARKS</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="banner">
        <img src="images/GE-stacked-logo-reverse.png" alt="" width="200" height="106">
    </section>
    <main>
        <h1>Admin</h1>
        <?php
            //Marzieh khalili chachaki, 20/04/2023, Login Program
            //IF user logs in check if empty
            if(isset($_POST["login"]))
            {
                if(empty($_POST["username"]) && empty($_POST["password"]))
                {
                    echo "<p>Please enter a username and password</p>";
                }
                //If not empty open accounts file
                elseif(!empty($_POST["username"]) or !empty($_POST["password"]))
                {                                               
                    $fileName = "accounts.txt";
                    //Check file exists

                    if(file_exists($fileName)== true)
                    {
                        $fileArray = file($fileName);
                        //loop through each line to check if username and password in file
                        $loginSuccess = false;
                        foreach($fileArray as $login)
                        {
                            $loginArray = explode(" ", $login);
                            //Check username and password match

                            if(trim($loginArray[0]) == trim($_POST["username"]) && trim($loginArray[1]) == trim($_POST["password"]))
                            {
                                $loginSuccess = true; 
                            }                       
                        }
                        //If it matches, display all accounts from accounts.txt file
                      if($loginSuccess == true)
                        {
                            $accountArray = file("accounts.txt");
                            foreach($accountArray as $line)
                            {
                                echo "<p>$line</p>";
                            }

                        }
                    //Doesn't match display error message "Invalid username or password
                    else
                        {
                            echo "Invalid username or password. Please try again.";
                        }                     
                    }
                }
            }   
        ?>
    </main>
    <footer>
        <p>Contact us</p>
        <p>A: 111 Business Avenue, TULITZA NSW 9460<br>
        P: 02 0000 0000<br>
        E: contactus@gelosmail.com.au</p>
    
        <p>Gelos Enterprises would like to pay our respect and acknowledge Aboriginal and Torres Strait Islander Peoples as the Traditional Custodians of the land, rivers and sea. We acknowledge and pay our respect to the Elders, both past and present of all Nations.</p>				
        <p>This site has been developed by TAFE NSW &copy TAFE NSW <?php echo date("Y") ?></p>
        <p >Please note this is a fictitious organisation and has been created purely for educational purposes only.</p>
    </footer>

</body>
</html>