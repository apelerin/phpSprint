<?php
    ini_set('display_errors', 1);
    require 'class/AutoForm.php';
    require 'class/NBpremier.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>La poste</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
    <div id="menu">
        <a href="#" onclick="hideMyModal('m-0')">Accueil</a>
        <a href="#" onclick="hideMyModal('m-1')">Exercice</a>
        <a href="#" onclick="hideMyModal('m-2')">Algorithm</a>
        <a href="#" onclick="hideMyModal('m-3')">Database</a>
        <a href="#" onclick="hideMyModal('m-4')">La Poste <img src="images.png" width="20" height="20"></a>
    </div>
</header>

<div id="menu-content">
    <div id="m-0">
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
        <form action="" method="post">
            <?php
            autoForm::formBasic("limite");
            ?>
            <input type="submit" value="ok">
        <?php
        affichePremiers($_POST['limite']);
        ?>
    </div>
    <div id="m-3">
    </div>
    <div id="m-4">
    </div>
</div>

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
