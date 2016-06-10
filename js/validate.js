$(document).ready(function() {
	// your js code goes here...
	$("#username").after("<span id=\"uspan\"> </span>");	
	$("#password").after("<span id=\"pspan\"> </span>");
	$("#email").after("<span id=\"espan\">  </span>");
	
	$(".signup [name='username']").focus(function(){
		$("#uspan").show();
		$("#uspan").removeClass();
		$("#uspan").addClass("info");
		$("#uspan").text("Please enter the Username containing only alphabetical or numeric characters.");	
	});
	
	$(".signup [name='username']").blur(function(){
		var username=$(this).val();
		if(username===""){
			$("#uspan").hide();			
		}
		else{
			if(/^[a-z0-9]+$/i.test(username)){
				$("#uspan").removeClass();
				$("#uspan").text("OK");
				$("#uspan").addClass("ok");
			}
			else{
				$("#uspan").removeClass();
				$("#uspan").addClass("error");					
				$("#uspan").text("Error");
			}
		}
	});

	$(".signup [name='password']").focus(function(){
		$("#pspan").show();
		$("#pspan").removeClass();
		$("#pspan").addClass("info");
		$("#pspan").text("Please enter the Password containing at least 8 characters.");	
	});

	$(".signup [name='password']").blur(function(){
		var password=$(this).val();
		var num=password.length;
		if(num==0){
			$("#pspan").hide();
		}
		else{
			if(num>=8){
				$("#pspan").removeClass();
				$("#pspan").addClass("ok");
				$("#pspan").text("OK");			
			}
			else{
				$("#pspan").removeClass();
				$("#pspan").addClass("error");				
				$("#pspan").text("Error");							
			}		
		}	
	});	
	
	$(".signup [name='email']").focus(function(){
		$("#espan").show();
		$("#espan").removeClass();
		$("#espan").text("Please enter valid email id containing a @ character.");
		$("#espan").addClass("info");	
	});
		
	$(".signup [name='email']").blur(function(){
		var email=$(this).val();
		if(email.length==0){
			$("#espan").hide();		
		}
		else{
			if(email.indexOf('@')===-1){
				$("#espan").removeClass();			
				$("#espan").addClass("error");				
				$("#espan").text("Error");			
			}
			else{
				$("#espan").removeClass();				
				$("#espan").addClass("ok");
				$("#espan").text("OK");			
			}		
		}
	});
	
});
