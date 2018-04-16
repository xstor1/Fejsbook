

function mymax(a)
{
    
    var m = 0;

    for (i=0; i < a.length; ++i) {
        if (a[i].ID > m) {
            m = a[i].ID;
        }
    }

    return m;
}
if(sessionStorage.getItem("login")==="true")
{let MyId = sessionStorage.getItem("Myid");
let MyEmail = sessionStorage.getItem("MyEmail");
let MyToken = sessionStorage.getItem("token");
    
    

    $.post( ".//API//GET_POST_BY_ID_FROM_FRIENDS.php", { id: MyId , Email: MyEmail, Token:MyToken  ,device_id: 'WEB'})
          .done(function(data)
  {
      console.log(data);
       let obj = JSON.parse(data);  
       for(i=0; i<obj.length; i++)
       {
            console.log(obj[i]); 
            let main =  document.getElementById('page-content');
            let colmd9 = document.createElement('div');
            colmd9.classList.add('post-preview');
            let mdlcard = document.createElement('h3');
            mdlcard.classList.add('post-title');
            mdlcard.innerHTML=obj[i].Title;
            colmd9.appendChild(mdlcard);
            let p = document.createElement('p');
          p.innerHTML=obj[i].Text;
            colmd9.appendChild(p);
     let meta = document.createElement('p');
     meta.classList.add('post-meta');
     meta.innerHTML="Posted by <a href='#' onclick='Profile("+obj[i].IDProfile+")'>" + obj[i].Name+" "+ obj[i].Surname + "</a> on "+ obj[i].Date;
           colmd9.appendChild(meta);
            main.appendChild(colmd9);
            
       }
     sessionStorage.setItem("BiggestID",mymax(obj));
  
 
  /* for(i=0; i<obj.length; i++)
   {
       alert("Data Loaded:"  + obj[i].Error); 
   }*/
});
}
else
{
    window.location.replace("./Login.html");
}
    