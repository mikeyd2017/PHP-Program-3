<?php
    require_once('model/Bag.php');
    require_once('model/LineItem.php');
    require_once('model/LineItemDA.php');
    require_once('model/Purchase.php');
    require_once('model/User.php');
    require_once('model/bagDA.php');
    require_once('model/database.php');
    require_once('model/purchaseDA.php');
    require_once('model/userDA.php');
    require_once('model/validation.php');
    //require_once('cart.php');
    
    
    session_set_cookie_params(3600);
    session_start();

    if(!isset($_SESSION['userName'])) {
     $_SESSION['userName'] = "";   
    }
    $action = filter_input(INPUT_POST, 'action');
    
    if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'display_create_bag';
    }
}  
if($_SESSION["userName"] != "") {
    $user = UserDA::get_user($_SESSION["userName"]);
}

$lineItems = LineItemDA::get_all_lineItems($_SESSION["userName"]);

    switch($action) {
        case 'display_create_bag':
            include('view/displayCreateBag.php');
            break;
                
        case 'create_bag':
            $message = "";
            $title = filter_input(INPUT_POST, "title");
            $description = filter_input(INPUT_POST, "description");
            $price = filter_input(INPUT_POST, "price");
            $message .= Validation::isNotEmpty($title, "title");
            $message .= Validation::isNotEmpty($description, "description");
            $message .= Validation::isNotEmpty($price, "price");
            $message .= Validation::validInt($price, "price");
            $message .= Validation::noSpaces($title, "title");
            
            if(!BagDA::isTitleAvailable($title)) {
                $message .= "Bag Title is already being used" . "\n";
            }
            
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
                
                
                $_SESSION['userName'] = $username;
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
            
        if(!UserDA::isEmailAvailable($email)) {
            $message .= "Email is taken" . "\n";
        }
        
        if(!UserDA::isUserAvailable($userName)) {
            $message .= "Username is taken" . "\n";
        }

            if ($message == "") {
                UserDA::create_user($userName, $firstName, $lastName, $email, $pwHash);
                /*
                $to_email = 'hamiltonemailadmin@localhost.com';
                $subject = 'Thanks for registering!';
                $message = 'Hello '. $firstName . ' ' . $lastName . "Thanks for registering for Hamilton Road";
                $headers = 'From: noreply@hamiltonroad.com';
                mail($to_email,$subject,$message,$headers);
                 */
                include('view/displayUserLogin.php');
            } else {
                include('view/displayCreateUser.php');
            }
            break;
        case 'add_bag_to_cart':
            $bagTitle = filter_input(INPUT_POST, "bagTitle");
            $bags = BagDA::get_all_bags();
            $user = UserDA::get_user($_SESSION["userName"]);

            $quantity = filter_input(INPUT_POST, "itemqty");
            $bag = BagDA::get_bag($bagTitle);
            $price = $quantity * $bag["Price"];
            LineItemDA::create_line_item($_SESSION["userName"], $bagTitle, $quantity, $price);
            $lineItems = LineItemDA::get_all_lineItems($_SESSION["userName"]);
            include('view/displayAllBags.php');
            break;
        
        case 'checkout_items':
            $total = filter_input(INPUT_POST, "cartTotal");
            $date = date("Y/m/d");
            $purchaseID = rand(500, 10000);
            PurchaseDA::create_purchase($purchaseID, $_SESSION["userName"], $total, $date);
            LineItemDA::delete_all_lineItems($_SESSION["userName"]);
            $purchases = PurchaseDA::get_purchases($_SESSION["userName"]);
            include('view/displayPurchases.php');
            break;
        case 'delete_all_lineitems':
            lineItemDA::delete_all_lineItems($_SESSION["userName"]);
            $bags = BagDA::get_all_bags();
            include('view/displayAllBags.php');
            break;
        case 'delete_lineitem':
            $lineItemID = filter_input(INPUT_POST, "lineItemID");
            lineItemDA::delete_lineItem($lineItemID);
            $bags = BagDA::get_all_bags();
            include('view/displayAllBags.php');
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
