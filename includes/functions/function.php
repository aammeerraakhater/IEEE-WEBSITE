<?php
require_once "init.php";




function checkUser( $email, $password){
    global $con;
    $stmt=$con->prepare("SELECT * FROM board WHERE email=?");
    $stmt->execute(array( $email));
    $rows=$stmt->fetch(PDO::FETCH_ASSOC);
    $count=$stmt->rowCount();
    if ($count) {
        if($rows['password']==$password){
            $_SESSION['id']=$rows['id'];
            $_SESSION['useranme']=$rows['username'];
            $_SESSION['email']=$rows['email'];
            $_SESSION['phone ']=$rows['phone '];
            $_SESSION['position']=$rows['position'];
            $_SESSION['commity']=$rows['commity'];
            $_SESSION['season']=$rows['season'];
            $_SESSION['img']=$rows['img'];
            $_SESSION['facebook']=$rows['facebook'];
            $_SESSION['linked_in']=$rows['linked_in'];
            $_SESSION['twitter']=$rows['twitter'];
            $_SESSION['description']=$rows['description'];
            header("location:../dashboard.php");
        }
        else{
            echo"Wrong email or password";
        }
    }
    else{
        echo"Wrong email or password";
    }

}

function addmsg($msgfrom,$name,$msg,$subject){
    global $con;
    $stmt=$con->prepare("INSERT INTO contact_us(msgfrom,name,msg,subject) Value(:msgfrom,:name,:msg,:subject)");
    $stmt->execute(array(
        ":msgfrom"=>$msgfrom,
        ":name"=>$name,
        ":msg"=>$msg,
        ":subject"=>$subject
        ));
        echo "
        <script>
        toastr.success('Great , Your Message has been successfully Deliverd .')
        </script>";
}





/*
==========================
  insert new motort
==========================
*/

function insert_motor ($motor,$type,$price,$e_capacity,$h_power,$trans_type,$front_break,$junt,$t_capacity,$t_newton,$seats,$injec_carbr,$c_system,$weight,$height,$num_cylinder,$height_from_ground,$front_tire,$light_led,$box,$dashboard,$color,$avatar){
    global $con;
    $stmt = $con->prepare("INSERT INTO motors(motor,type,price,engine_capacity,horse_power,trans_type,front_break,junt,tank_capacity,torque_of_newton,seats,injec_carbr,cooling_system,weight,height,num_cylinder,height_from_ground,front_tire,light_led,box,dashboard,color,img) Value(:motor,:type,:price,:engine_capacity,:horse_power,:trans_type,:front_break,:junt,:tank_capacity,:torque_of_newton,:seats,:injec_carbr,:cooling_system,:weight,:height,:num_cylinder,:height_from_ground,:front_tire,:light_led,:box,:dashboard,:color,:img)");
    $stmt->execute(
    array(
        ":motor"            => $motor,
        ":type"             => $type,
        ":price"            => $price,
        ":engine_capacity"  => $e_capacity,
        ":horse_power"      => $h_power,
        ":trans_type"       => $trans_type,
        ":front_break"      => $front_break,
        ":junt"             => $junt,
        ":tank_capacity"    => $t_capacity,
        ":torque_of_newton" => $t_newton,
        ":seats"            => $seats,
        ":injec_carbr"      => $injec_carbr,
        ":cooling_system"   => $c_system,
        ":weight"           => $weight,
        ":height"           => $height,
        ":num_cylinder"     => $num_cylinder,
        ":height_from_ground"   => $height_from_ground,
        ":front_tire"       => $front_tire,
        ":light_led"        => $light_led,
        ":box"              => $box,
        ":dashboard"        => $dashboard,
        ":color"            => $color,
        ":img"              => $avatar,
    ));
    echo "
    <script>
        toastr.success('Great , Motorcycle Information has been successfully added .')
    </script>";
    header("Refresh:3;url=add_motor.php");
}

/*
==========================
  insert new user
==========================
*/

function insert_user ($username , $email , $pass ,$reg_state){
    global $con;
    $stmt = $con->prepare("INSERT INTO users(username,email,password,reg_state) Value(:username,:email,:password,:reg_state)");
    $stmt->execute(
    array(
        ":username"     => $username,
        ":email"    => $email,
        ":password" => $pass,
        ":reg_state" => $reg_state,
    ));
    echo "
    <script>
        toastr.success('Great , user has been successfully added .')
    </script>";
    header("Refresh:3;url=login.php");
}


/*
==========================
  check if user exist
==========================
*/

function check_user ( $email , $hased){
    global $con;
    $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute(array($email));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($count){
        if( $rows['password'] == $hased ){
            $_SESSION['userid']    = $rows['id'];
            $_SESSION['username']  = $rows['username'];
            $_SESSION['useremail'] = $rows['email'];
            $_SESSION['reg_state'] = $rows['reg_state'];
            echo "
            <script>
                toastr.success('Welcome Back " . $_SESSION['username'] . " .')
            </script>";

            if($rows['reg_state'] == "0"){
                header("Refresh:3;url=user_home.php");
            }else{
                header("Refresh:3;url=seller_profile.php");
            }

        }
        else{
            echo "
            <script>
                toastr.error('Sorry Your Email OR Password is not Correct.')
              </script>";
        }
    }
    else{
            echo "
            <script>
                toastr.error('Sorry Your Email OR Password is not Correct.')
              </script>";
        }
}
/*
==========================
    get all data
==========================
*/

function getAllData($table){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

/*
==========================
    update motor
==========================
*/


function update_motor($motor_id,$motor,$type,$price,$e_capacity,$h_power,$trans_type,$front_break,$junt,$t_capacity,$t_newton,$seats,$injec_carbr,$c_system,$weight,$height,$num_cylinder,$height_from_ground,$front_tire,$light_led,$box,$dashboard,$color,$avatar){
    global $con;
    $stmt = $con->prepare("UPDATE motors SET motor = ?,type=?,price = ?,engine_capacity = ?,horse_power = ?,trans_type = ?,front_break = ?,junt = ?,tank_capacity = ?,torque_of_newton = ?,seats = ?,injec_carbr = ?,cooling_system = ?,weight = ?,height = ?,num_cylinder = ?,height_from_ground = ?,front_tire = ?,light_led = ?,box = ?,dashboard = ?,color = ?,img=? WHERE id = ?");
    $stmt->execute(array(
        $motor,$type,
        $price,
        $e_capacity,
        $h_power,
        $trans_type,
        $front_break,
        $junt,
        $t_capacity,
        $t_newton,
        $seats,
        $injec_carbr,
        $c_system,
        $weight,
        $height,
        $num_cylinder,
        $height_from_ground,
        $front_tire,
        $light_led,
        $box,
        $dashboard,
        $color,
        $avatar,
        $motor_id
    ));
    echo "
    <script>
    toastr.success('Great , Motor INFO has been successfully Updated .')
    </script>";
    header("Refresh:2; url=update_motor.php");
}

/*
==========================
  get all data with id
==========================
*/

function getData_with_id($table,$id){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table WHERE id = ?");
    $stmt->execute(array($id));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rows;
}



/*
==========================
    get motor
==========================
*/

function suggest_motor ($motor,$min_price,$max_price){
    global $con;
    $stmt = $con->prepare("SELECT * FROM motors WHERE motor=? AND price > ? AND price < ?");
    $stmt->execute(array($motor,$min_price,$max_price));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

/*
==========================
  count
==========================
*/

function count_data($colume,$databname){
    global $con;
    $stmt = $con->prepare("SELECT COUNT($colume) From $databname");
    $stmt->execute();
    $rows = $stmt->fetchColumn();
    return $rows;
}



/*IMPORTANT !!! SN = 636f6465206279203a20416d722d4d6f68616d65642d4569737361 */


/*
==========================
    function 100%
==========================
*/

function full_similar ($price,$type,$distance_injec_carbr,$earth_injec_carbr,$earth_tyer,$height_height,$weight_h_power,$weight_t_capacity,$weight_t_newton,$hours_injec_carbr,$hours_h_power,$hours_t_capacity,$crowded_injec_carbr,$purpose_injec_carbr,$purpose_h_power,$purpose_t_capacity,$light,$box,$dash,$seats,$color){
    global $con;
    $stmt = $con->prepare("SELECT * FROM motors WHERE 
    price = ?
    AND trans_type = ?
    AND injec_carbr = ?
    AND injec_carbr = ?
    AND front_tire > ?
    AND height < ?
    AND horse_power < ?
    AND tank_capacity < ?
    AND torque_of_newton < ?
    AND injec_carbr = ?
    AND horse_power < ?
    AND tank_capacity < ?
    AND injec_carbr = ?
    AND injec_carbr = ?
    AND horse_power < ?
    AND tank_capacity < ?
    AND light_led = ?
    AND box = ?
    AND dashboard = ?
    AND seats = ?
    AND color = ?
    ");
    $stmt->execute(array(
        $price,
        $type,
        $distance_injec_carbr,
        $earth_injec_carbr,
        $earth_tyer,
        $height_height,
        $weight_h_power,
        $weight_t_capacity,
        $weight_t_newton,
        $hours_injec_carbr,
        $hours_h_power,
        $hours_t_capacity,
        $crowded_injec_carbr,
        $purpose_injec_carbr,
        $purpose_h_power,
        $purpose_t_capacity,
        $light,
        $box,
        $dash,
        $seats,
        $color,
    ));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


/*
==========================
    function 70%
==========================
*/

function semi_similar ($price,$type,$skills_h_power,$skills_t_newton,$skills_num_cylinder,$weight_h_power,$weight_t_capacity,$weight_t_newton,$hours_injec_carbr,$hours_h_power,$hours_t_capacity,$crowded_injec_carbr,$purpose_injec_carbr,$purpose_h_power,$purpose_t_capacity,$light,$box,$dash,$seats,$color){
    global $con;
    $stmt = $con->prepare("SELECT * FROM motors WHERE 
    price = ?
    AND trans_type = ?
    AND horse_power < ?
    AND torque_of_newton < ?
    AND num_cylinder < ?
    AND horse_power < ?
    AND tank_capacity < ?
    AND torque_of_newton < ?
    AND injec_carbr = ?
    AND horse_power < ?
    AND tank_capacity < ?
    AND injec_carbr = ?
    AND injec_carbr = ?
    AND horse_power < ?
    AND tank_capacity < ?
    AND light_led = ?
    AND box = ?
    AND dashboard = ?
    AND seats = ?
    AND color = ?
    ");
    $stmt->execute(array(
        $price,
        $type,
        $skills_h_power,
        $skills_t_newton,
        $skills_num_cylinder,
        $weight_h_power,
        $weight_t_capacity,
        $weight_t_newton,
        $hours_injec_carbr,
        $hours_h_power,
        $hours_t_capacity,
        $crowded_injec_carbr,
        $purpose_injec_carbr,
        $purpose_h_power,
        $purpose_t_capacity,
        $light,
        $box,
        $dash,
        $seats,
        $color,
    ));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}



/*
==========================
    function 50%
==========================
*/

function almost_similar ($price,$type,$earth_injec_carbr,$weight_h_power,$weight_t_capacity,$weight_t_newton,$purpose_injec_carbr,$purpose_h_power,$purpose_t_capacity,$box,$dash,$seats){
    global $con;
    $stmt = $con->prepare("SELECT * FROM motors WHERE 
    price = ?
    AND trans_type = ?
    AND injec_carbr = ?
    AND horse_power < ?
    AND tank_capacity < ?
    AND torque_of_newton < ?
    AND injec_carbr = ?
    AND horse_power < ?
    AND tank_capacity < ?
    AND box = ?
    AND dashboard = ?
    AND seats = ?
    ");
    $stmt->execute(array(
        $price,
        $type,
        $earth_injec_carbr,
        $weight_h_power,
        $weight_t_capacity,
        $weight_t_newton,
        $purpose_injec_carbr,
        $purpose_h_power,
        $purpose_t_capacity,
        $box,
        $dash,
        $seats,
    ));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

/*
==========================  
  get lastest operations
==========================
*/

function get_latest($select , $table , $order , $limit = 5){
    global $con;
    $stmt = $con->prepare("SELECT $select From $table ORDER BY $order DESC LIMIT $limit ");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
}


/*
==========================  
  insert_product
==========================
*/

function insert_product($type,$p_name,$p_desc,$p_price,$avatar){
    global $con;
    $stmt = $con->prepare("INSERT INTO products(type,product_name,product_desc,img,time,owner,price) Value(:type,:product_name,:product_desc,:img,:time,:owner,:price)");
    date_default_timezone_set('Africa/Cairo');
    $_time = date("Y/m/d . h:i:s");
    $stmt->execute(
    array(
        ":type"     => $type,
        ":product_name"    => $p_name,
        ":product_desc" => $p_desc,
        ":img" => $avatar ,
        ":time" => $_time ,
        ":owner" => $_SESSION["username"],
        ":price" => $p_price ,
    ));
    echo "
    <script>
        toastr.success('Great , Product has been successfully added .')
    </script>";
    header("Refresh:3;url=virtual.php");
}
