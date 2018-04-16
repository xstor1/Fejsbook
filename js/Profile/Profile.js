let viewProfile =sessionStorage.getItem("viewProfile");
let MyId = sessionStorage.getItem("Myid");
if(viewProfile==null)
{
   
    $.post(".//API//GET_PROFILE_BY_ID.php",{id: MyId})
            .done(function(data)
    {
        console.log(data);
       let obj = JSON.parse(data);
       console.log(obj);
       let main = document.getElementById('page-content');
       let name = document.createElement('h3');
       name.innerHTML=obj.Name;
       let surname = document.createElement('h3');
       surname.innerHTML=obj.Surname;
       let borndate = document.createElement('p');
       borndate.innerHTML=obj.BornDate;
       let email = document.createElement('p');
       email.innerHTML=obj.Email;
       main.appendChild(name);
       main.appendChild(surname);
       main.appendChild(borndate);
       main.appendChild(email);
            });
    
}
else
{
    sessionStorage.removeItem("viewProfile");
    $.post(".//API//GET_PROFILE_BY_ID.php",{id: viewProfile})
            .done(function(data)
    {
        console.log(data);
       let obj = JSON.parse(data);
       console.log(obj);
       let main = document.getElementById('page-content');
       let name = document.createElement('h3');
       name.innerHTML=obj.Name;
       let surname = document.createElement('h3');
       surname.innerHTML=obj.Surname;
       let borndate = document.createElement('p');
       borndate.innerHTML=obj.BornDate;
       let email = document.createElement('p');
       email.innerHTML=obj.Email;
       main.appendChild(name);
       main.appendChild(surname);
       main.appendChild(borndate);
       main.appendChild(email);
            });
    
}