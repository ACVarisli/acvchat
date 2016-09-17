$(document).ready(function() {
 $("div.login").show("drop", {
        direction: "up"
    }, 650);

    $("input.girisbtn").removeAttr("type");
    $("input.girisbtn").attr("type", "button");

    $("input.girisbtn").click(function(x) {

      var kadi = $("input[name='kadi']").val();
      var sifre = $("input[name='sifre']").val();

        if (kadi == "" || sifre == "") {
           $("div.login").effect("shake");
           $("div.attention div.text").text(" Boş alan bırakamazsınız. ");
          $("div.attention").css("opacity", "1");
          $("div.login").css("border-color", "#e74c3c");
          $("div.icon").css("background", "#e74c3c");
          $("div.icon i.fa-user").fadeOut(200);
          $("div.icon i.fa-times").fadeIn(200);
          setTimeout(function() {
                  $("div.attention").css("opacity", "0");
                  $("div.login").css("border-color", "#F39C12");
                  $("div.icon").css("background", "#F39C12");
                  $("div.icon i.fa-times").fadeOut(100);
                  $("div.icon i.fa-user").fadeIn(200);
               },
               1750);

}else{

   /* Kullanıcı adı uzunluğu için koşul */

      if ( kadi.length < 3 ){
         $("div.login").effect("shake");
         $("div.attention div.text").text(" Kullanıcı adınız için yetersiz karakter.");
       $("div.attention").css("opacity", "1");
       $("div.login").css("border-color", "#e74c3c");
       $("div.icon").css("background", "#e74c3c");
       $("div.icon i.fa-user").fadeOut(200);
       $("div.icon i.fa-times").fadeIn(200);
       setTimeout(function() {
                $("div.attention").css("opacity", "0");
                $("div.login").css("border-color", "#F39C12");
                $("div.icon").css("background", "#F39C12");
                $("div.icon i.fa-times").fadeOut(100);
                $("div.icon i.fa-user").fadeIn(200);
             },
             1750);

      }else{

          /* Şifre uzunluğu için koşul */


            if ( sifre.length < 6 ){
               $("div.login").effect("shake");
               $("div.attention div.text").text(" Şifreniz için yetersiz karakter (min: 6)");
             $("div.attention").css("opacity", "1");
             $("div.login").css("border-color", "#e74c3c");
             $("div.icon").css("background", "#e74c3c");
             $("div.icon i.fa-user").fadeOut(200);
             $("div.icon i.fa-times").fadeIn(200);
             setTimeout(function() {
                      $("div.attention").css("opacity", "0");
                      $("div.login").css("border-color", "#F39C12");
                      $("div.icon").css("background", "#F39C12");
                      $("div.icon i.fa-times").fadeOut(100);
                      $("div.icon i.fa-user").fadeIn(200);
                   },
                   1750);
            }else{
               $("input.girisbtn").removeAttr("type");
               $("input.girisbtn").attr("type", "submit");
      }
}
}

   });

var a = 0;

   $("div.reg-button").click(function(){
if (a  == 0 ){
      $(this).addClass("reg-state");
      $(this).html( "<i class='fa fa-user'> <span style='font-size: 16px;  font-family: Titillium;'>Giriş Yap</span>");
         $("div.login").hide();
            $("div.attention").css("opacity", "0");
               a++;
                $("div.register").show();
}else{
      $(this).removeClass("reg-state");
      $(this).html( "<i class='fa fa-user-plus'> <span style='font-size: 16px; font-family: Titillium;'>Üyelik Oluştur</span>");
      $("div.register").hide();
            $("div.attention").css("opacity", "0");
               a = 0;
                     $("div.login").show();

}
   });

});
