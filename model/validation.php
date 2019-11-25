<?php

class Validation {

    public static function isNotEmpty($arg, $label) {
        if ($arg === null || $arg === "") {
            return $label . ' must not be empty' . "\n";
        } else {
            return "";
        }
    }

    public static function validInt($arg, $label) {
        $filtArg = filter_var($arg, FILTER_VALIDATE_INT);
        if ($filtArg === null || $filtArg === false) {
            return $label . ' must a valid integer' . "\n";
        } else {
            return "";
        }
    }
    
    //validate username, firstname, lastname (must start with a letter)
    public function startsWith($arg, $label) {
       if(!preg_match('/^\s*[a-z,A-Z]/', trim($arg))) {
           return $label . ' must start with a letter' . "\n";
       } else {
           return "";
       }
    }
    
    public function validUsername($arg, $label) {
       if(!preg_match('/^[a-zA-Z][a-zA-Z0-9]{3,29}$/', trim($arg))) {
           return $label . ' must be only letters and numbers between 4 and 30 long' . "\n";
       } else {
           return "";
       }
    }
    
    //validate username, firstname, lastname (4-30 chars)
    public function validLength($arg, $label) {
        if(!(strlen($arg) >= 4 && strlen($arg) <= 30)) {
            return $label . ' must be between 4 and 30 characters long' . "\n";
        } else {
            return "";
        }
    }
    
    //validate password
    public function PasswordValidation($arg) {
        
        //requires a digit, special character, an uppercase letter, and must be 10+ characters long
        //regex is custom with help from the book/tested on regex101 website
        $pwPattern = "/(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[a-zA-Z]).*[[:print:]]{10,}/";
        
        if (preg_match($pwPattern, $arg)) {
            if (password_hash($arg, PASSWORD_BCRYPT) !== false) {
                $pwHash = password_hash($arg, PASSWORD_BCRYPT);
                return $pwHash;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function getUniqueFileName($file_name, $count, $file_ext) {
        $new_file_name = strtok($file_name, ".");
        $new_file_name .= "(" . $count . ")" . "." . $file_ext;
        return $new_file_name;
    }

}
