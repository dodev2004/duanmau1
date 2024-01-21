
<?php 
    require("./view/user/asite.php");
    if(isset($_GET["page"])){
        $act = $_GET["page"];
        switch ($act) {
            case 'matkhau':
                $eror = "";
                if(isset($_POST["submit"])){
                    $old_password = $_POST["old_password"];
                    $new_password = $_POST["password"];
                    $r_password = $_POST["r_password"];
                    if(trim($old_password) == $_SESSION["user"]["password"]){
                        $eror= "";
                        echo "<script language=javascript>alert('Thay đổi thành công')</script>";
                        db_user_change_password($_SESSION["user"]["id"],$new_password);

                    }
                    else {
                        $eror= "Mật khẩu cũ không đúng";
                    }
                }
                require("./view/user/matkhau.php");
                break;
            default:
            
                require("./view/user/thongtin.php");
                break;
        }
    }
    else {
        if(isset($_POST["save"])){
            $name = $_POST["name"];
            $user = $_POST["username"];
           
            $phone = !empty($_POST["tel"])? $_POST["tel"]:"";
            $email = !empty( $_POST["email"])?  $_POST["email"] :"";
            $address = !empty($_POST["address"]) ?$_POST["address"]:"";
            db_user_update($_SESSION["user"]["id"], $user,$name,$email,$address,$phone);
             $users =  db_user_select_by_id($_SESSION["user"]["id"]);
            $_SESSION["user"] = $users;   
        }
        require("./view/user/thongtin.php");
        
    }
?>