<?php
    ini_set('display_errors', 1);
    require 'class/AutoForm.php';
    require 'class/NBpremier.php';
    require 'class/utilitaries.php';
    require 'class/request.php';
    require 'class/binaire.php';
    require 'class/regex.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>La poste</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
include "pages/header.php";
?>

<div id="menu-content">
    <div id="m-0">
        <div id="story-1">
            <h3>Membres de l'équipe :</h3>
            <ul>
                <li>Axel</li>
                <li>Eliott</li>
                <li>Mathieu</li>
            </ul>
            <br>
            <h3>Nombre de stories terminés (<?php
                count(utilitaries::$storiesDone);
                ?> /
                <?php
                count(utilitaries::$storiesToDo);
                ?>) :</h3>
            <br>
            <h3>Liste des users stories:</h3>
            <?php
            utilitaries::displayListStories();
            ?>
        </div>
    </div>
    <div id="m-1">
        <form action="" method="post">
            <?php
            autoForm::formBasic('name');
            autoForm::formBasic('age');
            autoForm::formBasic('size');
            ?>
            <input type="submit" value="Enregistrer">
            <?php
            ?>
        </form>
        <form action="" method="post">
            <select>
                <?php
                autoForm::formDropDown(autoForm::getInput());
                ?>
                <input type="submit" value="Enregistrer">
            </select>
        </form>
        <form action="" method="post">
            <?php
            autoForm::formTextArea("a name", "a label");
            ?>
            <input type="submit" value="Enregistrer">
        </form>
        <form action="" method="post">
            <?php
            autoForm::formPassword("a password", "submit psw", 5);
            ?>
            <input type="submit" value="Enregistrer">
        </form>
        <form action="" method="post">
            <?php
            autoForm::formRadio(["some", "option", "no"]);
            ?>
            <input type="submit" value="Enregistrer">
        </form>
        <?php
        var_dump(autoForm::getInput());
        ?>
    </div>
    <div id="m-2">
        <div id="story3">
            <form action="" method="post">
                <?php
                autoForm::formBasic("limite");
                ?>
                <input type="submit" value="ok">
            <?php
            if (!empty(autoForm::getInput()['limite']))
                affichePremiers(autoForm::getInput()['limite']);
            ?>
        </form>
        </div>
        <div id="story-5">
            <form action="" method="post">
                <?php
                autoForm::formBasic("1stnumber");
                autoForm::formBasic("2ndnumber");
                autoForm::formBasic("3rdnumber");
                ?>
                <input type="submit" value="Submit">
            </form>
            <?php
            $numbers = autoForm::getInput();
            // Check if we got the datas
            if (!empty($numbers['1stnumber'])) {
                $smallest = utilitaries::getSmallestNbr($numbers['1stnumber'], $numbers['2ndnumber'], $numbers['3rdnumber']);
                echo 'Result: ' . $smallest;
            }
            ?>
            </div>
   
            <div id="story-9">
                <form action="" method="post">
                <?php
                autoForm::formBasic("votre nombre");
                ?>
                <input type="submit" value="ok">
            </form>
            <?php 
            if (!empty(autoForm::getInput()['votre_nombre']))
                getBinaire($_POST['votre_nombre']);
            
            

            ?>
        

        </div>
        <div id="story-10">
            <form action="" method="post">
                <?php
                autoForm::formBasic("addresse_mail");
                ?>
                <input type="submit" value="envoyé">
            </form>
            <?php 
            if (!empty(autoForm::getInput()['addresse_mail']))
                getRegex(autoForm::getInput()['addresse_mail']);
            
            

            ?>
        

            

        </div>

     </div>


        <div id="story4">
            <form action="" method="post">
                <?php
                autoForm::formBasic("secondes");
                ?>
                <input type="submit" value="Submit">
            </form>
            <?php
            if (!empty(autoForm::getInput()['secondes'])) {
                $past_date = utilitaries::getDateFromSeconds(autoForm::getInput()['secondes']);
                echo $past_date;
            }
            ?>
        </div>
        <div id="story8">
            <form action="" method="post">
                <?php
                autoForm::formBasic("decimal");
                ?>
                <input type="submit" value="Submit decimal">
            </form>
            <?php
            if (!empty(autoForm::getInput()['decimal'])) {
                $hexa = utilitaries::convertDecToHexa(autoForm::getInput()['decimal']);
                echo $hexa;
            }
            ?>
        </div>
    </div>


    <div id="m-3">
        <?php
        $dbUser = 'root';
        $dbPass = 'root';
        $dbName = 'phpposte';
        $dbType = 'mysql';
        $dbAddress = 'localhost';
        $db = new request($dbUser, $dbPass, $dbName, $dbType, $dbAddress);
        ?>

        <div id="story12">
            <form action="" method ="post">
                <?php
                autoForm::formBasic("first_name");
                autoForm::formBasic("last_name");
                autoForm::formBasic("birthday");
                autoForm::formBasic("gender");
                autoForm::formBasic("mail");
                autoForm::formBasic("zip_code");
                ?>
                <input type="submit" value="Submit him">
            </form>
            <?php
            $result = autoForm::getInput();
            $arr = [$result['first_name'], $result['last_name'], $result['birthday'], $result['gender'], $result['mail'], $result['zip_code']];
            $db->insertInTable("users", $arr);
            ?>
        </div>
        <div id="story13">
            <?php
            $db->displayTabUsers();
            ?>
        </div>
    </div>
    <div id="m-4">
    </div>
</div>

<?php
include "pages/footer.php";
?>

</body>
</html>

<script>
    function hideMyModal(id) {
        var menus = document.getElementById("menu-content").getElementsByTagName("div");
        for (item of menus) {
            item.style.display = "none";
        }
        var node = document.getElementById(id);
        node.style.display = "block";
        var all = node.getElementsByTagName('*');
        for (var i = -1, l = all.length; ++i < l;) {
            all[i].style.display = "block";
        }
    }
</script>
