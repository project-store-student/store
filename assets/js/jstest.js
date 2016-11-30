$(function(){

	alert("Ddd");
	$( "#btnsave" ).click(function() {
		//alert("ggg");
		var user = $("#username").val().trim();
		var email = $("#email").val().trim();
		var pw = $("#password").val().trim();
		var pwconf = $("#password_confirm").val().trim();
		//alert(user);
		// if( user == "" || email == "" || pw == "" || pwconf == "" ){
		// 		alert("ว่างโว้ยยย");
		// 		return false;
		// }else{
		// 	$("#frminsert").submit();
		// }
//-------------------------------- LOOP-----------------------------------
var sum =0 ;
		$('#username, #email, #password, #password_confirm').each(function() {
			if($(this).val() == ""){
				$(this).addClass('error');
				sum++;	
			}else{
				$(this).removeClass('error');
			}
		});
		if(sum > 0){
			sum = 0;
			alert("กรุณากรอกข้อมูลให้ครบ");
			return false;
		}else{
			if(pw == pwconf){
				$("#frminsert").submit();
			}else{
				alert("รหัสผ่านไม่ตรงกัน");
				return false;
			}
			
		}
 		
});	

$( "#btnsaveproduct" ).click(function() {
	var sumpro =0 ;
	$('#txtid, #txtname, #txtprice, #txtamount').each(function() {
			if($(this).val() == ""){
				$(this).addClass('error');
				sumpro++;	
			}else{
				$(this).removeClass('error');
			}
		});
		if(sumpro > 0){
			alert("กรุณากรอกข้อมูลให้ครบ");
			sumpro = 0;
			return false;
		}else{
				$("#frminsertproduct").submit();
			}
			
		
});
$( "#btneditproduct" ).click(function() {
	var sumpro =0 ;
	$('#txtid, #txtname, #txtprice, #txtamount').each(function() {
			if($(this).val() == ""){
				$(this).addClass('error');
				sumpro++;	
			}else{
				$(this).removeClass('error');
			}
		});
		if(sumpro > 0){
			alert("กรุณากรอกข้อมูลให้ครบ");
			sumpro = 0;
			return false;
		}else{
				$("#frmeditproduct").submit();
			}
			
		
});	

$( "#btnlogin" ).click(function() {

alert("Hello");

});


});
