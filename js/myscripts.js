
		
$(document).ready(function(){
  $("#quicksearch").on("keyup", function() {

    var value = $(this).val().toLowerCase();
    $.post("users/backend.php", {"data": value});
    $(".table tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
