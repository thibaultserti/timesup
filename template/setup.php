<section>
    <div>
        <h1> Paramètres </h1>
        <div class="box">
            <form action="controller.php" class="box-container">
				<select name="category" id="">

					<option value="animal">Animaux</option>
					<option value="objet"> Objets</option>
					<option value="acteur">Acteur.trices</option>
				</select>
                <select name="maxPoints" id="">

                    <option value="100">100 points</option>
                    <option value="90">90 points</option>
                    <option value="80">80 points</option>
                </select>
                <select name="maxTime" id="">

                    <option value="30">30s</option>
                    <option value="25">25s</option>
                    <option value="20">20s</option>
                </select>
                <textarea name="" id="" cols="30" rows="10" placeholder="Description de la partie"> 
				</textarea>
                <button name="action" value="SetupAndPlay">Lancer la partie</button>
            </form>
        </div>
    </div>
    <div>
        <h1> Joueurs </h1>
        <div class="box">
            <div class="avatars">
				<?php
					echo inSetupUserList($_SESSION['gameId']);
					/*
					<figure>
						<img src="img/avatars/dog.svg" class="avatar">
						<figcaption>Alvin</figcaption>
					</figure>
					<figure>
						<img src="img/avatars/deer.svg" class="avatar">
						<figcaption>Ashka</figcaption>
					</figure>
					<figure>
						<img src="img/avatars/panda.svg" class="avatar">
						<figcaption>Dergawi</figcaption>
					</figure>
					<figure>
						<img src="img/avatars/cat.svg" class="avatar">
						<figcaption>Erik</figcaption>
					</figure>
					<figure>
						<img src="img/avatars/horse.svg" class="avatar">
						<figcaption>Javisty</figcaption>
					</figure>
					*/
				?>
            </div>
        </div>
    </div>
</section>
<div>
    <h1>Invite tes amis !</h1>
    <div class="box-invitation">
        <a id="link-invitation">https://timesup.rezoleo.fr/</a>
        <a id="link-invitation-hover">Survole pour voir le lien !</a>
        <button id="button-copy">Copier le lien</button>
    </div>
</div>