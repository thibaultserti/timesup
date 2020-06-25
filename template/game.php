<script type="text/javascript" src="javascript/script.js"></script>
<script src="javascript/jquery-3.5.1.min.js"></script>

<script>
$(document).ready(function(){
    $("input").keyup(function(contexte){
        if (contexte.which == 13) {
            var msg = $("input").val();
            sendMsg(msg);
    }
    });
});

function sendMsg(msg){
    if(msg !=""){
        console.log(msg);
        $.ajax({
            url : "chat.php",
            type : "POST",
            data : "msg=" + msg
        });
        $('#messages').append("<tr><td class=\"td-name\">" + "Erik" + "</td><td class=\"td-chat\">" + msg + "</td></tr>"); // on ajoute le message dans la zone prévue
    }
};


</script>



<div>
    <h1>Invite tes amis !</h1>
    <div class="box-timer">
        <img src="img/timer.svg">
        <span id="remainingTime" onclick="setTimer(<?php echo getTimer($_SESSION['gameId'])[0]['duration'] ?>000)"> 
			<?php echo getTimer($_SESSION['gameId'])[0]['duration'] ?>s
		</span>
    </div>
</div>
<section>
    <div class="box">
        <table>
            <tbody>
				<?php
					echo inGameUserList($_SESSION['gameId']);
				?>
            </tbody>
        </table>
    </div>

    <div class="box">
        <table class="leaderboard">
            <tbody id ="messages">
                <tr>
                    <td class="td-name">Erik</td>
                    <td class="td-chat">Lorem</td>
                </tr>
                <tr>
                    <td class="td-name">Alvin</td>
                    <td class="td-chat">Lorem ipsum dolo</td>
                </tr>
            </tbody>
        </table>
	    <input type="text" class="message" placeholder="Tapez votre réponse">
    </div>

</section>

<?php
require_once 'footer.php'
?>
