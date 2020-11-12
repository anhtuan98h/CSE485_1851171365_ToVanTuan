<?php
class dblib {
	
	// Biáº¿n lÆ°u trá»¯ káº¿t ná»‘i
	private $__conn;
	
	// HÃ m Káº¿t Ná»‘i
	function connect()
	{
		// thông tin database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "tlu";
		
		// Kiá»ƒm tra náº¿u chÆ°a káº¿t ná»‘i thÃ¬ thá»±c hiá»‡n káº¿t ná»‘i
		if (!$this->__conn){
			// Káº¿t ná»‘i			
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
	
	// HÃ m Ngáº¯t Káº¿t Ná»‘i
	function dis_connect(){
		// Náº¿u Ä‘ang káº¿t ná»‘i thÃ¬ ngáº¯t
		if ($this->__conn){
			$this->__conn = null;
		}
	}
	
	// HÃ m Insert
	function insert($table, $data)
	{
		// Káº¿t ná»‘i
		$this->connect();
		
		// LÆ°u trá»¯ danh sÃ¡ch field
		$field_list = '';
		// LÆ°u trá»¯ danh sÃ¡ch giÃ¡ trá»‹ tÆ°Æ¡ng á»©ng vá»›i field
		$value_list = '';
		
		// Láº·p qua data
		foreach ($data as $key => $value){
			$field_list .= ",$key";
			$value_list .= ",'".$value."'";
		}
		
		// VÃ¬ sau vÃ²ng láº·p cÃ¡c biáº¿n $field_list vÃ  $value_list sáº½ thá»«a má»™t dáº¥u , nÃªn ta sáº½ dÃ¹ng hÃ m trim Ä‘á»ƒ xÃ³a Ä‘i
		$sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
		$stmt = $this->__conn->prepare($sql);
		
		return $stmt->execute();
	}
	
	// HÃ m Update
	function update($table, $data, $where)
	{
		// Káº¿t ná»‘i
		$this->connect();
		$sql = '';
		// Láº·p qua data
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
		// Káº¿t ná»‘i
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