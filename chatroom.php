<html>
	<head>
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
		<div id="rootPanel">
			<div id="msgPanel"></div>
			<div id="senderPanel">
				<div id="textBox">
					<input class="form-control" id="msgingArea" placeholder="Message...">
				</div>
				<div id="submitArea">
					<a href="javascript:void(0)" class="btn btn-primary" id="submitBtn">Submit</a>
				</div>
				<div class="cleaner"></div>
			</div>
		</div>
	</body>
</html>