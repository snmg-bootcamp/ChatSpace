var msgPanel;
var userId;
var userName;
var userInfoObj;

$(document).ready(function(){
	userInfoObj = document.getElementById("userInfo");
	userName = userInfoObj.getAttribute("username");
	userId = userInfoObj.getAttribute("userid");

	getMessage(Date.now() - 86400000);
	getPost(Date.now() - 86400000);
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

	$("#shareBtn").click(function(){
		submitPost();
	});
	$("#postContainer").on("click",".postBox", function(){
		var postAuthor = $(this).find(".postAuthor").html();
		var postTime = $(this).find(".postTime").html();
		var postContent = $(this).find(".contentSpan").html();
		postModal(postAuthor, postTime, postContent);
	});
});

function sendMessage(){
	var message = $("#msgingArea").val();
	if(message != ""){
		$.ajax({
			type: "POST",
			url: "chatroom/saveMsg.php",
			data:{
				"author": userName,
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
		url: "chatroom/polling.php",
		data:{
			"timestamp": timestamp
		},
		success:function(data){
			var jsonObj = jQuery.parseJSON(data);
			console.log(jsonObj);
			getMessage(jsonObj[ Object.keys(jsonObj).length - 1].time);
			for (var i = 0; i < Object.keys(jsonObj).length; i++){
				insertMessage(jsonObj[i].id, jsonObj[i].author, jsonObj[i].content, jsonObj[i].time);
			};
			msgDiv.scrollTop = msgDiv.scrollHeight;
		},
		error:function(){
			console.log("error");
		}
	},"json");
}

function insertMessage(id, author, content, timestamp){
	if(urlCheck(content)){
		if (youtubeUrlCheck(content)) {
			content = makeYoutubePlayer(content);
		}else{
			content = makeHyperLink(content);
		}
	}
	if(author == userName){
		var box='<div class="msgBody" id="'+ id +'">\
				<div class="messageAuthorRight">'+author+'</div>\
				<div class="triangle-border right bubbleRight">\
					<div class="msgText">'+content+'</div>\
					<div class="msgTime"><span class="timeSpan">'+formatTime(timestamp)+'</span></div>\
					<div class="cleaner"></div>\
				</div>\
				<div class="cleaner"></div>\
			</div>';
	}else{
		var box='<div class="msgBody" id="'+ id +'">\
				<div class="messageAuthorLeft">'+author+'</div>\
				<div class="triangle-border left bubbleLeft">\
					<div class="msgText">'+content+'</div>\
					<div class="msgTime"><span class="timeSpan">'+formatTime(timestamp)+'</span></div>\
					<div class="cleaner"></div>\
				</div>\
				<div class="cleaner"></div>\
			</div>';
	}

	$("#msgPanelFooter").before(box);
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
	content = hyperLinkContent + "\n" + "<iframe width='300' height='200' src='"+playerSrc+"' frameborder='0' allowfullscreen></iframe>";
	return content;
}

function submitPost(){
	var author = userName;
	var content = $("#textArea").val();
	var isAnonymous = ( document.getElementById("isAnonymous").checked) ? 1 : 0;
	if(content != ""){
		$.ajax({
			type: "POST",
			url: "chatroom/savePost.php",
			data:{
				"author": author,
				"content": content,
				"isAnonymous": isAnonymous,
				"timestamp": Date.now()
			},
			success:function(data){
				$('#textArea').val("");
				var jsonObj = jQuery.parseJSON(data);
				console.log(jsonObj);
				if (jsonObj.dataQualified == true && jsonObj.queryStatus == true){
					showSuccessInfo();
				};
			},
			error:function(){
				alert("Error");
			}
		},"json");
	}
}

function insertPost(id, author, content, anonymous, postTime){
	author = (anonymous == 1) ? "Somebody..." : author;
	var box = "<div class='postBox' postId='"+id+"'>\
			<div class='titleBar' postId='"+id+"'>\
				<div class='postAuthor' postId='"+id+"'>"+author+"</div>\
				<div class='postTime' postId='"+id+"'>"+postTime+"</div>\
			</div>\
			<div class='contentBox' postId='"+id+"'><span class='contentSpan' postId='"+id+"'>"+content+"</span></div>\
			<div class='likeBox' postId='"+id+"'>\
				<span class='likeSpan' postId='"+id+"'><a class='likeBtn' postId='"+id+"'>Like</a></span>\
			</div>\
		</div>";
	$("#postContainer").prepend(box);
}

function getPost(timestamp){
	$.ajax({
		type: "POST",
		url: "chatroom/pollingPost.php",
		data:{
			"timestamp": timestamp
		},
		success:function(data){
			var jsonObj = jQuery.parseJSON(data);
			console.log(jsonObj);
			console.log(jsonObj.length);
			console.log(jsonObj[jsonObj.length-1].timestamp);
			for ( var i = 0; i < jsonObj.length; i++){
				insertPost(jsonObj[i].id, jsonObj[i].author, jsonObj[i].content, jsonObj[i].anonymous, formatTime(jsonObj[i].timestamp));
			}
			getPost( jsonObj[ jsonObj.length - 1 ].timestamp );
		},
		error:function(){
			console.log("error");
		}
	},"json");
}

function showSuccessInfo(){
	$("#successPosting").fadeIn();
	setTimeout( function(){$("#successPosting").fadeOut();} , 2000);
}

function postModal(postAuthor, postTime , postContent){
	$("#modalTitle").html(postAuthor);
	$("#modalTime").html(postTime);
	$("#modalContentSpan").html(postContent);
	$("#postDialog").modal("toggle");
}
