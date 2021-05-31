<!DOCTYPE html>
<html lang="fr">
<body>
    <head>
        <link href="public/css/style.css" rel="stylesheet">
    </head>
    
    <header>
    </header>
    <main>
        <div id="showmsg">
        </div>
        <form id="chat" method="post" autocomplete="off">
            <textarea type="text" id="msg_zone" onfocus="clearContents(this);" name="msg"></textarea>
            <input type="submit" name="send" value="Send"/>
        </form>
    </main>
    <footer>
    </footer>
    <script type="text/javascript" src="public/js/chat.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
</body>
</html>