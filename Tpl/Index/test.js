var name = "zhang";
var age = 20;
var school = "uestc"

$.post("php",{name : name, age : age , school : school},function(data){
	alert(data);
})