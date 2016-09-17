$( document ).ready(function(){

  $("input.mesajBlock").focus(function(){
        $(this).removeAttr("placeholder");
  });

  $("input.mesajBlock").focusout(function(){
     $(this).attr("placeholder", "  Çekinme, bir şeyler yaz!");
  });


$("i.fa-sliders").click(function(){
    $("div#sohbet").hide("drop", 600);
      setTimeout(function(){ $("div.chatsettings").show("drop", {direction: "right"}, 600); }, 400);
});

$("input.cancelbutton").click(function(){
    $("div.chatsettings").hide("drop", {direction: "right" }, 600);
      setTimeout(function(){ $("div#sohbet").show("drop", 600); }, 400);
});


/* Askıya alındı.
    $("div.opt-block").click(function(){
        $("div.sohbetList").hide("drop", {direction: "left"}, 300);
          $("div.notifs").animate({
              "width": "900px",
              "border-top-left-radius": "7px"
           });

           $("div.sohbeticerik").animate({
              "width": "900px"
           });

           $("div.messageArea").animate({
             "width": "900px",
             "border-bottom-left-radius": "7px"
           });

           $("div.messageArea input").animate({
              "width": "845px"
            })

    });
    */
});
