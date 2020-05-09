<?php
include_once 'DbConfig.php';

class Ecom extends DbConfig
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function task1($query)
	{		
		$result = $this->connection->query($query);
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
        }
		return $rows;
	}

	

	

}
?>