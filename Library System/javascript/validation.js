



function validateMemberID(){

var str=document.getElementById("memberid").value;
var pattern=new RegExp("^[0-9]{1,5}$");
var res=pattern.test(str);
if(!res)
	document.getElementById("memberidmsg").innerHTML="<span style='color:red'>Invalid MemberID</span>";
else
	document.getElementById("memberidmsg").innerHTML="<span style='color:green'>Valid MemberID</span>";	
}	
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function valaidateUserName(){

var str=document.getElementById("userName").value;
var pattern=new RegExp("^[a-zA-Z]{3,20}$");
var res=pattern.test(str);
if(!res)
	document.getElementById("unamemsg").innerHTML="<span style='color:red'>Invalid User Name</span>";
else
	document.getElementById("unamemsg").innerHTML="<span style='color:green'>Valid User Name</span>";	
}
/////////////////////////////////////////////////////////////////////////////////////////////

function validateTitle(){
var str=document.getElementById("title").value;
var pattern=new RegExp("^[&0-9a-zA-Z\\s]{0,50}$");
var res=pattern.test(str);
if(!res)
	document.getElementById("titlemsg").innerHTML="<span style='color:red'>Invalid Title</span>";
else
	document.getElementById("titlemsg").innerHTML="<span style='color:green'>Valid Title</span>";	
}
///////////////////////////////////////////////////////////////////

function validateISBN(){
var str=document.getElementById("isbn").value;
var pattern=new RegExp("^[0-9]{0,13}$");
var res=pattern.test(str);
if(!res)
	document.getElementById("isbnmsg").innerHTML="<span style='color:red'>Invalid ISBN</span>";
else
	document.getElementById("isbnmsg").innerHTML="<span style='color:green'>Valid ISBN</span>";	
}

///////////////////////////////////////////////////////////////////

function validateAuthor(){
var str=document.getElementById("author").value;
var pattern=new RegExp("^[&a-zA-Z\\s]{0,100}$");
var res=pattern.test(str);
if(!res)
	document.getElementById("authormsg").innerHTML="<span style='color:red'>Invalid Author</span>";
else
	document.getElementById("authormsg").innerHTML="<span style='color:green'>Valid Author</span>";	
}

///////////////////////////////////////////////////////////////////

function validatePrice(){
var str=document.getElementById("price").value;
var pattern=new RegExp("^[0-9\.]{0,10}$");
var res=pattern.test(str);
if(!res)
	document.getElementById("pricemsg").innerHTML="<span style='color:red'>Invalid Price</span>";
else
	document.getElementById("pricemsg").innerHTML="<span style='color:green'>Valid Price</span>";	
}

///////////////////////////////////////////////////////////////////

function validatePubName(){
var str=document.getElementById("pubname").value;
var pattern=new RegExp("^[&a-zA-Z\\s]{0,50}$");
var res=pattern.test(str);
if(!res)
	document.getElementById("pubnamemsg").innerHTML="<span style='color:red'>Invalid Publisher</span>";
else
	document.getElementById("pubnamemsg").innerHTML="<span style='color:green'>Valid Publisher</span>";	
}

/////////////////////////////////////////////////////////////////////////////////////////////

function validateFirstName(){
var str=document.getElementById("fname").value;
var pattern=new RegExp("^[&a-zA-Z]{0,20}$");
var res=pattern.test(str);
if(!res)
	document.getElementById("titlemsg").innerHTML="<span style='color:red'>Invalid First Name</span>";
else
	document.getElementById("titlemsg").innerHTML="<span style='color:green'>Valid First Name</span>";	
}
/////////////////////////////////////////////////////////////////////////////////////////////

function validateFirstName(){
var str=document.getElementById("fname").value;
var pattern=new RegExp("^[&a-zA-Z]{0,20}$");
var res=pattern.test(str);
if(!res)
	document.getElementById("fmsg").innerHTML="<span style='color:red'>Invalid First Name</span>";
else
	document.getElementById("fmsg").innerHTML="<span style='color:green'>Valid First Name</span>";	
}
/////////////////////////////////////////////////////////////////////////////////////////////

function validateMiddleName(){
var str=document.getElementById("mname").value;
var pattern=new RegExp("^[&a-zA-Z]{0,20}$");
var res=pattern.test(str);
if(!res)
	document.getElementById("mmsg").innerHTML="<span style='color:red'>Invalid Middle Name</span>";
else
	document.getElementById("mmsg").innerHTML="<span style='color:green'>Valid Middle Name</span>";	
}

/////////////////////////////////////////////////////////////////////////////////////////////

function validateLastName(){
var str=document.getElementById("lname").value;
var pattern=new RegExp("^[&a-zA-Z]{0,20}$");
var res=pattern.test(str);
if(!res)
	document.getElementById("lmsg").innerHTML="<span style='color:red'>Invalid Last Name</span>";
else
	document.getElementById("lmsg").innerHTML="<span style='color:green'>Valid Last Name</span>";	
}

/////////////////////////////////////////////////////////////////////////////////////////////

function validateAddress(id1,id2){
var str=document.getElementById(id1).value;
var pattern=new RegExp("^[&a-zA-Z0-9\\s/]{0,50}$");
var res=pattern.test(str);
if(!res)
document.getElementById(id2).innerHTML="<span style='color:red'>Invalid Address</span>";
else
document.getElementById(id2).innerHTML="<span style='color:green'>Valid Address</span>";	
}

/////////////////////////////////////////////////////////////////////////////////////////////

function validateCity(){
var str=document.getElementById('city').value;
var pattern=new RegExp("^[&a-zA-Z]{0,50}$");
var res=pattern.test(str);
if(!res)
document.getElementById('citymsg').innerHTML="<span style='color:red'>Invalid City</span>";
else
document.getElementById('citymsg').innerHTML="<span style='color:green'>Valid City</span>";	
}
/////////////////////////////////////////////////////////////////////////////////////////////

function validateOnSubmit(){
var str=document.getElementById("title").value;
var pattern=new RegExp("^[&0-9a-zA-Z\\s]{0,50}$");
var res1=pattern.test(str);
if(!res1)
	window.alert('Not Valid Title');

var str=document.getElementById("isbn").value;
var pattern=new RegExp("^[0-9]{0,13}$");
var res2=pattern.test(str);
if(!res2)
	window.alert('Not Valid ISBN');

var str=document.getElementById("author").value;
var pattern=new RegExp("^[&a-zA-Z\\s]{0,100}$");
var res3=pattern.test(str);
if(!res3)
	window.alert('Not Valid Author');
	
var str=document.getElementById("price").value;
var pattern=new RegExp("^[0-9\.]{0,10}$");
var res4=pattern.test(str);
if(!res4)
	window.alert('Not Valid Price');
		
var str=document.getElementById("pubname").value;
var pattern=new RegExp("^[&a-zA-Z\\s]{0,50}$");
var res5=pattern.test(str);
if(!res5)
	window.alert('Not Publisher Name');	
	
return res1 && res2 && res2 && res3 && res4 && res5;	
}// JavaScript Document

/////////////////////////////////////////////////////////////////////////////////////////////
function validateMemberIDOnSubmit(){
var str=document.getElementById("memberid").value;
var pattern=new RegExp("^[0-9]{1,5}$");
var res1=pattern.test(str);
if(!res1)
	window.alert('Not Valid MemberID');

return res1;	
}// JavaScript Document

/////////////////////////////////////////////////////////////////////////////////////////////
function validatePasswordOnSubmit(){
var pass1=document.getElementById("pass1").value;
var pass2=document.getElementById("pass2").value;
if(pass1!=pass2)
	window.alert('Password Not Matched');

return pass1==pass2;	
}// JavaScript Document
