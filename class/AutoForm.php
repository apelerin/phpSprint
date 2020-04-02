<?php


class autoForm
{
    public static function formBasic($for){
        echo '<label for="' . $for . '"> ' . $for . ': </label>';
        echo '<input type="text" name="' . $for . '">';
    }

    public static function formBasicPlus($label, $for, $value){
        echo '<label for="' . $for . '"> ' . $label . ': </label>';
        echo '<input type="text" name="' . $for . '" value="' . $value .'">';
    }

    public static function hiddenForm($name, $for) {
        echo '<input type="hidden" name="' . $name . '" value="'. $for .'">';
    }

    public static function formAForm($value, $boolStr) {
        var_dump($value);
        autoForm::formBasicPlus('Prénom', 'first_name', $value['first_name']);
        autoForm::formBasicPlus('Nom', 'last_name', $value['last_name']);
        autoForm::formBasicPlus('Date d\'anniversaire', 'birthday', $value['birthday']);
        autoForm::formBasicPlus('Genre', 'gender', $value['gender']);
        autoForm::formBasicPlus('Mail', 'mail', $value['mail']);
        autoForm::formBasicPlus('Code Postal', 'zip_code', $value['zip_code']);
        autoForm::hiddenForm('boolSub', $boolStr);
        autoForm::hiddenForm('id', $value['id']);
    }

    public static function formDropDown($arr){
        foreach($arr as $key => $value) {
            echo '<option value="' . $value . '">' . $value . '</option>';
        }
    }

    public static function formOption($opt) {
        echo '<option value="' . $opt['id'] . '">' . $opt['first_name'] . " " . $opt['last_name'] . '</option>';
    }

    public static function formTextArea($name, $label){
        echo '<label for="' . $label . '">' . $name . '</label>';
        echo '<textarea name="' . $name . '"></textarea>';

    }

    public static function formPassword($name, $label, $min){
        echo '<label for="' . $label.'">' . $name . '</label>';
        echo '<input type="password" name="' . $name . '" minlength="' . $min . '" required>';

    }

    public static function formRadio($list) {
        foreach ($list as $el) {
            //need work
            echo '<label for="' . $el . '"> ' . $el . ': </label>';
            echo '<input type="radio" name="' . $el . '">';
        }
    }

    public static function getInput() {
        return $_POST;
    }
}

?>