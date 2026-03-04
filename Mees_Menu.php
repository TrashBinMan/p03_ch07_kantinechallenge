<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="CSS/Stylesheet.css">
</head>

<body>

<div id="navbar">
    <button id="btnAbout" onclick="location.href='Mees_Aboutus.html'">Over Ons</button>
    <button id="btnMenu" onclick="location.href='Mees_Menu.php'">Hoofdpagina</button>
    <button id="btnLogo" onclick="location.href='Mees_Menu.php'"></button>
    <button id="btnLogin" onclick="location.href='inloggen.php'">Login</button>

    <!-- <form>
        <input id="Searchbar" type="text" placeholder="Search...">
    </form> -->
</div>

 <div class="container">
 <?php

        include ("db.php");

        try {
            $stmt = $pdo->query("SELECT ID, naam, plaatje, prijs, groep, allergie, gezond FROM tb_menu_kaart");
            $NumOfMenuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($NumOfMenuItems) > 0) {
                foreach ($NumOfMenuItems as $menuItem) {
                    echo "<div class='GreyBGItem Container'>";
                    echo "<h1 class='ItemNameText'>" . $menuItem['naam'] . "</h1>";
                    echo "<img class='ItemImageStyling2' src='" . $menuItem['plaatje'] . "' alt='" . $menuItem['naam'] . "'><br>";
                    echo "<p class='GenericTextStyling'> Prijs: " . $menuItem['prijs'] . "</p>";
                    echo "<p class='GenericTextStyling'> Allergie: " . $menuItem['allergie'] . "</p>";
                    echo "<p class='GenericTextStyling'> Gezond: " . $menuItem['gezond'] . "</p>
                    </div>";
                }
            } else {
                echo "<div class='ItemContainer'>";
                echo "No menu items found.";
                echo "</div>";
            }

        } catch (Exception $e) {
            die("Connection error: " . $e->getMessage());
        }
        ?>       
</div>
</body>
</html>