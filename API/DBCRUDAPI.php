<?php 
    class DBCRUDAPI{
        public $que;
        private $servername='localhost';
        private $username='root';
        private $password='';
        private $dbname='edtms';
        private $result=array();
        private $mysqli='';

        public function __construct(){
            $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        }

        public function insert($table,$para=array()){
            $table_columns = implode(',', array_keys($para));
            $table_value = implode("','", $para);
            echo $table_value;

            $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

            $result = $this->mysqli->query($sql);
        }

        public function update($table,$para=array(),$id){
            $args = array();

            foreach ($para as $key => $value) {
                $args[] = "$key = '$value'"; 
            }

            $sql="UPDATE  $table SET " . implode(',', $args);

            $sql .=" WHERE $id";

            $result = $this->mysqli->query($sql);
        }

        public function delete($table,$id){
            $sql="DELETE FROM $table";
            $sql .=" WHERE $id ";
            $sql;
            $result = $this->mysqli->query($sql);
        }

        public $sql;

        public function select($table,$rows="*",$where = null){
            if ($where != null) {
                $sql="SELECT $rows FROM $table WHERE $where";
            }else{
                $sql="SELECT $rows FROM $table";
            }

            $this->sql = $result = $this->mysqli->query($sql);
        }

        public function selectleftjoin($table,$table1,$attributename1,$attributename,$where = null){
            // $attributes = implode(',', $attributesName);
            if ($where != null) {
                $sql = "SELECT * FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename $where";
            }else{
                $sql = "SELECT * FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename";
            }
            $this->sql = $result = $this->mysqli->query($sql);
        }

        public function selectleftjoin100($table,$table1,$attributename1,$attributename,$attributesName,$where = null){
            $attributes = implode(',', $attributesName);
            if ($where != null) {
                $sql = "SELECT $attributes FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename $where";
            }else{
                $sql = "SELECT $attributes FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename";
            }
            $this->sql = $result = $this->mysqli->query($sql);
        }

        public function selectleftjoin1($table,$table1,$attributename1,$attributename,$att,$whereClause){
            $atts = implode(',', $att);
            $sql = "SELECT $atts FROM $table LEFT JOIN $table1 ON $table1.$attributename1=$table.$attributename where $whereClause";

            $this->sql = $result = $this->mysqli->query($sql);
        }

        public function selectleftjoin3($table,$table1,$attributename1,$table2,$attributename3,$attributesName=array()){
            $attributes = implode(',', $attributesName);
            $sql = "SELECT $attributes FROM $table LEFT JOIN $table1 ON $table1.id = $table.$attributename1 LEFT JOIN $table2 ON $table2.id=$attributename3";

            $this->sql = $result = $this->mysqli->query($sql);
        }

    }
?>