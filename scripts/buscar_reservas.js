function sendrequest(){
    var theObject = new XMLHttpRequest();
    theObject.open('GET','./php/buscar_reservar_existentes.php',true);
    theObject.setRequestHeader('content-Type','application/x-www-form-urlencoded');
    theObject.onreadystatechange=function(){
        console.log(theObject.responseText);
    }
    theObject.send();
}