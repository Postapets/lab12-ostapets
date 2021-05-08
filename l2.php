<html style="height: 100%;">
<head>
    <title>Ex2</title>
    <style>

    </style>
</head>
<body>
<div id="lab">

    <div>
	<?php  
		class BaseClass  {
		var $name;
		
		public function __get($prop)
		{
			print_r("Нет свойства с именем  ".$prop.'<br>');	
		}
		public function __set($prop,$value)
		{
			print_r("Нельзя присвоить свойству  ".$prop.' значение '.$value.'<br>');	
		}
		public function __call($name, $arguments) {
        
        echo "Вызов метода".$name." с аргументами "
             . implode(', ', $arguments). "\n";
    }
		public function __toString()
    	{
    	return ("Объект класса BaseClass с именем ".$this-> name.'<br>');
        //print_r("Объект класса BaseClass с именем".$this-> name);

    	}
		function __construct($name="Name"){
		$this-> name=$name;		
		print_r("Вызов конструктора базового класса для объекта ".$this-> name.'<br>');		
		}
		function __destruct() {
        print_r( "Вызов деструктора базового класса для объекта " .$this-> name.'<br>');
  		}
  		//$prop=3;
		}
		
		$obj  = new BaseClass();
		echo $obj;
		//$obj = null; 
		$obj->prop=3;
		echo "---".$obj->prop."+++ <br>";
		$obj->missingMethod(1,2);
		echo $obj->missingMethod(1,2);
		
		echo "<br>";
		
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