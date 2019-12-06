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
    //require_once('cart.php');
    
    
    session_set_cookie_params(3600);
    session_start();

    if(!isset($_SESSION['username'])) {
     $_SESSION['username'] = "";   
    }
    
    if (empty($_SESSION['cart'])) { 
        $_SESSION['cart'] = array();
    }
    
    $products = array();
    $products['MMS-1754'] = array('name' => 'Flute', 'cost' => '149.50');
    $products['MMS-6289'] = array('name' => 'Trumpet', 'cost' => '199.50');
    $products['MMS-3408'] = array('name' => 'Clarinet', 'cost' => '299.50');
    
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
            $message = "";
            $title = filter_input(INPUT_POST, "title");
            $description = filter_input(INPUT_POST, "description");
            $price = intval(filter_input(INPUT_POST, "price"));
            $message .= Validation::isNotEmpty($title, "title");
            $message .= Validation::isNotEmpty($description, "description");
            $message .= Validation::isNotEmpty($price, "price");
            $message .= Validation::validLength($title, "title");
            $message .= Validation::validInt($price, "price");
            

            
            if ($message == "") {
                BagDA::create_bag($title, $description, $price);
                BagDA::insertImage('assets/default_image.jpg', $title);
                $bags = BagDA::get_all_bags();
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
                $validUsername = userDA::isUserAvailable($username);
                $validPassword = userDA::validPassword($username, $password);

            if ($validUsername || !$validPassword) {
                $message .= "Couldn't login with the supplied credentials" . "\n";
            }           

            if ($message == "") {
                // Should display session username on displayProfile.php page
                $user = UserDA::get_user($username);
                
                
                $_SESSION['username'] = $username;
                header('Location: index.php?action=display_all_bags');                                       
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
            $message .= Validation::validLength($userName, "userName");
            $message .= Validation::validLength($firstName, "firstName");
            $message .= Validation::validLength($lastName, "lastName");
            $message .= Validation::validLength($email, "email");
            $message .= Validation::validLength($password, "password");
            
            $pwHash = Validation::passwordValidation($password);
            
            if($pwHash === false) {
                $message .= "Password requires a digit, special character, an uppercase letter, and must be 10+ characters long" . "\n";
            }
            
            if ($message == "") {
                UserDA::create_user($userName, $firstName, $lastName, $email, $pwHash);
                
                include('view/displayUserLogin.php');
            } else {
                include('view/displayCreateUser.php');
            }
            break;
            
        case 'edit_bag':
            
            if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) { //Default picture gets added if no pictures are in isset($_FILES['image']) Line 223
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $temp = $_FILES['image']['name'];
            $temp = explode('.', $temp);
            $temp = end($temp);
            $file_ext = strtolower($temp);

            $extensions = array("jpeg", "jpg", "png", "gif");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "file extension not in whitelist: " . join(',', $extensions);
            }

                if (empty($errors) == true) {
                    $count = 0;
                    $temp_file_name = $file_name;
                    while (true) {
                        if ($temp_file_name != "default_image.jpg" && BagDA::isUniqueImageName('assets/' . $temp_file_name)) {
                            break;
                        } else {
                            $count++;
                            $temp_file_name = Validation::getUniqueFileName($file_name, $count, $file_ext);
                        }
                    }
                    $path = 'assets/' . $temp_file_name;
                    move_uploaded_file($file_tmp, $path);
                } else {
                    $message = "Image upload failed";
                    include('view/displayCreateUser.php'); //This is where the var dump happened, changing to add image errors to message (in progress)
                }
            }
            break;
            
    }
    
?>
