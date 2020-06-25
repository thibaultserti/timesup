function changeAvatar(arrow) {
    console.log("change the avatar");
    //"endBoucle" est utilisé pour transformé 'zebra' en 'bear'
    var avatarListRight = ["endBoucle", "zebra", "racoon", "pig", "panda", 
    "monkey", "horse", "fox", "elephant", "dog", "deer", "cat", "beaver", "bear", "endBoucle"];
    var avatarListLeft = ["endBoucle", "bear", "beaver", "cat", "deer", "dog",
    "elephant", "fox", "horse", "monkey", "panda", "pig", "racoon", "zebra", "endBoucle"];
    var avatarList = avatarListRight;
    if (arrow.id=="arrow1") {
        var avatarList = avatarListLeft;
    }
    for (var i=0; i<avatarList.length; i++) {
        document.getElementById("avatar").src = avatar.src.replace(avatarList[i+1], avatarList[i]);
    }

}