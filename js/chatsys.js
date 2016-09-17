$( document ).ready(function(){
  $("input[name=mesaj]").focus();
});

$(function(){
    var x = 0;

    $("div.bg-for-color").click(function(){
      if ( x == 0){
        $("div.bg-for-color").addClass("clicked").stop(true, true);
          $("div.bg-for-color i").css("color", "#fff");
            x++;
      }else{
        $("div.bg-for-color").removeClass("clicked").stop(true, true);
          $("div.bg-for-color i").css("color", "#696969");
          x = 0;
      }
    });
});

$(function(){

var a = 0;

  $("div.bg-for-opt").click(function(){
      if ( a == 0 ){
          $("div.bg-for-opt").addClass("clicked").stop(true, true);
            $("div.bg-for-opt i").css("color", "#fff");
            $("input[name=mesaj]").css("font-weight", "bold");
            $("div.changed-opt span").html("<i class='fa fa-check'></i> Kalın yazma aktifleştirildi.");
            $("div.changed-opt").stop().show("drop", {direction: "up"}, 700);
              setTimeout(function(){  $("div.changed-opt").fadeOut(200);
                  a++;
            }, 1000);
      }else{
        $("div.bg-for-opt").removeClass("clicked").stop(true, true);
          $("div.bg-for-opt i").css("color", "#696969");
            $("input[name=mesaj]").css("font-weight", "normal");
            $("div.changed-opt span").html("<i class='fa fa-check'></i> Kalın yazma pasifleştirildi.");
              $("div.changed-opt").stop().show("drop", {direction: "up"}, 700);
              setTimeout(function(){  $("div.changed-opt").fadeOut(200);
                a = 0;
            }, 1000 );
      }
  });

document.onkeydown = mesajGonder;

function mesajGonder(m){
  var button;
  button = m.which;
  if ( button ==  13){
    $("input[name=mesaj]").attr("disabled", "disabled");
    var mesaj = $("input[name=mesaj]").val();

    if( a == 0 ){
      $.ajax ({
          type: "POST",
          url: "sohbet.php",
          data: {"type":"gonder", "bold": "0", "mesaj": mesaj},
          success: function(sonuc){
            if( sonuc == "empty"){
              alert("Boş yapma");
                $("input[name=mesaj]").removeAttr("disabled");
            }else{
              $("input[name=mesaj]").removeAttr("disabled");
              $("input[name=mesaj]").val("");
              $("input[name=mesaj]").focus();
              chatUpdate();
              refreshonline();
                }
          }
      });
    }else{
      $.ajax ({
          type: "POST",
          url: "sohbet.php",
          data: {"type":"gonder",  "bold": "1", "mesaj": mesaj},
          success: function(sonuc){
            if( sonuc == "empty"){
              alert("boş mesaj atma");
                $("input[name=mesaj]").removeAttr("disabled");
            }else{
              $("input[name=mesaj]").removeAttr("disabled");
              $("input[name=mesaj]").val("");
              $("input[name=mesaj]").focus();
              chatUpdate();
              refreshonline();
                }
          }
      });
    }
  }
}

  });

function chatUpdate(){
  $.ajax({
    type: "POST",
    url: "sohbet.php",
    data: {"type":"guncelle"},
    success: function(sonuc){
        $("div.sohbeticerik").html(sonuc);
    }
  });
}
chatUpdate();
refreshonline();


function chatClear(){
    $.ajax({
        type: "POST",
        url: "sohbet.php",
        data: {"type":"temizle"},
        success: function(sonuc){
        }
    });
}
refreshonline();

function refreshonline(){
  $.ajax({
    type: "POST",
    url: "online.php",
    success: function(refresh){
      $("div.sohbetlist-content").html(refresh);
    }
  });
}

  setInterval("chatUpdate()", 1000);
  setInterval("refreshonline()", 1000);
