$(function(){
  $('#load-gen').hide();
  $('#load-top').hide();


  $('#hirek').on('click', '#like', function(){
    var likes = parseInt($(this).children('.badge').text());
    $(this).children('.badge').text(likes+1);
  });

// -------------infinite scroll button -------
counter = 10;
$(".col-md-10").on("click", '#ajax', function(){
    $.ajax({
      url: 'toplista.php',
      type: 'post',
      data: {"action": "load",
           "page": counter
           },

        success: function(data) {
          counter += 10;

          if(data == ''){
            $('#ajax').html('<h3>Nincs több <i class="fa fa-frown-o"></i><h3>');
            $('#ajax').prop('disabled', true);
          } else {
            $('.list-group').append(data);
          }
          if(remaining <= 0) {
            $('#ajax').html('<h3>Nincs több <i class="fa fa-frown-o"></i><h3>');
            $('#ajax').prop('disabled', true);
          }
      },

      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    })
})


// --------- random generálás -------------
  $("#random").on("click", function(){
      $.ajax({
        url: 'generator.php',
        type: 'post',
        data: {"action": "true"
             },

        success: function(data) {
          $(".list-group").html(data);
          $(".page-header").text("Random hírek");
          $("#ajax").hide();


        },

        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
      })
})

// ------------ toplista --------------------
$("#top").on("click", function(){
    $.ajax({
      url: 'toplista.php',
      type: 'post',
      data: {"action": "page"
           },

      success: function(data) {
        $(".list-group").html(data);
        $(".page-header").text("Legjobb hírek");
        $("#ajax").show();


      },

      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    })
})

// ----------------- like, szavazás ------------------
$("#hirek").on("click","#like", function(){
  var hir = $(this).prev('b').text();
  $(this).prop("disabled", true);

    $.ajax({
      url: 'szavazas.php',
      type: 'post',
      data: {"hir": hir},

      success: function() {
        $(this).prop("disabled", true);
      },

      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    })
})
// ----------------- top button --------------------
 $("#toTop").css("display", "none");
  $(window).scroll(function(){

 if($(window).scrollTop() > 0){
  $("#toTop").fadeIn("slow");
 }
 else {
  $("#toTop").fadeOut("slow");
}
});

$("#toTop").click(function(event){
  event.preventDefault();
$("html, body").animate({
scrollTop:0
},"slow");

});

})
// ----------------- loading animation ----------------
.ajaxSend(function( event, jqxhr, settings ) {
  if (settings.url == "generator.php" ) {
    $(".fa-magic").hide();
    $("#load-gen").show();
     }
  if (settings.url == "toplista.php") {
    $(".fa-list-ol").hide()
    $("#load-top").show();
  }
}).ajaxStop(function() {
    $(".fa-magic").show();
    $("#load-gen").hide();
    $(".fa-list-ol").show()
    $("#load-top").hide();
})
