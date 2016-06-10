$(document).ready(function() {
alert("validting1");
$("#Search" ).click(function() {
alert("validting2");
    var inputVal = $("#section_id").val();
	if($("#section_id").val().length<1)
	{
	alert("validting3");
	$("#sectiondiv").show();
	$("#sectiondiv").text("section id cannot be empty");
	flag=0;
	}
  }
}