<html>
	<head>
		<title>ChatSpace</title>
		<link rel="shortcut icon" href="extra/img/favicon.ico" >
		<script type="text/javascript" src="extra/js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="extra/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="extra/js/material.min.js"></script>
		<script type="text/javascript" src="extra/js/ripples.min.js"></script>
		<script type="text/javascript" src="extra/js/chatroom.js"></script>
		<link rel="stylesheet" type="text/css" href="extra/css/chatroom.css">
		<link rel="stylesheet" type="text/css" href="extra/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="extra/css/ripples.min.css">
		<link rel="stylesheet" type="text/css" href="extra/css/material-wfont.min.css">
		<script>
            $(document).ready(function() {
                $.material.init();
            });
        </script>
	</head>
	<body>
		<?php
			require_once("connectMsg.php");
		?>
		<nav class="navbar navbar-default" role="navigation" id="navbar">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">ChatSpace</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
            								<li><a href="#">Action</a></li>
            								<li><a href="#">Another action</a></li>
            								<li><a href="#">Something else here</a></li>
            								<li class="divider"></li>
            								<li><a href="#">Separated link</a></li>
          							</ul>
        						</li>
      					</ul>
    				</div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>
		<div id="postPanel" class="pnl">
			<div id="postForm">
				<div id="postFormTitleBox">
					<span id="postFormTitle">Share your status</span>
				</div>
				<div id="postFormDiv">
                				<textarea class="form-control" rows="3" id="textArea"></textarea>
				</div>
				<div id="postFormPrivate">
					<div class="checkbox">
                    					<label>
                        						<input type="checkbox" id="isAnonymous"> 偷偷說
 					             </label>
                				</div>
				</div>
				<div id="postFormSubmit">
					<a href="javascript:void(0)" class="btn btn-primary" id="shareBtn">Share</a>
				</div>
				<div class="cleaner"></div>
			</div>
			<div id="postBox">
			</div>
		</div>
		<div id="chatPanel" class="pnl">
			<div id="msgPanel"><div id="msgPanelFooter"></div></div>
			<div id="senderPanel">
				<div id="textBox">
					<textarea class="form-control" id="msgingArea" placeholder=" Message..." rows="1"></textarea>
				</div>
				<div id="submitArea">
					<a href="javascript:void(0)" class="btn btn-primary" id="submitBtn">Submit</a>
				</div>
				<div class="cleaner"></div>
			</div>
		</div>
	</body>
</html>