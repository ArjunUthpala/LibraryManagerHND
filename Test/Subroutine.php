<?php
function disp(){
	echo "<h2>Arjun</h2>";
}
//---------------------------------
function dispMsg($x){
	echo "<h2>".$x."</h2>";
}
//---------------------------------
function returnPi(){
	return 22/7;
}
//---------------------------------
function add($x,$y){
	return $x+$y;
}
//---------------------------------

disp();
dispMsg("Esoft");
echo((returnPi()*8*8) ."<br>");
print(add(123,456));
?>