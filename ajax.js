$(function(){
  $("#gomb").on("click", function(){
      $.ajax({
        url: 'generator.php',
        type: 'get',
        data: {"action": "true"
             },

        success: function(data) {
          $("#teszt").html(data);

        },

        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
        }
      })
})
})
