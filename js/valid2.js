
$(document).ready(function() {
$('#button').hide();
	
	$("#firstname").after("<span id=\"fspan\" class=\"redbold\"> </span>");
	$("#department").after("<span id=\"dspan\" class=\"redbold\"> </span>");
	$("#username").after("<span id=\"uspan\" class=\"redbold\"> </span>");	
	//$("#password").after("<span id=\"pspan\" class=\"redbold\"> </span>");
	$("#email").after("<span id=\"espan\" class=\"redbold\">  </span>");
    
	var x_timer;
	var flag,flag1,flag2;//flags for username
	var flags,flags1,flags2;//flags for email
	var flagf;//flag for firstname
	var flagd;//flag for department
	var flagp,flagp1,flagp2,flagp3,flagp4,flagp5; //flags for password
	var characterReg = /^\s*[a-zA-Z0-9,\s]+\s*$/;  
    
	flagp,flagp1,flagp2,flagp3,flagp4,flagp5=0;	
	flag,flag1,flag2=0;
	flags2,flags1,flags=0;
	flagf=0;
	flagd=0;
/*	
	$("#firstname").focus(function() {
	   $("#fspan").show();
		$("#fspan").text("name must contain only character.");	
	});
	*/
	$("#firstname").blur(function(){
		var fname=$(this).val();
		if(fname.length==0){
			$("#fspan").show();
			$("#fspan").text("name cannot be empty");	
				//flags1=0;
				flagf=0;
		}
		else
		{
		$("#fspan").hide();
		flagf=1;
		}
		});
		
	/*	
		$("#department").blur(function(){
		var dname=$(this).val();
		if (!$("#departments option:selected").length) {
			$("#dspan").show();
			$("#dspan").text("must select a department");	
				//flags1=0;
				flagd=0;
		}
		else
		{
		$("#dspan").hide();
		flagd=1;
		}
		});
	*/
	
	
	
	$( "#username" ).focus(function() {
	    $("#uspan").show();
		$("#uspan").text("Please enter the Username containing only alphabetical or numeric characters.");	
	});
	
	$( "#username" ).blur(function() {
    var inputVal = $("#username").val();
	if($("#username").val().length<1)
	{
	$("#uspan").show();
	$("#uspan").text("username cannot be empty");
	flag=0;
	}
	else{flag=1;}
    if(!characterReg.test(inputVal)) {
	flag1=0;
	$("#uspan").show();
	$("#uspan").text("error must contain only alphabetical and numeric characters");
	}
	else{flag1=1;}
	
	flag2=flag+flag1;
	if(flag2!=2)
	{$("#uspan").show;
	$("#uspan").text("invalid");
	$('#button').hide();}
	else{
	//$("#1").remove();
	$("#uspan").hide();
    
	//$('#button').show();	 
	}

   });
   $("#username").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_username_ajax(user_name);
        }, 1000);
    }); 
function check_username_ajax(username){
    $("#user-result").html('<img src="ajax-loader.gif" />');
    $.post('username-checker.php', {'username':username}, function(data) {
      $("#user-result").html(data); 
       
    });
}





//password validation checks 

$('input[type=password]').keyup(function() {
    // keyup code here
	
	var pswd = $(this).val();
	if ( pswd.length < 8 ) {
    $('#length').removeClass('valid').addClass('invalid');
	flagp=0;
} else {
    $('#length').removeClass('invalid').addClass('valid');
	flagp=1;
}
//validate letter
if ( pswd.match(/[A-z]/) ) {
    $('#letter').removeClass('invalid').addClass('valid');
	flagp1=1;
} else {
    $('#letter').removeClass('valid').addClass('invalid');
	flagp1=0;
}

//validate capital letter
if ( pswd.match(/[A-Z]/) ) {
    $('#capital').removeClass('invalid').addClass('valid');
	flagp2=1;
} else {
    $('#capital').removeClass('valid').addClass('invalid');
	flagp2=0;
}
//validate characters
if ( pswd.match(/[_\-!\"@;,.:]/) ) {
    $('#character').removeClass('invalid').addClass('valid');
	flagp3=1;
} else {
    $('#character').removeClass('valid').addClass('invalid');
	flagp3=0;
}

//validate number
if ( pswd.match(/\d/) ) {
    $('#number').removeClass('invalid').addClass('valid');
	flagp4=1;
} else {
    $('#number').removeClass('valid').addClass('invalid');
	flagp4=0;
}
flagp5=flagp+flagp1+flagp2+flagp3+flagp4;
if(flagp5!=5){
$('#button').hide();
}
else{
//$('#button').show();
//flagp=1;
}
}).focus(function() {
    $('#pswd_info').show();
	
}).blur(function() {
    $('#pswd_info').hide();
	
});






$("#email").focus(function() {
	    $("#espan").show();
		$("#espan").text("Please enter valid email id containing a @ character.");	
	});
	
	$("#email").blur(function(){
		var email=$(this).val();
		if(email.length==0){
			$("#espan").show();
			$("#espan").text("email cannot be empty");	
				flags1=0;
		}
		else{
			flags1=1;
			if(email.indexOf('@')===-1){			
				$("#espan").show
				$("#espan").text("error no @ present");		
					flags2=0;
			}
			else{
				$("#espan").hide();
				flags2=1;
			}		
		}
		flags=flags2+flags1+flag2+flagp5+flagf;
//var flagcheck=0;
if(flags!=10)
{
//flagcheck=1;
//}
//if(flagcheck==1)
$('#button').hide();
}
else
{
$('#button').show();
}
});

	
var y_timer;    
    $("#email").keyup(function (e){
        clearTimeout(y_timer);
        var email_check = $(this).val();
        y_timer = setTimeout(function(){
            check_email_ajax(email_check);
        }, 1000);
    }); 

function check_email_ajax(email){
    $("#email-result").html('<img src="ajax-loader.gif" />');
    $.post('username-checker.php', {'email':email}, function(data) {
      $("#email-result").html(data);
    });
}






});
