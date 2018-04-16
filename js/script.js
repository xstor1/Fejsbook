function writeUserData(userId, name, email, imageUrl) {
    firebase.database().ref('users/' + userId).set({
        username: name,
        email: email,
        profile_picture : imageUrl
    });
}
writeUserData(1,"Vojta","vojtastor32@gmail.com,kunda");
