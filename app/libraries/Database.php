<?php
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $pdo;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dsn = "mysql:host=". $this->host . ";dbname=" . $this->dbname;
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        );

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
            // echo "success";
        }catch(PDOException $e){

           $this->error = $e->getMessage();
           echo $this->error;
        }
        
    }

    public function create ($table,$data)
    {
        try {
            $column = array_keys($data);
            $columnSql = implode(',', $column);
            $bindingSql = ':' . implode (',:', $column); // :name,:email,:password 
            $sql = "INSERT INTO $table ($columnSql) VALUES ($bindingSql)";
            $stmt = $this->pdo->prepare($sql);
            foreach ($data as $key => $value) {
                $stmt->bindValue(':'. $key, $value);
            }
            for($i=0;$i<10;$i++){
                $status = $stmt->execute();
            }
            return ($status) ? $this->pdo->lastInsertId() : false;
        }catch (PDOException $e) {
            echo $e;
        }
    }


    public function columnFilter($table, $column, $value) 
    {
        // $sql = 'SELECT * FROM ' . $table . ' WHERE `' . $column . '` = :value';
        $sql = 'SELECT * FROM ' . $table . ' WHERE `' . str_replace('`', '', $column) . '` = :value';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':value', $value);
        $success = $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
        
    }

    public function loginCheck($table, $column1, $value1,$column2, $value2) 
    {
        $sql = 'SELECT * FROM ' . $table . '  WHERE `' . $column1 . '` = :value1 AND `' .$column2 . '` = :value2';
        // echo $sql;
        // $sql = 'SELECT * FROM ' . $table . ' WHERE `' . str_replace('`', '', $column) . '` = :value';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':value1',$value1,PDO::PARAM_STR);
        $stmt->bindParam(':value2',$value2,PDO::PARAM_STR);
        $login_success = $stmt->execute();
        $user_row = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r( $user_row);
        return ($login_success) ? $user_row : [];

        
    }

    public function UpdateLogin($id) 
    {
       
        // $sql = 'UPDATE' . $table . 'SET'. $login . '=:value1'.' WHERE `' . $id . '` = :id';
        // $sql = 'UPDATE $table SET' . $login .'= 1'. WHERE `' . $id .'` = :id'; 

        $sql = 'UPDATE users SET `is_login` = :value WHERE `id` = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':value',1);
        $stmt->bindValue(':id',$id);
        $update_success = $stmt->execute();
        $update_row = $stmt->fetch(PDO::FETCH_ASSOC);
        return ($update_success) ? $update_row : [];
        
    }

    public function readAll($table)
    {
        $sql = 'SELECT * FROM ' .$table;
        // echo $sql;
        $stmt = $this->pdo->prepare($sql);
        $success = $stmt->execute();
        $row = $stmt->fetchAll();
        return ($success) ? $row : [];
    }

    public function getById($table,$id)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE `id`= :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',$id);
        $success = $stmt->execute();
        $row = $stmt->fetch();
        return ($success) ? $row : [];
    }

//      public function UpdateCategory($id,$name,$description,$type) 
//      {    
//       $sql = 'UPDATE categories SET `name` = :name, `description` = :description, `type`= :type WHERE `id` = :id';
//          //echo $sql;
//         $stmt = $this->pdo->prepare($sql);
//         $stmt->bindValue(':id',$id);
//         $stmt->bindValue(':name',$name);
//         $stmt->bindValue(':description',$description);
//         $stmt->bindValue(':type',$type);
//         $update_success = $stmt->execute();
//         $update_row = $stmt->fetch(PDO::FETCH_ASSOC);
//         return ($update_success) ? $update_row : [];
        
//    }

    public function update($table,$id,$data)
    {
        if (isset($data['id'])){
            unset($data['id']);
        }
         $columns = array_keys($data);
         function map($item)
         {
             return $item . '=:' . $item;
         }
         $columns = array_map('map', $columns);
         $bindingSql = implode(',', $columns);
         $sql = 'UPDATE ' . $table . ' SET ' . $bindingSql . ' WHERE `id`=:id';
         $stmt = $this->pdo->prepare($sql);
         $data['id'] = $id;
         foreach ($data as $key => $value) {
             $stmt->bindValue(':' . $key, $value);
         }
         $status = $stmt->execute();
         return $status;


    }

    public function delete($table,$id)
    {
        $sql = 'DELETE FROM '. $table . ' WHERE `id`=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',$id);
        $success = $stmt->execute();
        return $success;
        
    }

    public function verify($id)
    {
        try {

            $sql        = "UPDATE users SET is_confirmed =:true ,`is_active` ='1' WHERE id = $id";
            $stm        = $this->pdo->prepare($sql);
            $stm->bindValue(':true', '1');
            $success = $stm->execute();
            $row     = $stm->fetch(PDO::FETCH_ASSOC);
            // print_r($row);
            return ($success) ? $success : '0';
        } catch (Exception $e) {
            echo ($e);
        }
    }



}