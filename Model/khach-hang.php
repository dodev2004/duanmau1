<?php
require_once 'pdo.php';

function db_user_insert($user, $email,$mat_khau, $ho_ten,$vertifaction,$created_at){
    $sql = "INSERT INTO db_user(user,email, password, name,vetification_user,created_time) VALUES (?, ?,?, ?,?,?)";
    return  pdo_execute($sql, $user,$email, $mat_khau, $ho_ten,$vertifaction,$created_at);
}
function db_user_role_insert($user, $email,$mat_khau, $ho_ten,$role){
    $sql = "INSERT INTO db_user(user,email, password, name,role) VALUES (?, ?,?, ?,?)";
    pdo_execute($sql, $user,$email, $mat_khau, $ho_ten,$role);
}

function db_user_update($ma_kh,$user,  $name, $email,$address,$phone){
    $sql = "UPDATE db_user SET user=?,name=?,email=?,address=?,phone=? WHERE id=?";
    pdo_execute($sql, $user, $name, $email,$address,$phone, $ma_kh);
}
function db_user_delete($ma_kh){
    $sql = "DELETE FROM db_user  WHERE id=?";
    if(is_array($ma_kh)){
        foreach ($ma_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_kh);
    }
}
function db_user_delete_none_active(){
    $sql = "DELETE from db_user where active=0";
    pdo_execute($sql);
}
function db_user_select_all(){
    $sql = "SELECT * FROM db_user";
    return pdo_query($sql);
}

function db_user_select_by_id($ma_kh){
    $sql = "SELECT * FROM db_user WHERE id=?";
    return pdo_query_one($sql, $ma_kh);
}
function db_user_id_select_by_email($email){
    $sql = "SELECT id FROM db_user WHERE email=?";
    return pdo_query_one($sql, $email);
}
function db_user_select_email_by_id($id){
    $sql = "SELECT email from db_user where id=?";
    return pdo_query_one($sql, $id);
}
function db_user_signin($user, $password){
    $sql = "SELECT * from db_user where user = ? and password = ? ";
    return pdo_query_one($sql,$user,$password);
}
function db_user_exist($ma_kh){
    $sql = "SELECT count(*) FROM db_user WHERE $ma_kh=?";
    return pdo_query_value($sql, $ma_kh) > 0;
}
function db_column_user_exist($data,$comlumn){
    $sql = "SELECT count(*) FROM db_user WHERE $comlumn=?";
    return pdo_query_value($sql, $data) > 0;
}
function db_user_select_by_role($vai_tro){
    $sql = "SELECT * FROM db_user WHERE vai_tro=?";
    return pdo_query($sql, $vai_tro);
}

function db_user_change_password($ma_kh, $mat_khau_moi){
    $sql = "UPDATE db_user SET password=? WHERE id=?";
    pdo_execute($sql, $mat_khau_moi, $ma_kh);
}
function db_user_get_code($id){
    $sql = "SELECT vetification_user from db_user where id = ?";
    return pdo_query_one($sql,$id);
}
function db_user_set_active($active,$id){
    $sql = "UPDATE db_user set active=? WHERE id=?";
    pdo_execute($sql,$active,$id);
}
function db_user_update_vevification($code,$id){
    $sql = "UPDATE db_user set vetification_user = ? where id = ?";
    pdo_execute($sql,$code,$id);
}
