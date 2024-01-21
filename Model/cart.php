<?php  
    require_once "pdo.php";
?>
<?php 
    function bill_insert($id_user,$bill_name,$bill_tell,$bill_pttt,$bill_address,$bill_datecreated,$bill_dateupdate,$total){
        $sql  = "INSERT INTO  db_order(id_user,bill_name,bill_tel,bill_pttt,bill_address,bill_datecreated,bill_dateupdate,total) values(?,?,?,?,?,?,?,?)";
        return pdo_execute_id($sql,$id_user,$bill_name,$bill_tell,$bill_pttt,$bill_address,$bill_datecreated,$bill_dateupdate,$total);
    };
    function bill_select_all(){
        $sql = "";
        if(isset($_POST["seach"])){
            $seach_Madh = !empty($_POST["seach_Madh"])? $_POST["seach_Madh"]:null;
            if($seach_Madh){
                $sql = "SELECT * from db_order where id  = ? order by bill_datecreated desc";
                return pdo_query($sql,$seach_Madh);
            }
            else {
                $sql = "SELECT *  from db_order  order by bill_datecreated desc";
                return pdo_query($sql);
            }
        }
        else {
            $sql = "SELECT *  from db_order  order by bill_datecreated desc";
            return pdo_query($sql);
        }
       
      
    }
    function bill_update($id,$name,$phone,$address,$updatetimer,$status){
            $sql = "UPDATE  db_order set  bill_name =  ? ,bill_tel=? ,bill_address= ?,bill_dateupdate=?,status =? where id =  ?";
            pdo_execute($sql,$name,$phone,$address,$updatetimer,$status,$id);
    }
    function bill_select_by_id($id){
        $sql = "SELECT * from db_order where id = ?";
        return pdo_query_one($sql,$id);
    }
    function bill_delete_by_id($id){
        $sql = "DELETE from db_order  where id =?";
        if(is_array($id)){
            foreach($id  as $index){
                 pdo_execute($sql,$index);
            }
        }
        else  {
         
             pdo_execute($sql,$id);  
        }

    }
    function cart_select_all_by_id($id){
        $sql = "SELECT * from db_orderdetail where id= ?";
        return pdo_query($sql,$id);
    }
    function mycart_select_all_by_id($id){
        $sql = "SELECT * from db_order where id_user= ?";
        return pdo_query($sql,$id);
    }
    function order_detail_insert($id_order,$id_product,$name,$quantity,$price){
        $sql  = "INSERT INTO  db_orderdetail(id_order,id_product,name,quantity,price) values(?,?,?,?,?)";
        return pdo_execute($sql,$id_order,$id_product,$name,$quantity,$price);
    };
    function order_detail_count_by_id($id){
        $sql = "SELECT count(*) from db_orderdetail where id_order = ?";
        return pdo_query_value($sql,$id);
    }   
    function get_ttdh($tt){
        switch ($tt) {
            case 0:
               return 'Chờ xác nhận';
                break;
            case 1;
            return 'Chờ lấy hàng';
            break;
            case 2:
                return 'Đang giao';
                break;
            default:
                # code...
                break;
        }
    }
?>