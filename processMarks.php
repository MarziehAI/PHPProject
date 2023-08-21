<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks</title>
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
        <h1>Calculation of your marks</h1>
        <?php
        // Marzieh khalili chachaki, 20/04/2023, Mark Process Program
        $marks = [];
        $total = 0;

        if (!empty($_POST["mark1"]) && is_numeric($_POST["mark1"]) && $_POST["mark1"] >= 1 && $_POST["mark1"] <= 100) {
            $marks[] = (int)$_POST["mark1"];
        } else {
            echo "<p>Please enter a valid mark for mark 1</p>";
        }

        if (!empty($_POST["mark2"]) && is_numeric($_POST["mark2"]) && $_POST["mark2"] >= 1 && $_POST["mark2"] <= 100) {
            $marks[] = (int)$_POST["mark2"];
        } else {
            echo "<p>Please enter a valid mark for mark 2</p>";
        }

        if (!empty($_POST["mark3"]) && is_numeric($_POST["mark3"]) && $_POST["mark3"] >= 1 && $_POST["mark3"] <= 100) {
            $marks[] = (int)$_POST["mark3"];
        } else {
            echo "<p>Please enter a valid mark for mark 3</p>";
        }

        if (!empty($_POST["mark4"]) && is_numeric($_POST["mark4"]) && $_POST["mark4"] >= 1 && $_POST["mark4"] <= 100) {
            $marks[] = (int)$_POST["mark4"];
        } else {
            echo "<p>Please enter a valid mark for mark 4</p>";
        }

        if (!empty($_POST["mark5"]) && is_numeric($_POST["mark5"]) && $_POST["mark5"] >= 1 && $_POST["mark5"] <= 100) {
            $marks[] = (int)$_POST["mark5"];
        } else {
            echo "<p>Please enter a valid mark for mark 5</p>";
        }

        // Check if any valid marks were entered
        if (count($marks) > 0) {
            $total = array_sum($marks);
            $average = $total / count($marks);

            // Display sum and average
            echo "<p>The sum of your valid marks is: $total</p>";
            echo "<p>The average of your valid marks is: $average</p>";
        } else {
            echo "<p>No valid marks were entered.</p>";
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