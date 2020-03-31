<?php

/**
<?php
$tyty = new tyrex(30, 50, 34, "Tyry", "F", 2, 32);
$pterody = new pterodactyle(30, 40, 34, "Ptro", "F", 15);
while (true) {
$pterody->wingCut($tyty);
echo $pterody->getName() . "attack for " . $pterody->getDamage() . " damages" . "<br>";
if (checkWin($pterody, $tyty)) {
break;
}
echo $tyty->getLife() . " remaining for " . $tyty->getName() . "<br>";
$tyty->bite($pterody);
echo $tyty->getName() . "attack for " . $tyty->getDamage() . " damages" . "<br>";
if (checkWin($tyty, $pterody)) {
break;
}
echo $pterody->getLife() . " remaining for " . $pterody->getName() . "<br>";
}
$ty1 = new tyrex(30, 140, 34, "T1", "F", 2, 32);
$ty2 = new tyrex(30, 40, 34, "T2", "F", 2, 32);
while (true) {
$ty1->bite($ty2);
echo $ty1->getName() . "attack for " . $ty1->getDamage() . " damages" . "<br>";
if (checkWin($ty1, $ty2)) {
break;
}
echo $ty2->getLife() . " remaining for " . $ty2->getName() . "<br>";
$ty2->bite($ty1);
echo $ty2->getName() . "attack for " . $ty2->getDamage() . " damages" . "<br>";
if (checkWin($ty2, $ty1)) {
break;
}
echo $ty1->getLife() . " remaining for " . $ty1->getName() . "<br>";
}
function checkWin(Dinosaure $attacker, Dinosaure $defender) {
if ($defender->getLife() <= 0) {
echo $attacker->getName() . " won. <br><br>";
return true;
}
return false;
}
?>
 */

class dinosaure {
    private $_length;
    private $_life;
    private $_damage;
    private $_type;
    private $_name;
    private $_gender;

    /**
     * Méthode constructeur de la classe mère Dinosaure
     * Attend en entrée 6 arguments
     * @$damage => représente les dégats que peut réaliser un dinosaure en une attaque // Float
     * @$length => représente la taille du dinosaure // Int
     * @$name => représente le nom du Dinosaure //String
     * @$type => représente le régime alimentaire du dinosaure //String
     * @$gender => représente le sexe du dinosaure
     * @$gender => représente le sexe du dinosaure
     *
     */
    public function __construct($length, $life, $damage, $type, $name, $gender){

        $this->_length = $length;
        $this->_life = $life;
        $this->_damage = $damage;
        $this->_type = $type;
        $this->_name = $name;
        $this->_gender = $gender;
    }

// Ascesseurs GET
    public function getName(){
        return $this->_name;
    }

    public function getLife(){
        return $this->_life;
    }

    public function getGender(){
        return $this->_gender;
    }

    public function getDamage(){
        return $this->_damage;
    }

    public function getType(){
        return $this->_type;
    }

    public function getLength(){
        return $this->_length;
    }

// Ascesseurs Set
    public function setLife($value){
        $this->_life = $value;
    }

    public function setDamage($damage)
    {
        $this->_damage = $damage;
    }
}

class tyrex extends dinosaure {

    private $_sizeArms;
    private $_nbrArms;

    public function __construct($length, $life, $damage, $name, $gender, $nbrArms, $sizeArms)
    {
        parent::__construct($length, $life, $damage, "sol", $name, $gender);
        $this->_nbrArms = $nbrArms;
        $this->_sizeArms = $sizeArms;
    }

    public function getNbrArms(){
        return $this->_nbrArms;
    }

    public function getSizeArms(){
        return $this->_sizeArms;
    }

    public function bite(Dinosaure $foe) {
        $foe->setLife($foe->getLife() - $this->getDamage());
    }
}

class pterodactyle extends dinosaure {
    private $_sizeWings;
    private $_nbrWings = 2;

    public function __construct($length, $life, $damage, $name, $gender, $sizeWings){
        parent::__construct($length, $life, $damage, "vol", $name, $gender);
        $this->_sizeWings = $sizeWings;
    }
    public function getNbrWings(){
        return $this->_nbrWings;
    }
    public function getSizeArms(){
        return $this->_sizeWings;
    }

    public function makeTornado($dualType){
        if ($dualType==true){
            $this->setDamage($this->getDamage() + 15);
        }
    }

    public function wingCut(Dinosaure $foe) {
        $foe->setLife($foe->getLife() - $this->getDamage());
    }
}

?>