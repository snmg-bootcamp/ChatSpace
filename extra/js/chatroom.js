$(document).ready(function(){
	$("#submitBtn").click(function(){
		if($("#msgingArea").val() != ""){
			$.ajax({
				type: "POST",
				url: "saveMsg.php",
				data:{
					"content": $('#msgingArea').val()
				},
				success:function(){
					alert("Success");
					$('#msgingArea').val("");
				},
				error:function(){
					alert("Error");
				}
			},"json");
		}
	});
});