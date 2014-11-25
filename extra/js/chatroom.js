var msgPanel;
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

	msgDiv = document.getElementById("msgPanel");
});

function sendMessage(){
	var message = $("#msgingArea").val();
	if(message != ""){
		$.ajax({
			type: "POST",
			url: "saveMsg.php",
			data:{
				"content": message,
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
			msgDiv.scrollTop = msgDiv.scrollHeight;
		},
		error:function(){
			console.log("error");
		}
	},"json");
}

function insertMessage(id, content, timestamp){
	if(urlCheck(content)){
		if (youtubeUrlCheck(content)) {
			content = makeYoutubePlayer(content);
		}else{
			content = makeHyperLink(content);
		}
	}
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

function urlCheck(str){
	var isUrl = false;
	if (str.indexOf("http://") > -1 || str.indexOf("https://") > -1) {
		isUrl = true;
	}
	return isUrl;
}

function youtubeUrlCheck(str){
	var isYoutubeUrl = false;
	if(str.indexOf("https://www.youtube.com/watch") > -1){
		isYoutubeUrl = true;
	}
	return isYoutubeUrl;
}

function makeHyperLink(str){
	str = str.replace(/(https:\/\/[\S]+)/, "<a href='$1' target='_blank'>$1</a>");
	str = str.replace(/(http:\/\/[\S]+)/, "<a href='$1' target='_blank'>$1</a>");
	return str;
}

function makeYoutubePlayer(content){
	var youtubeUrl;
	var hyperLinkContent;
	hyperLinkContent = makeHyperLink(content);
	content = content.replace("watch?v=", "embed/");
	playerSrc = content.match(/https:\/\/www\.youtube\.com\/embed[\S]+/);
	content = hyperLinkContent + "\n" + "<iframe width='560' height='315' src='"+playerSrc+"' frameborder='0' allowfullscreen></iframe>";
	return content;
}