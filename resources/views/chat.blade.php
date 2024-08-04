<!-- resources/views/chat.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socket.IO Laravel Example</title>
    <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="messages">
        <ul id="message-list"></ul>
    </div>
    <form id="message-form">
        <input type="text" id="message-input" autocomplete="off">
        <button type="submit">Send</button>
    </form>
    <script>
        var socket = io('{{ env("SOCKET_IO_SERVER") }}');

        $('#message-form').submit(function(e) {
            e.preventDefault();
            var message = $('#message-input').val().trim();
            if (message.length > 0) {
                socket.emit('chat message', message);
                $('#message-input').val('');
            }
        });

        socket.on('chat message', function(msg) {
            $('#message-list').append($('<li>').text(msg));
            window.scrollTo(0, document.body.scrollHeight);
        });
    </script>
</body>
</html>