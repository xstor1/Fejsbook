let header = document.getElementById("header");
header.innerHTML = "All Profiles";
let MyId = sessionStorage.getItem("Myid");
let MyEmail = sessionStorage.getItem("MyEmail");
let MyToken = sessionStorage.getItem("token");
let friends;
let profiles;



$.post(".//API//GET_ALL_FRIENDS.php", {id: MyId, Email: MyEmail, Token: MyToken, device_id: 'WEB'})

        .done(function (data)
        {

            friends = JSON.parse(data);
            console.log(friends);
            $.post(".//API//GET_ALL_PROFILES.php")
        .done(function (data) {
           
            profiles = JSON.parse(data);
            console.log(profiles);
            /*main proces*/
            for (let i = 0; i < profiles.length; i++) {
    
        let main = document.getElementById('page-content');
        let card = document.createElement('div');
        card.classList.add('card');
        let img = document.createElement('img');
        img.src = "./images/team2.jpg";
        img.classList.add("width");
        
        card.appendChild(img);
        let h1 = document.createElement('h1');
        h1.innerHTML = profiles[i].Name + " " + profiles[i].Surname;
        card.appendChild(h1);
        let title = document.createElement('p');
        title.classList.add('title');
        title.innerHTML = profiles[i].Email;
        card.appendChild(title);
        let born = document.createElement('p');
        born.innerHTML = profiles[i].BornDate;
        card.appendChild(born);
        let sex = document.createElement('p');
        if (profiles[i].Sex == 0)
        {
            sex.innerHTML = "female";
        } else
        {
            sex.innerHTML = "male";
        }
        card.appendChild(sex);
        let btn = document.createElement('button');
        if (profiles[i].ID === MyId)
        {
            btn.innerHTML = "That's you";
        } else {
            btn.innerHTML = "Add friends";
             btn.setAttribute("onClick", "javascript: addfriend("+profiles[i].ID+")");
            for (let y = 0; y < friends.length; y++) {
                if (profiles[i].ID === friends[y].IDProfile1 || profiles[i].ID === friends[y].IDProfile2)
                {
                    btn.innerHTML = "Already your friend";
                    btn.removeAttribute("onClick");

                }
                
            }

        }
        card.appendChild(btn);
        main.appendChild(card);
    }
        });
        });

    function addfriend(id)
{
    $.post(".//API//ADD_FRIEND.php", {id: MyId,idFriend:id, Email: MyEmail, Token: MyToken, device_id: 'WEB'});
      window.location.replace("./AllProfiles.html");
}

