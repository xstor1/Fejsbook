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
let viewProfile = sessionStorage.getItem("viewProfile");
let MyId = sessionStorage.getItem("Myid");
if (viewProfile == null)
{

    $.post(".//API//GET_PROFILE_BY_ID.php", {id: MyId})
            .done(function (data)
            {
                console.log('funguje');
                console.log(data);
                let obj = JSON.parse(data);
                console.log(obj);
                let main = document.getElementById('page-content');
                let name = document.createElement('h3');
                name.innerHTML = obj.Name;
                let surname = document.createElement('h3');
                surname.innerHTML = obj.Surname;
                let borndate = document.createElement('p');
                borndate.innerHTML = obj.BornDate;
                let email = document.createElement('p');
                email.innerHTML = obj.Email;
                main.appendChild(name);
                main.appendChild(surname);
                main.appendChild(borndate);
                main.appendChild(email);
            });
    /*aahoj*/
    
       



        $.post(".//API//GET_POSTS_BY_PROFILE_ID.php", {id: MyId})
                .done(function (data)
                {
                    console.log(data);
                    let obj = JSON.parse(data);
                    for (i = 0; i < obj.length; i++)
                    {
                        console.log(obj[i]);
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
                        meta.innerHTML = " on " + obj[i].Date;
                        colmd9.appendChild(meta);
                        main.appendChild(colmd9);

                    }
                    sessionStorage.setItem("BiggestID", mymax(obj));


                    /* for(i=0; i<obj.length; i++)
                     {
                     alert("Data Loaded:"  + obj[i].Error); 
                     }*/
                });
   

} else
{
    sessionStorage.removeItem("viewProfile");
    $.post(".//API//GET_PROFILE_BY_ID.php", {id: viewProfile})
            .done(function (data)
            {
                console.log(data);
                let obj = JSON.parse(data);
                console.log(obj);
                let main = document.getElementById('page-content');
                let name = document.createElement('h3');
                name.innerHTML = obj.Name;
                let surname = document.createElement('h3');
                surname.innerHTML = obj.Surname;
                let borndate = document.createElement('p');
                borndate.innerHTML = obj.BornDate;
                let email = document.createElement('p');
                email.innerHTML = obj.Email;
                main.appendChild(name);
                main.appendChild(surname);
                main.appendChild(borndate);
                main.appendChild(email);
            });
            /*ahoj*/

        $.post(".//API//GET_POSTS_BY_PROFILE_ID.php", {id: viewProfile})
                .done(function (data)
                {
                    console.log(data);
                    let obj = JSON.parse(data);
                    for (i = 0; i < obj.length; i++)
                    {
                        console.log(obj[i]);
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
                        meta.innerHTML = " on " + obj[i].Date;
                        colmd9.appendChild(meta);
                        main.appendChild(colmd9);

                    }
                    sessionStorage.setItem("BiggestID", mymax(obj));


                    /* for(i=0; i<obj.length; i++)
                     {
                     alert("Data Loaded:"  + obj[i].Error); 
                     }*/
                });
    } 

