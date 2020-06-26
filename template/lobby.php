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
            <p id="news">Le site est terminé !</p>

            <h1><a href="#apropos">À propos</a></h1>
            <p id="apropos">Ce site a été développé par Thibault AYANIDES, Aymeric CÔME, Georges LE BELLIER, Nicolas ROLIN et Nino SEGALA</p>

            <h1><a href="#rules">Règles du jeu</a> </h1>
            <p id="rules">
            Vous pouvez jouer à une version simplifiée de Time’s up. Assurez-vous tout d’abord d’être relié vocalement avec les autres joueurs. On joue avec 40 mots appartenant à la catégorie choisie.
Chaque mot deviné vous rapporte +2 points et chaque mots que vous avez fait deviner vous rapporte +1 point. Lorsqu’un mot est deviné, il est retiré du tas de carte. Les manches se terminent lorsque les 40 cartes ont été devinées.
Dans la manche 1, chaque tour dure autant de secondes que choisi dans les paramètres de la partie. Il faut essayer de faire deviner / deviner autant de mots que possible ! C’est le premier joueur qui trouve la réponse qui gagne des points. Attention, il est interdit de prononcer des mots de la même famille, qui sonnent pareil, de traduire le mot ou de l’épeler. Les joueurs ont le droit à autant de propositions qu’ils le souhaitent.
Dans la manche2, on joue avec les mêmes 40 cartes qu’à la manche 1. Attention, on n’a plus le droit qu’à un seul mot pour faire deviner la réponse ! Et chaque joueur n’a le droit qu’à une seule proposition.
Le gagnant est le joueur qui a amassé le plus de points sur la manche 1 et 2.
            </p>
        </div>
    </div>
</section>