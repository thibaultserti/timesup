<script type="text/javascript" src="javascript/script.js">

</script>

<div>
    <h1>Invite tes amis !</h1>
    <div class="box-timer">
        <img src="img/timer.svg">
        <span id="remainingTime"> 2h30 </span>
    </div>
</div>
<section>
    <div class="box">
        <table>
            <tbody>
				<?php
					echo inGameUserList($_SESSION['gameId']);
					/*
					<tr>
						<td class="td-rank">1</td>
						<td class="td-points">Erik <br> 2200pts</td>
						<td class="td-speak"><img src="img/speaker.svg" id="speaker"></td>
						<td class="td-avatar"><img src="img/avatars/pig.svg" class="avatar"></td>
					</tr>
					<tr>
						<td class="td-rank">2</td>
						<td class="td-points">Alvin<br> 2100pts</td>
						<td class="td-speak"></td>
						<td class="td-avatar"><img src="img/avatars/dog.svg" class="avatar"></td>
					</tr>
					*/
				?>
            </tbody>
        </table>
    </div>

    <div class="box">
        <table class="leaderboard">
            <tbody>
                <tr>
                    <td class="td-name">Erik</td>
                    <td class="td-chat">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus nobis eaque, atque neque eius modi labore consequuntur doloribus facere vel minus eligendi placeat, rem architecto facilis iste? Unde, nihil alias?</td>
                </tr>
                <tr>
                    <td class="td-name">Alvin</td>
                    <td class="td-chat">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum officiis ad, illum voluptatum, sed in ratione dolore molestias omnis earum at itaque, hic odio sunt voluptatibus iusto aperiam velit unde.</td>
                </tr>
            </tbody>
        </table>
        <input type="text" class="message" placeholder="Tapez votre réponse">

    </div>
    <!--timer de 30 secondes lorsqu'on clique sur le bouton qui fait commencer un tour-->
    <button onclick="setTimer(30000)">Test Timer</button>

</section>

<?php
require_once 'footer.php'
?>
