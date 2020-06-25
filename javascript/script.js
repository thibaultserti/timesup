//On change l'avatar choisi lorsqu'on clique sur les flèches gauche ou droite
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
    }
}