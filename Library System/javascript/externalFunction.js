// JavaScript Document






function calReturnDate(){
var x=document.getElementById('borrwalDate').value;	
var y=new Date(x);
var returndate=new Date(y.getFullYear(),y.getMonth(),y.getDate()+14);
document.getElementById('returndate').value=returndate.getFullYear()+'-'+(returndate.getMonth()+1)+'-'+returndate.getDate();

	
}