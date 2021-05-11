<html style="height: 100%;">
<head>

    <title>Ex5</title>
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
    	function __sleep(){
  		 return array('name');
		}

		public function __wakeup()
    {

        $this->className = "BaseClass1";
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
    	return ("Объект класса BaseClass с именем ".$this-> name.' где className -'.$this-> className.'<br>');

    	}
		function __construct($name="Name123"){
		$this-> name=$name;		
		print_r("Вызов конструктора базового класса для объекта ".$this-> name.'<br>');		
		}
		function __destruct() {
        print_r( "Вызов деструктора базового класса для объекта " .$this-> name.'<br>');
  		}

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
$save_s = serialize($obj);
print($obj);
print($save_s.'<br>');
$save_s = unserialize($save_s);
print($save_s);		
	?>
</div>
</div>
</body>
</html>