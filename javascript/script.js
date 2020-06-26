//On change l'avatar choisi lorsqu'on clique sur les flèches gauche ou droite

var pageTime;

function changeAvatar(arrow) { //pour index.php
    console.log("change the avatar");
    //avatarListRight est pour la flèche droite et avatarListLeft pour la flèche gauche
    //"endBoucle" est utilisé pour transformé 'zebra' en 'bear' (pour régler les problèmes de cycle)
    var avatarListRight = ["endBoucle", "zebra", "racoon", "pig", "panda", 
    "monkey", "horse", "fox", "elephant", "dog", "deer", "cat", "beaver", "bear", "endBoucle"];
    var avatarListLeft = ["endBoucle", "bear", "beaver", "cat", "deer", "dog",
    "elephant", "fox", "horse", "monkey", "panda", "pig", "racoon", "zebra", "endBoucle"];
    var avatarList = avatarListRight;
    if (arrow.id=="arrow1") {
        var avatarList = avatarListLeft;
    }
    for (var i=0; i<avatarList.length; i++) {
        //on essaye tous les changements possibles, seul celui qui nous intéresse est effectué
        document.getElementById("avatar").src = avatar.src.replace(avatarList[i+1], avatarList[i]);
        document.getElementById("avatarName").value = avatarName.value.replace(avatarList[i+1], avatarList[i]);
    }
}

//On démarre un timer de time secondes et on affiche le nombre de secondes restantes
function setTimer(time) { //pour game.php
    pageTime = time;
    //A la fin du timer on appelle la fonction qui gère la fin du tour
    setTimeout(endRound, time+1); //on ajoute 1 à time pour faire un dernier appel à setInterval
    //le temps restant (en seconde) + 1s (pour le premier appel à showtime)
    remainingTime = time/1000+1;
    //on affiche le temps restant toutes les secondes
    showTime();
    chrono = setInterval(showTime, 1000);
}

//On termine le tour
function endRound() {
    console.log("call to endRound");
    //On supprime l'affichage du temps restant
    clearInterval(chrono);

    //A compléter !!
    //Il faut gérer la fin du tour :
    //Mettre à jour les scores, les cartes restantes à faire deviner
    //Il faut changer l'équipe dont c'est le tour, le joueur qui doit parler
    //etc
    setTimer(pageTime);
}

//On affiche le temps
function showTime() {
    remainingTime -= 1;
    var chrono = remainingTime + "s";
    //console.log("chrono : " + chrono);
    document.getElementById("remainingTime").innerHTML = chrono;
}