<?php
    require_once('model/Bag.php');
    require_once('model/LineItem.php');
    require_once('model/LineItemDA.php');
    require_once('model/Purchase.php');
    require_once('model/User.php');
    require_once('model/bagDA.php');
    require_once('model/cartDA.php');
    require_once('model/database.php');
    require_once('model/purchaseDA.php');
    require_once('model/userDA.php');
    require_once('model/validation.php');
    
    $action = filter_input(INPUT_POST, 'action');
    
    if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'display_create_bag';
    }
}
    
    switch($action) {
        case 'display_create_bag':
            include('view/displayCreateBag.php');
            break;
                
        case 'create_bag':
            echo 'hello';
            $message = "";
            $title = filter_input(INPUT_POST, "title");
            $description = filter_input(INPUT_POST, "description");
            $price = filter_input(INPUT_POST, "price");
            $message .= Validation::isNotEmpty($title, "title");
            $message .= Validation::isNotEmpty($description, "description");
            $message .= Validation::isNotEmpty($price, "price");
            $message .= Validation::validLength($title, "title");
            $message .= Validation::validLength($description, "description");
            $message .= Validation::validLength($price, "price");
            $message .= Validation::validInt($price, "price");
            BagDA::create_bag($title, $description, $price);
            $bags = BagDA::get_all_bags();
            if ($message == "") {
                include('view/displayAllBags.php');
            } else {
                include('view/displayCreateBag.php');
            }
            break;
        
        case 'display_user_login':
            include('view/displayUserLogin.php');
            break;
        
        case 'display_create_user':
            include('view/displayCreateUser.php');
            break;
        
        case 'login':
            $username = filter_input(INPUT_POST, "username");
            $password = filter_input(INPUT_POST, "password");
            $message = "";
            
            $message .= Validation::isNotEmpty($username, "username");
            $message .= Validation::isNotEmpty($password, "password");
            
            if($message == "" ) {
            //$validUsername = userDA::isUserAvailable($username);
            //$validPassword = userDA::validPassword($username, $password);

            //if (!$validUsername || !$validPassword) {
                //$message .= "Couldn't login with the supplied credentials" . "\n";
            //}           

            if ($message == "") {
                // Should display session username on displayProfile.php page
                //$user = UserDA::getUser($username);
                
                
                //$_SESSION['username'] = $username;
                include('view/displayCreateBag.php');
            } else {
                include('view/displayUserLogin.php');
            }
        } else {
            include('view/displayUserLogin.php');
        }
        break;
            
        case 'display_all_bags':
            $bags = BagDA::get_all_bags();
            include('view/displayAllBags.php');
            break;
        
        case 'create_user':
            echo 'hello';
            $message = "";
            $userName = filter_input(INPUT_POST, "userName");
            $firstName = filter_input(INPUT_POST, "firstName");
            $lastName = filter_input(INPUT_POST, "lastName");
            $email = filter_input(INPUT_POST, "email");
            $password = filter_input(INPUT_POST, "password");
            $message .= Validation::isNotEmpty($userName, "userName");
            $message .= Validation::isNotEmpty($firstName, "firstName");
            $message .= Validation::isNotEmpty($lastName, "lastName");
            $message .= Validation::isNotEmpty($email, "email");
            $message .= Validation::isNotEmpty($password, "password");
            $message .= Validation::PasswordValidation($password, "password");
            $message .= Validation::validLength($userName, "userName");
            $message .= Validation::validLength($firstName, "firstName");
            $message .= Validation::validLength($lastName, "lastName");
            $message .= Validation::validLength($email, "email");
            $message .= Validation::validLength($password, "password");
            UserDA::create_user($userName, $firstName, $lastName, $email, $password);
            if ($message == "") {
                include('view/display_user_login.php');
            } else {
                include('view/displayCreateUser.php');
            }
            break;
            
    }
    
?>
