$(document).ready(function(){
	getMessage(Date.now());
	$("#submitBtn").click(function(){
		sendMessage();
	});

	$("#msgingArea").keydown(function(event){
		if(event.keyCode == 13 ){
			event.preventDefault();
			sendMessage();
		}
	});
});

function sendMessage(){
	if($("#msgingArea").val() != ""){
		$.ajax({
			type: "POST",
			url: "saveMsg.php",
			data:{
				"content": $('#msgingArea').val(),
				"timestamp": Date.now()
			},
			success:function(){
				$('#msgingArea').val("");
			},
			error:function(){
				alert("Error");
			}
		},"json");
	}
}

function getMessage(timestamp){
	$.ajax({
		type: "POST",
		url: "polling.php",
		data:{
			"timestamp": timestamp
		},
		success:function(data){
			var jsonObj = jQuery.parseJSON(data);
			console.log(jsonObj);
			getMessage(jsonObj[ Object.keys(jsonObj).length - 1].time);
			for (var i = 0; i < Object.keys(jsonObj).length; i++){
				insertMessage(jsonObj[i].id, jsonObj[i].content, jsonObj[i].time);
			};
		},
		error:function(){
			console.log("error");
		}
	},"json");
}

function insertMessage(id, content, timestamp){
	var box='<div class="msgBody" id="'+ id +'">\
				<div class="msgText">'+content+'</div>\
				<div class="msgTime"><span class="timeSpan">'+formatTime(timestamp)+'</span></div>\
				<div class="cleaner"></div>\
			</div>';

	$("#msgPanelFooter").before(box);
	var target = document.getElementById(id);
	$("#"+id).fadeIn();
}

function formatTime(timestamp){
	var t = new Date(Number(timestamp));
	var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
	var month = months[t.getMonth()];
	var date = t.getDate();
  	var hour = t.getHours();
  	var min = t.getMinutes();
  	var time = month + '-' + date + ' ' + hour + ':' + min;
  	return time;
}