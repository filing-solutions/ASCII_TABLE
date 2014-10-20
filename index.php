<?php
class CreateTable{
	private $styleSign1			=	"+";
	private $styleSign2			=	"-";
	private $styleSign3			=	"|";
	private $styleSignSpace		=	"&nbsp;";
	private $tableArray=array(
							array(
								'Name' 		=> 'Trixie',
								'Color' 	=> 'Green',
								'Element' 	=> 'Earth',
								'Likes' 	=> 'Flowers'
								),
							array(
								'Name' 		=> 'Tinkerbell',
								'Element' 	=> 'Air',
								'Likes' 	=> 'Singning',
								'Color' 	=> 'Blue'
								), 
							array(
								'Element' 	=> 'Water',
								'Likes' 	=> 'Dancing',
								'Name' 		=> 'Blum',
								'Color' 	=> 'Pink'
								),
						);
	private $colors				=	array("green", "red", "blue", "yellow");
	private $columnsColors		=	array();
	
	public function setColors($colors=array())
	{
		$this->colors	=	$colors;
	}
	
	public function getColors()
	{
		return $this->colors;
	}
	
	public function setColumnsColors($columnsColors)
	{
		$this->columnsColors	=	$columnsColors;
	}
	
	public function getColumnsColors()
	{
		return $this->columnsColors;
	}
	
	public function setStyleSign1($styleSign1)
	{
		$this->styleSign1	=	$styleSign1;
	}
	
	public function getStyleSign1()
	{
		return $this->styleSign1;
	}
	
	public function setStyleSign2($styleSign2)
	{
		$this->styleSign2	=	$styleSign2;
	}
	
	public function getStyleSign2()
	{
		return $this->styleSign2;
	}
	
	public function setStyleSign3($styleSign3)
	{
		$this->styleSign3	=	$styleSign3;
	}
	
	public function getStyleSign3()
	{
		return $this->styleSign3;
	}
	
	public function setStyleSignSpace($styleSignSpace)
	{
		$this->styleSignSpace	=	$styleSignSpace;
	}
	
	public function getStyleSignSpace()
	{
		return $this->styleSignSpace;
	}
	
	public function setTableArray($tableArray)
	{
		$this->tableArray	=	$tableArray;
	}
	
	public function getTableArray()
	{
		return $this->tableArray;
	}
	
	function __construct($tableArray=array())
	{
		if(count($tableArray)==0)
		{
			$tableArray=$this->getTableArray();
		}
		else
		{
			$this->setTableArray($tableArray);
		}
	}
	
	
	public function printTable($tableArray=array())
	{
		if(!is_array($tableArray))
		{
			die("\$tableArray parameter should be array in printTable function");
		}
		
		if(count($tableArray)==0)
		{
			$tableArray=$this->tableArray;
		}
		
		$output		=	"<pre>";
		$output		.=	$this->createTableHeader($tableArray);
		$output		.=	$this->createTableRaws($tableArray);
		$output		.=	$this->createTopHorizontalLine($tableArray);
		$output		.=	"</pre>";
		
		return $output;
	}

	public function createTableHeader($tableArray)
	{
		if(!is_array($tableArray))
		{
			die("\$tableArray parameter should be array in createTableHeader function");
		}
		
		$lenghtsArray		=	$this->getLengthsOfArrayKeysVals($tableArray);
		$columnsColors		=	$this->getColumnsColors();
		$output=$this->createTopHorizontalLine($tableArray);
		$output				.=	"<br/>";
		foreach($lenghtsArray as $col=>$size)
		{
			$colLength		=	strlen($col);
			$output			.=	$this->styleSign3.$this->styleSignSpace.$this->styleSignSpace;
			$output			.=	"<span style=\"color:".$columnsColors[$col]."\">";
			$output			.=	$col;
			$output			.=	"</span>";
			for($i=0; $i<$size-$colLength+2; $i++)
			{
				$output		.=	$this->styleSignSpace;
			}
		}
		$output				.=	$this->styleSign3;
		$output				.=	"<br/>";
		$output				.=	$this->createTopHorizontalLine($tableArray);
		$output				.=	"<br/>";
		return $output;
	}
	
	public function createTableRaws($tableArray)
	{
		if(!is_array($tableArray))
		{
			die("\$tableArray parameter should be array in createTableRaws function");
		}
		$output				=	"";
		$lenghtsArray		=	$this->getLengthsOfArrayKeysVals($tableArray);
		
		$columnsColors		=	$this->getColumnsColors();
		
		foreach($tableArray as $column)
		{
			foreach($lenghtsArray as $key=>$size)
			{
				
				$output		.=	$this->styleSign3.$this->styleSignSpace;
				if(isset($column[$key]))
				{
					$output		.=	"<span style=\"color:".$columnsColors[$key]."\">";
					$output		.=	$this->styleSignSpace.$column[$key];
					$colLength	=	strlen($column[$key]);
					$output		.=	"</span>";
				}
				else
				{
					$colLength	=	-1;
				}
				for($i=0; $i<$size-$colLength+2; $i++)
				{
					$output		.=	$this->styleSignSpace;
				}
				
			}
			$output				.=	$this->styleSign3;
			$output				.=	"<br/>";
		}
		
		return $output;
	}

	public function createTopHorizontalLine($tableArray)
	{
		if(!is_array($tableArray))
		{
			die("\$tableArray parameter should be array in createTopHorizontalLine function");
		}
		$output				=	"";
		$lenghts			=	$this->getLengthsOfArrayKeysVals($tableArray);
		foreach($lenghts as $key=>$val)
		{
			$output			.=	$this->styleSign1;
			for($i=0; $i<$val+4; $i++)
			{
				$output		.=	$this->styleSign2;
			}
		}
		$output				.=	$this->styleSign1;
		
		return $output;
	}

	public function getLengthsOfArrayKeysVals($tableArray=array())
	{
		if(!is_array($tableArray))
		{
			die("\$tableArray parameter should be array in getMaxLengthOfArrayKeysVals function");
		}
		$lenghts			=	array();
		
		foreach($tableArray as $column)
		{
			$i		=	0;
			foreach($column as $key=>$val)
			{
				$keyLength	=	strlen($key);
				$valLength	=	strlen($val);
				
				if($i<count($this->colors))
				{
					$this->columnsColors[$key]	=	$this->colors[$i];
				}
				$i++;
				
				if($keyLength>=$valLength)
				{
					if(array_key_exists($key,$lenghts))
					{
						if($keyLength>$lenghts[$key])
						{
							$lenghts[$key]	=	$keyLength;
						}
					}
					else
					{
						$lenghts[$key]	=	$keyLength;
					}
				}
				else
				{
					if(array_key_exists($key,$lenghts))
					{
						if($valLength>$lenghts[$key])
						{
							$lenghts[$key]	=	$valLength;
						}
					}
					else
					{
						$lenghts[$key]	=	$valLength;
					}
				}
			}
		}
		return $lenghts;
	}
}

$table=new CreateTable();
print($table->printTable());
?>