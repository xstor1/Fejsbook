function validate(e)
{   

let dateElement = document.getElementById('date');
console.log( dateElement.value);
let dateAge = new Date(dateElement.value);
let age =Date.now()-dateAge;
let year = new Date(age);
console.log(age);
let rok =age/31556952000.00043;
console.log(rok);
if( rok < 13)
{
    e.preventDefault();
    console.log('error');
}
else
{
    console.log('proslo');
}
}
let form = document.querySelector('form');
form.addEventListener('submit',validate);