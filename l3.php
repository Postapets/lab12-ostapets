<html style="height: 100%;">
<head>
    <title>Ex3</title>
    <style>

    </style>
</head>
<body>
<div id="lab">
    <div>
	<?php  
		class BaseClass  {
		var $name;
		var $className = "BaseClass";
		function __clone()
    	{
            // Копируем this->object принудительно
        $this->name = "x".$this->name;
    	}
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
    	return ("Объект класса BaseClass с именем ".$this-> name.' где className -'.$this->$className.'<br>');
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
$obj1 =clone $obj;
	?>
</div>
</div>
</body>
</html>