var websocket = new WebSocket("ws://localhost:8090/demo/php-socket.php");
function postSocket(a,b) {
    
    var messageJSON = {
        chat_user: a,
        chat_message: b
      };
      websocket.send(JSON.stringify(messageJSON));
}

export {postSocket}