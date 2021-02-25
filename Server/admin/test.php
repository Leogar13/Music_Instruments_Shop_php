<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
<button id="frmChat" onclick="dd()">sdfasdf</button>
</body>
<script type="text/javascript">
	 

    var websocket = new WebSocket("ws://localhost:8090/demo/php-socket.php"); 
    // websocket.onopen = function(event) { 
    //   // showMessage("<p>hello</p>");
    //   // showMessage("<div class='chat-connection-ack'>Connection is established!</div>");   
    // }
    // websocket.onmessage = function(event) {
    //   var Data = JSON.parse(event.data);
    //   // showMessage("<div class='"+Data.message_type+"'>"+Data.message+"</div>");
    //   // $('#chat-message').val('');

    //   showMessage(Data.message);
    // };
    
    // websocket.onerror = function(event){
    //   showMessage("server not request");
    // };
    // websocket.onclose = function(event){
    //   // showMessage("<div class='chat-connection-ack'>Connection Closed</div>");
    // }; 
    
    function dd(){ 
      var messageJSON = {
        chat_user: "asdf",
        chat_message: "test"
      };
      websocket.send(JSON.stringify(messageJSON));
    };
	</script>
</html>