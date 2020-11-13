<?php
class dblib {
	
	// Biến lưu trữ kết nối kiểu private
	private $__conn;
	
	// Hàm kết nối
	function connect()
	{
		// thông tin database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "tlu";
		
		// Kiểm chưa nếu chưa kết nối thì thực hiện kết nối
		if (!$this->__conn){
			// Kết nối		
			try {
				$this->__conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$this->__conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
				die();
			}
		}
	}
	
	// Hàm ngắt kết nối
	function dis_connect(){
		// Nếu đang kết nối thì ngắt
		if ($this->__conn){
			$this->__conn = null;
		}
	}
	
	// Hàm insert
	function insert($table, $data)
	{
		// Kết nối
		$this->connect();
		
		// Lưu trữ danh sách file
		$field_list = '';
		// Lưu trữ danh sách giá trị tương ứng với  field
		$value_list = '';
		
		// Lặp qua data
		foreach ($data as $key => $value){
			$field_list .= ",$key";
			$value_list .= ",'".$value."'";
		}
		
		// VÃ¬ sau vÃ²ng láº·p cÃ¡c biáº¿n $field_list vÃ  $value_list sáº½ thá»«a má»™t dáº¥u , nÃªn ta sáº½ dÃ¹ng hÃ m trim Ä‘á»ƒ xÃ³a Ä‘i
		$sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
		$stmt = $this->__conn->prepare($sql);
		
		return $stmt->execute();
	}
	
	// Hàm Update
	function update($table, $data, $where)
	{
		//Kết nối
		$this->connect();
		$sql = '';
		// Lặp qua data
		foreach ($data as $key => $value){
			$sql .= "$key = '".$value."',";
		}
		
		// VÃ¬ sau vÃ²ng láº·p biáº¿n $sql sáº½ thá»«a má»™t dáº¥u , nÃªn ta sáº½ dÃ¹ng hÃ m trim Ä‘á»ƒ xÃ³a Ä‘i
		$sql = 'UPDATE '.$table. ' SET '.trim($sql, ',').' WHERE '.$where;
		$stmt = $this->__conn->prepare($sql);
		
		return $stmt->execute();
	}
	
	// Hàm delete
	function remove($table, $where){
		//Kết nối
		$this->connect();
		
		// Delete
		$sql = "DELETE FROM $table WHERE $where";
		$stmt = $this->__conn->prepare($sql);
		
		return $stmt->execute();
	}
	
	// Hàm lấy danh sách
	function get_list($sql)
	{
		//Kết nối
		$this->connect();
		
		//Thực hiện lấy dữ liệu
		$stmt = $this->__conn->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
		return $stmt->fetchALL();	
	}
	
	// Hàm lấy một record duy nhất
	function get_row($sql)
	{
		//kết nối
		$this->connect();
		
		// Thực hiện lấy dữ liệu
		$stmt = $this->__conn->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		return $stmt->fetch();	
	}
	
	function get_row_number($sql)
	{
		// Kết nối
		$this->connect();
		
		// Thực hiện lấy dữ liệu
		$stmt = $this->__conn->prepare($sql);
		$stmt->execute();
		
		return $stmt->fetchColumn();
	}
}
?>