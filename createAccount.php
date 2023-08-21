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
        <h1>Create account</h1>
        <?php
        // Marzieh khalili chachaki, 20/04/2023, Create Account
        // IF user submits the form
        if (isset($_POST["register"])) {
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);

            $isValid = true; // Track validation status

            // Check if username is empty
            if (empty($username)) {
                echo "<p>Please enter a username.</p>";
                $isValid = false;
            }
            // Check if username is alphanumeric
            elseif (!ctype_alnum($username)) {
                echo "<p>Please enter a valid username. Only alphanumeric characters are allowed.</p>";
                $isValid = false;
            }

            // Check if username already exists
            $file = "accounts.txt";
            if (file_exists($file)) {
                $fileArray = file($file);

                foreach ($fileArray as $user) {
                    $userArray = explode(" ", $user);
                    if (trim($userArray[0]) === $username) {
                        echo "<p>Username already exists. Please choose a different username.</p>";
                        $isValid = false;
                        break;
                    }
                }
            }

            if ($isValid) {
                // Check password field is empty
                if (($isValid) && (empty($password))) {
                    // Generate random password based on default length
                    $passwordLength = 10;
                    $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*";
                    $random = str_shuffle($characters);
                    $password = substr($random, 0, $passwordLength);

                    echo "<p>You have successfully created your account.</p>";
                    echo "<p>This is your randomly generated password: $password</p>";

                    // Add new username and password to the accounts file
                    $fileAppend = fopen("accounts.txt", "a");
                    $inputName = $_POST["username"];
                    fwrite($fileAppend, "\n$inputName $password");
                    fclose($fileAppend);
                } elseif (($isValid) && (!empty($password))) {
                    // Check password length
                    if (strlen($password) < 8 || strlen($password) > 20) {
                        echo "<p>Password must be between 8 and 20 characters.</p>";
                        $isValid = false;
                    } else {
                        // Save the new account details
                        $accountDetails = "$username $password\n";
                        file_put_contents($file, $accountDetails, FILE_APPEND);

                        echo "<p>You have successfully created your account.</p>";
                        echo "<p>This is your provided password: $password</p>";
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
        <p>Please note this is a fictitious organisation and has been created purely for educational purposes only.</p>
    </footer>

</body>

</html>