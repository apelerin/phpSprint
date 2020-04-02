<?php


class autoForm
{
    public static function formBasic($for){
        echo '<label for="' . $for . '"> ' . $for . ': </label>';
        echo '<input type="text" name="' . $for . '">';
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