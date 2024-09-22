function moveimg(){

    var img=document.getElementById("img")
    var top_value=document.getElementById("top").value;
    var left_value=document.getElementById("left").value;
    img.style.top=top_value+"px";
    img.style.left=left_value+"px";


}