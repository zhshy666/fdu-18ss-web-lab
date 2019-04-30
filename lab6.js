var select=function (f) {
    return document.querySelector(f);
};
//储存两组Node
var images=select("#thumbnails");
var child=select("#thumbnails").childNodes;
for(var i=0;i<child.length;i++){
    if (child[i].nodeType!==1){
        images.removeChild(child[i]);
    }
}

var figures=select("#featured");
var children=select("#featured").childNodes;
for (var j=0;j<children.length;j++){
    if(children[j].nodeType!==1){
        figures.removeChild(children[j]);
    }
}

//设置点击事件
child[0].onclick=function () {
    children[0].setAttribute("src","images/medium/5855774224.jpg");
    children[0].setAttribute("title","Battle");
    children[1].innerHTML="Battle";
};
child[1].onclick=function () {
    children[0].setAttribute("src","images/medium/5856697109.jpg");
    children[0].setAttribute("title","Luneburg");
    children[1].innerHTML="Luneburg";
};
child[2].onclick=function () {
    children[0].setAttribute("src","images/medium/6119130918.jpg");
    children[0].setAttribute("title","Bermuda");
    children[1].innerHTML="Bermuda";
};
child[3].onclick=function () {
    children[0].setAttribute("src","images/medium/8711645510.jpg");
    children[0].setAttribute("title","Athens");
    children[1].innerHTML="Athens";
};
child[4].onclick=function () {
    children[0].setAttribute("src","images/medium/9504449928.jpg");
    children[0].setAttribute("title","Florence");
    children[1].innerHTML="Florence";
};

//淡入淡出
var featured=document.getElementById("featured");
featured.onmouseenter=function () {
    if (children[1].style.opacity!==0.8){
        var num=0;
        var st=setInterval(function () {
            num++;
            children[1].style.opacity=num/100;
            if (num>=80){
                clearInterval(st);
            }
        },1000/80)
    }
};
featured.onmouseleave=function () {
    if(children[1].style.opacity!==0){
        var num=0;
        var st=setInterval(function () {
            num++;
            children[1].style.opacity=0.8-num/100;
            if (num>=80){
                clearInterval(st);
            }
        },1000/80)
    }
};