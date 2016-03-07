/**
 * Created by Christophe on 06/03/2016.
 */


var keylist = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

function randompassword(){
    temp = "";
    for(i=0; i<15; i++){
        if(i % 4 === 3 && i !=0){
            temp += "-";
        }
        else{
            temp += keylist.charAt(Math.floor(Math.random()*keylist.length));
        }
    }
    return temp;
}


function output(){
    document.getElementById("pass").value = randompassword();


}