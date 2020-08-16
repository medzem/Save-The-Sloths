var One_Time=["10","40","70","150","200"]
var Monthly=["3","6","10","15","20"]
var Quarterly=["9","18","26","33","60"]
var Annually=["36","72","120","158","240"]

function No_D(ch){
    ch= ch.substring(1);
    return ch;
}


$(()=>{

    $("#firstDo li").click(()=>{
        $("#firstDo li").css("background-color", "transparent"); 
        $("#firstDo li").css("color", "#80662B");
        $("#firstDo li").css("font-weight", "normal");        
    });

    $("#O1").click(()=>{
        $(".secondDo").show();
        $("#O1").css("background-color", "#73541B");
        $("#O1").css("color", "white");
        $("#O1").css("font-weight", "bold");        

        for(var i=0; i<5; i++)
            document.getElementById("M"+i).innerHTML = "$"+One_Time[i];
    });

    $("#O2").click(()=>{
        $(".secondDo").show();
        $("#O2").css("background-color", "#73541B");
        $("#O2").css("color", "white");
        $("#O2").css("font-weight", "bold");     

        for(var i=0; i<5; i++)
            document.getElementById("M"+i).innerHTML = "$"+Monthly[i];
    });

    $("#O3").click(()=>{
        $(".secondDo").show();
        $("#O3").css("background-color", "#73541B");
        $("#O3").css("color", "white");
        $("#O3").css("font-weight", "bold");     

        for(var i=0; i<5; i++)
            document.getElementById("M"+i).innerHTML = "$"+Quarterly[i];
    });

    $("#O4").click(()=>{
        $(".secondDo").show();
        $("#O4").css("background-color", "#73541B");
        $("#O4").css("color", "white");
        $("#O4").css("font-weight", "bold");     

        for(var i=0; i<5; i++)
            document.getElementById("M"+i).innerHTML = "$"+Annually[i];
    });

    $(".Mlvl li").click(()=>{
        var X=(event.target);
        console.log(X.innerHTML);
        var ch= X.innerHTML;
        ch= No_D(ch);
        console.log(ch);
        document.getElementById("money").value = Number(ch);
    });
    
});

$(document).ready(function() {

    const $valueSpan = $('.valueSpan2');
    const $value = $('#customRange11');
    $valueSpan.html($value.val());
    $value.on('input change', () => {
  
      $valueSpan.html($value.val());
    });
    
});