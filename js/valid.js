$(document).ready(function() {
$('#button').hide();

var flag,flag1,flag2,flag3,flag4,flag5;
$('input[type=password]').keyup(function() {
    // keyup code here
	flag,flag1,flag2,flag3,flag4,flag5=0;
	var pswd = $(this).val();
	if ( pswd.length < 8 ) {
    $('#length').removeClass('valid').addClass('invalid');
	flag=0;
} else {
    $('#length').removeClass('invalid').addClass('valid');
	flag=1;
}
//validate letter
if ( pswd.match(/[A-z]/) ) {
    $('#letter').removeClass('invalid').addClass('valid');
	flag1=1;
} else {
    $('#letter').removeClass('valid').addClass('invalid');
	flag1=0;
}

//validate capital letter
if ( pswd.match(/[A-Z]/) ) {
    $('#capital').removeClass('invalid').addClass('valid');
	flag2=1;
} else {
    $('#capital').removeClass('valid').addClass('invalid');
	flag2=0;
}
//validate characters
if ( pswd.match(/[_\-!\"@;,.:]/) ) {
    $('#character').removeClass('invalid').addClass('valid');
	flag3=1;
} else {
    $('#character').removeClass('valid').addClass('invalid');
	flag3=0;
}

//validate number
if ( pswd.match(/\d/) ) {
    $('#number').removeClass('invalid').addClass('valid');
	flag4=1;
} else {
    $('#number').removeClass('valid').addClass('invalid');
	flag4=0;
}
flag5=flag+flag1+flag2+flag3+flag4;
if(flag5!=5){
$('#button').hide();
}
else{
$('#button').show();
}
}).focus(function() {
    $('#pswd_info').show();
	
}).blur(function() {
    $('#pswd_info').hide();
	
});





});