<?php
    ini_set('display_errors', 1);
    require 'class/AutoForm.php';
    require 'class/NBpremier.php';
    require 'class/utilitaries.php';
    require 'class/request.php';
    require 'class/binaire.php';
    require 'class/regex_mail.php';
    require 'class/regex_birth.php';
    require 'class/factorielle.php';
    require 'class/Lnom.php';
    require 'class/chiffreRomain.php';
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
            <h3>Nombre de stories terminés (12/ 16)</h3>
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
                    <?php
                    /**
                    * this function is use to show all of First number until the user number  
                     **/
                    ?>

        <div id="story3">
            <h3>Story 3: nombres premiers</h3>
            <p>Entrez un nombre</p>
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
        <div id="story4">
            <h3>Story 4: Date minus secondes</h3>
            <p>Entrez un nombre de secondes à déduire de la date actuelle:</p>
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
        <div id="story-5">
            <h3>Story 5: Plus petit nombre</h3>
            <p>Entrez trois nombres:</p>
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

        <div id="story-6">
            <h3>Story 6: Chiffre romain</h3>
            <form action="" method="post">
                <?php
                autoForm::formBasic("votre nombre");
                ?>
                <input type="submit" value="ok">
            </form>
            <?php
            if (!empty(autoForm::getInput()['votre_nombre']))
                getCR(autoForm::getInput()['votre_nombre']);
            ?>
        </div>

        <div id="story-7">
            <h3>Story 7: Factorielle</h3>
            <p>Entrez un nomnbre:</p>
            <form action="" method="post">
                <?php
                autoForm::formBasic("votre_factorielle");
                ?>
                <input type="submit" value="ok">
            </form>
            <?php 
            if (!empty(autoForm::getInput()['votre_factorielle']))
                getFactorielle(autoForm::getInput()['votre_factorielle']);
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
        <div id="story-9">
            <h3>Story 9: Conversion binaire</h3>
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
            <h3>Story 10: Check mail</h3>
            <form action="" method="post">
                <?php
                autoForm::formBasic("addresse_mail");
                ?>
                <input type="submit" value="envoyé">
            </form>
            <?php 
            if (!empty(autoForm::getInput()['addresse_mail'])) {
                getRegex(autoForm::getInput()['addresse_mail']);
            }
            ?>
            <h3>Story 10: Check date</h3>
            <form action="" method="post">
                <?php
                autoForm::formBasic("Date");
                ?>
                <input type="submit" value="envoyer">
            </form>
            <?php
            if (!empty(autoForm::getInput()['Date'])) {
                getRegexBirth(autoForm::getInput()['Date']);
            }
            ?>
        </div>
        <div id="story-11">
            <h3>Story 11: Liste de noms triée par ordre alphabétique WIP.</h3>
            <form action="" method="post">
                <?php
                autoForm::formTextArea("name_list","Liste de noms séparés par une virgule.");
                ?>
                <input type="submit" value="envoyé">
            </form>
            <?php 
            if (!empty(autoForm::getInput()['name_list'])) {
                getLName(autoForm::getInput()['name_list']);
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
            <h3>Story 12: Formulaire et insertion en base d'un user</h3>
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
            if(!empty($result['first_name'])) {
                $arr = [$result['first_name'], $result['last_name'], $result['birthday'], $result['gender'], $result['mail'], $result['zip_code']];
                $db->insertInTable("users", $arr);
            }
            ?>
        </div>
        <div id="story13">
            <h3>Story 13: Display tous les users en table dans un tableau</h3>
            <?php
            $db->displayTabUsers();
            ?>
        </div>
        <div id="story14">
            <h3>Story 14: Choix d'un user dans un dropdown tapant en base et pré remplissage d'un formulaire pour update</h3>
            <form action="" method="post">
                <select name ="framboise">
                    <?php
                    $db->fillDropDown();
                    ?>
                </select>
                <input type="submit" value="Get Selected Values">
            </form>
            <?php
            if(!empty(autoForm::getInput()['framboise'])) {
                $value = $db->getUserbyId(autoForm::getInput()['framboise']);
                $value = $value->fetch(PDO::FETCH_ASSOC);
            }

            $default = ['first_name' => '','last_name' => '','birthday' => '','gender' => '','mail' => '','zip_code' => ''];
            ?>
            <form action="" method="post">
                <?php
                if (!empty($value['first_name'])) {
                    autoForm::formAForm($value, 'true');
                }
                else {
                    autoForm::formAForm($default, 'false');
                }
                ?>
                <input type="submit" value="Update">
            </form>
            <?php
            if (!empty(autoForm::getInput()['boolSub']) && autoForm::getInput()['boolSub'] === 'true') {
                $db->updateUser(autoForm::getInput());
            }
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
