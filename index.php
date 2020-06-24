<?php
require_once 'header.php'
?>
<section>
    <div class="box">
        <form action="" class="box-container">
            <input type="text" placeholder="Pseudo">
            <select name="" id="">

                <option value="animal">Animaux</option>
                <option value="object"> Objets</option>
                <option value="actor">Acteur.trices</option>
            </select>

            <div class="box-avatars" id="avatars-container">
                <img src="img/arrow.svg" alt="arrow" class="arrow" id="arrow1">
                <img src="img/avatars/horse.svg" alt="avatar" class="avatar">
                <img src="img/arrow.svg" alt="arrow" class="arrow">
            </div>
            <button>Jouer</button>
            <button>Créer une partie</button>
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
<?php
require_once 'footer.php'
?>