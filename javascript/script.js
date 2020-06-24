function changeAvatar(arrow) {
    console.log("change the avatar");
    //"endBoucle" est utilisé pour transformé 'zebra' en 'bear'
    //suppression de 'dog2' (identique à 'dog') car cela pose des problèmes (dog2 -> deer2)
    var avatarListRight = ["endBoucle", "zebra", "racoon", "rabbit", "pig", "panda", "mouse", 
    "monkey", "horse", "fox", "elephant", "dog", "deer", "cat", "beaver", "bear", "endBoucle"];
    var avatarListLeft = ["endBoucle", "zebra", "bear", "beaver", "cat", "deer", "dog",
    "elephant", "fox", "horse", "monkey", "mouse", "panda", "pig", "rabbit", "racoon", "endBoucle"];
    var avatarList = avatarListRight;
    if (arrow.id=="arrow1") {
        var avatarList = avatarListLeft;
    }
    for (var i=0; i<avatarList.length; i++) {
        document.getElementById("avatar").src = avatar.src.replace(avatarList[i+1], avatarList[i]);
    }

}