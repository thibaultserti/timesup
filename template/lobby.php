<script type="text/javascript" src="javascript/script.js">

</script>

<section>
    <div class="box">
		<form action="controller.php" class="box-container">
			<?php
			include_once "libs/maLibUtils.php";
			$token = valider("token");
			echo "<input type=\"hidden\" name=\"token\" value=\"$token\" />" 
			?>
            <input name="pseudo" type="text" placeholder="Pseudo">
            <div class="box-avatars" id="avatars-container">
                <img src="img/arrow.svg" alt="arrow" class="arrow" id="arrow1" onClick="changeAvatar(this);">
                <img src="img/avatars/horse.svg" alt="avatar" class="avatar" id="avatar">
				<input name="avatar" type="hidden" value="horse" id="avatarName">
                <img src="img/arrow.svg" alt="arrow" class="arrow" onClick="changeAvatar(this);">
            </div>
            <button name="action" value="Play">Jouer</button>
            <button name="action" value="Create">Créer une partie</button>
        </form>
    </div>
    <div class="box">
        <div class="box-container">
            <h1><a href="#news">News</a></h1>
            <p id="news">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, error atque? Laboriosam aspernatur culpa expedita ea, eveniet at accusamus, hic corporis dolor quis excepturi animi, distinctio possimus quisquam rerum nisi.</p>

            <h1><a href="#apropos">À propos</a></h1>
            <p id="apropos">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam eius architecto nihil dolores quos dolor. Est ex praesentium minima saepe, minus quaerat, hic molestiae quam earum dolore vel. Soluta, dolores!</p>

            <h1><a href="#rules">Règles du jeu</a> </h1>
            <p id="rules">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, aperiam a obcaecati, ducimus tempore facere quas sapiente cupiditate neque iure iusto blanditiis quis dolor at! Culpa quasi sequi asperiores itaque!
            </p>
        </div>
    </div>
</section>