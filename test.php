<?php
include("index.php");

class CreateTableTest extends \PHPUnit_Framework_TestCase
{
	public function testCheckWhetherPrintTableFunctionIsOk()
	{
		$create_table	=	new CreateTable();
		$tableArray		=	array(
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
		$result			=	$create_table->printTable($tableArray);
		$expectedResult	=	"<pre>+--------------+---------+-----------+------------+<br>|&nbsp;&nbsp;<span style=\"color:blue\">Name</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;<span style=\"color:yellow\">Color</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span style=\"color:green\">Element</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span style=\"color:red\">Likes</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<br>+--------------+---------+-----------+------------+<br>|&nbsp;<span style=\"color:blue\">&nbsp;Trixie</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:yellow\">&nbsp;Green</span>&nbsp;&nbsp;|&nbsp;<span style=\"color:green\">&nbsp;Earth</span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:red\">&nbsp;Flowers</span>&nbsp;&nbsp;&nbsp;|<br>|&nbsp;<span style=\"color:blue\">&nbsp;Tinkerbell</span>&nbsp;&nbsp;|&nbsp;<span style=\"color:yellow\">&nbsp;Blue</span>&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:green\">&nbsp;Air</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:red\">&nbsp;Singning</span>&nbsp;&nbsp;|<br>|&nbsp;<span style=\"color:blue\">&nbsp;Blum</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:yellow\">&nbsp;Pink</span>&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:green\">&nbsp;Water</span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:red\">&nbsp;Dancing</span>&nbsp;&nbsp;&nbsp;|<br>+--------------+---------+-----------+------------+</pre>";
		
		$this->assertEquals($expectedResult,$result);
	}
	
	public function testGetLengthsOfArrayKeysVals()
	{
		$create_table	=	new CreateTable();
		$tableArray		=	array(
								array(
									'Name' 		=> 'Trixie',
									'Color' 	=> 'Green',
									'Element' 	=> 'Earth',
									'Likes' 	=> 'Flowers'
									),
								array(
									'Name'		=> 'Tinkerbell',
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
		$result			=	$create_table->getLengthsOfArrayKeysVals($tableArray);
		
		$expectedResult	=	array('Name'=>10, 'Color'=>5, 'Element'=>7, 'Likes'=>8);
		$this->assertEquals($expectedResult,$result);
	}
	
	public function testCreateTopHorizontalLine()
	{
		$create_table		=	new CreateTable();
		$tableArray			=	array(
									array(
										'Name' 		=> 'Trixie',
										'Color' 	=> 'Green',
										'Element'	=> 'Earth',
										'Likes' 	=> 'Flowers'
										),
									array(
										'Name' 	=> 'Tinkerbell',
										'Element' => 'Air',
										'Likes' => 'Singning',
										'Color' => 'Blue'
										), 
									array(
										'Element' => 'Water',
										'Likes' => 'Dancing',
										'Name' => 'Blum',
										'Color' => 'Pink'
										),
								);
		$result			=	$create_table->createTopHorizontalLine($tableArray);
		
		$expectedResult	=	"+--------------+---------+-----------+------------+";
		$this->assertEquals($expectedResult,$result);
	}
	
	public function testCreateTableRaws()
	{
		$create_table		=	new CreateTable();
		$tableArray			=	array(
									array(
										'Name' 		=> 'Trixie',
										'Color' 	=> 'Green',
										'Element'	=> 'Earth',
										'Likes' 	=> 'Flowers'
										),
									array(
										'Name' 	=> 'Tinkerbell',
										'Element' => 'Air',
										'Likes' => 'Singning',
										'Color' => 'Blue'
										), 
									array(
										'Element' => 'Water',
										'Likes' => 'Dancing',
										'Name' => 'Blum',
										'Color' => 'Pink'
										),
								);
		$result			=	$create_table->createTableRaws($tableArray);
		
		$expectedResult	=	"|&nbsp;<span style=\"color:blue\">&nbsp;Trixie</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:yellow\">&nbsp;Green</span>&nbsp;&nbsp;|&nbsp;<span style=\"color:green\">&nbsp;Earth</span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:red\">&nbsp;Flowers</span>&nbsp;&nbsp;&nbsp;|<br/>|&nbsp;<span style=\"color:blue\">&nbsp;Tinkerbell</span>&nbsp;&nbsp;|&nbsp;<span style=\"color:yellow\">&nbsp;Blue</span>&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:green\">&nbsp;Air</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:red\">&nbsp;Singning</span>&nbsp;&nbsp;|<br/>|&nbsp;<span style=\"color:blue\">&nbsp;Blum</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:yellow\">&nbsp;Pink</span>&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:green\">&nbsp;Water</span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;<span style=\"color:red\">&nbsp;Dancing</span>&nbsp;&nbsp;&nbsp;|<br/>";
		$this->assertEquals($expectedResult,$result);
	}
	
	public function testCreateTableHeader()
	{
		$create_table		=	new CreateTable();
		$tableArray			=	array(
									array(
										'Name' 		=> 'Trixie',
										'Color' 	=> 'Green',
										'Element'	=> 'Earth',
										'Likes' 	=> 'Flowers'
										),
									array(
										'Name' 	=> 'Tinkerbell',
										'Element' => 'Air',
										'Likes' => 'Singning',
										'Color' => 'Blue'
										), 
									array(
										'Element' => 'Water',
										'Likes' => 'Dancing',
										'Name' => 'Blum',
										'Color' => 'Pink'
										),
								);
		$result			=	$create_table->createTableHeader($tableArray);
		
		$expectedResult	=	"+--------------+---------+-----------+------------+<br/>|&nbsp;&nbsp;<span style=\"color:blue\">Name</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;<span style=\"color:yellow\">Color</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span style=\"color:green\">Element</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span style=\"color:red\">Likes</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<br/>+--------------+---------+-----------+------------+<br/>";
		$this->assertEquals($expectedResult,$result);
	}
	
	
}
?>