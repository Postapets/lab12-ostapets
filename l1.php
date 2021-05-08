<html style="height: 100%;">
<head>
    <title>Ex1</title>
    <style>

    </style>
</head>
<body>
<div id="lab">
    <div>
	<?php  
		class BaseClass {
		var $name;
		public function __toString()
    	{
    	return ("Объект класса BaseClass с именем ".$this-> name.'<br>');
    	}
		function __construct($name="Name"){
		$this-> name=$name;		
		print_r("Вызов конструктора базового класса для объекта ".$this-> name.'<br>');		
		}
		function __destruct() {
        print_r( "Вызов деструктора базового класса для объекта " .$this-> name.'<br>');
  		}
		}
		
		$obj  = new BaseClass();
		echo $obj;
		$obj = null; 
		
		class SubClass extends BaseClass
		{
   		function __construct($name1){
				
		print_r("Вызов конструктора дочернего класса для объекта ".$this-> name.'<br>');
		parent::__construct($name1);		
		}

		public function __toString()
    	{
    	return ("Объект класса SubClass с именем ".$this-> name.'<br>');

    	}

}
$obj1 = new SubClass('123');
echo $obj1;
		
	?>
</div>
</div>
</body>
</html>