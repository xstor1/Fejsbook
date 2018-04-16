function Login()
{
   let email = document.getElementById("email");
   let pass = document.getElementById("password");
  $.post( ".//API//Login.php", { Email: $('#email').val() , Password: $('#password').val(), device_id: $('#device_id').val()})
          .done(function(data)
  {
      console.log(data);
   let obj = JSON.parse(data.toString());  
  /* for(i=0; i<obj.length; i++)
   {
       alert("Data Loaded:"  + obj[i].Error); 
   }*/
if(!obj[0])
{
sessionStorage.setItem("login", "true"); 
sessionStorage.setItem("token", obj.Token_);
sessionStorage.setItem("Myid", obj.IDUser);
sessionStorage.setItem("MyEmail",$('#email').val() );
console.log('prihlasen');
window.location.replace("./index.html");
}
    
  });
}
