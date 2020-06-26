<script type="text/javascript" src="javascript/script.js"></script>
<script src="javascript/jquery-3.5.1.min.js"></script>

<script>




$(document).ready(function(){
    getMessages();
    $("input").keyup(function(contexte){
        if (contexte.which == 13) {
            var msg = $("input").val();
            postMessage(msg);
            
    }
    });
});


function getMessages(){
    const rAjax = new XMLHttpRequest();
    rAjax.open("GET","chat.php");
    rAjax.onload = function(){
        const result = JSON.parse(rAjax.responseText);
        //console.log(result);

        const htmlStr = result.reverse().map(function(msg){
          return `
            <tr>
                <td class="td-name">${msg.pseudo}</td>
                <td class="td-chat">${msg.message}</td>
            </tr>
          
          
          
          `  
        }).join('');

        //console.log(htmlStr);
        //$('#messages').innerHTML= htmlStr;
        document.querySelector('#messages').innerHTML = htmlStr;
    }
    rAjax.send();

}


function postMessage(msg){
    event.preventDefault();
    const pseudo = "Erik";

    const data = new FormData();
    data.append('pseudo', pseudo);
    data.append('message', msg);

    const rAjax = new XMLHttpRequest();
    rAjax.open("POST","chat.php?task=write");
    console.log(data)
    rAjax.onload = function(){
        getMessages();
    }
    rAjax.send(data);

}




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
