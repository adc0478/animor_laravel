function action_menu(){
  if (document.querySelector('.btn').value === "1"){
    document.querySelector('nav ul').setAttribute('class',"movil");
    document.querySelector('.btn').value = "2";
  }else{
    document.querySelector('nav ul').setAttribute('class',"full");
    document.querySelector('.btn').value = "1";
  }
}
function agregar(selector){
  document.querySelector(selector).style.bottom="0";
}

function quitar(selector){
  document.querySelector(selector).style.bottom="-20%";
}
