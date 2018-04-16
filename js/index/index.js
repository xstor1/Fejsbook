let MyId = sessionStorage.getItem("Myid");
let MyEmail = sessionStorage.getItem("MyEmail");
let MyToken = sessionStorage.getItem("token");
var liket;

function like(id)
{
    let thumb = document.getElementById(id);
    if (thumb.getAttribute('like') === "true")
    {


        $.post(".//API//UnLike_IDProfile_IDPost.php", {id: MyId, Email: MyEmail, Token: MyToken, device_id: 'WEB', idpost: id});
        thumb.style = "color:black;";
        thumb.setAttribute('like', "false");
    } else
    {
        $.post(".//API//Like_IDProfile_IDPost.php", {id: MyId, Email: MyEmail, Token: MyToken, device_id: 'WEB', idpost: id});
        thumb.style = "color:red;";
        thumb.setAttribute('like', "true");
    }

}

function mymax(a)
{

    var m = 0;

    for (i = 0; i < a.length; ++i) {
        if (a[i].ID > m) {
            m = a[i].ID;
        }
    }

    return m;
}



$.ajaxSetup({async: true});
$.post(".//API//GET_POST_BY_ID_FROM_FRIENDS.php", {id: MyId, Email: MyEmail, Token: MyToken, device_id: 'WEB'})
        .done(function (data)
        {


            console.log(data);
            let obj = JSON.parse(data);
            for (i = 0; i < obj.length; i++)
            {

                $.ajax({type:'POST',url:".//API//isLiked.php", data:{id: MyId, Email: MyEmail, Token: MyToken, device_id: 'WEB', idpost: obj[i].ID},async:false})
                        .done(function (likes)
                        {

                            liket = likes;


                        });
              
                let main = document.getElementById('page-content');
                let colmd9 = document.createElement('div');
                colmd9.classList.add('post-preview');
                let mdlcard = document.createElement('h3');
                mdlcard.classList.add('post-title');
                mdlcard.innerHTML = obj[i].Title;
                colmd9.appendChild(mdlcard);
                let p = document.createElement('p');
                p.innerHTML = obj[i].Text;
                colmd9.appendChild(p);
                let meta = document.createElement('p');
                meta.classList.add('post-meta');
                console.log(liket);
                  console.log(obj[i]);
                if (liket == 'true')
                {
                    console.log('true probehlo');
                    meta.innerHTML = "<i style='color:red;' like='true' id='" + obj[i].ID + "' onclick='like(" + obj[i].ID + ");' class='fa fa-thumbs-up fa-2x'></i>    Posted by <a href='#' onclick='Profile(" + obj[i].IDProfile + ")'>" + obj[i].Name + " " + obj[i].Surname + "</a> on " + obj[i].Date;

                } else
                {
                    meta.innerHTML = "<i style='color:black;' like='false' id='" + obj[i].ID + "' onclick='like(" + obj[i].ID + ");' class='fa fa-thumbs-up fa-2x'></i>    Posted by <a href='#' onclick='Profile(" + obj[i].IDProfile + ")'>" + obj[i].Name + " " + obj[i].Surname + "</a> on " + obj[i].Date;


                }

                colmd9.appendChild(meta);
                main.appendChild(colmd9);


            }

            sessionStorage.setItem("BiggestID", mymax(obj));


            /* for(i=0; i<obj.length; i++)
             {
             alert("Data Loaded:"  + obj[i].Error); 
             }*/
        });

    