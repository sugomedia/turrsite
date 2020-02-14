
		
$(document).ready(function(){
  $("#quicksearch").on("keyup", function() {

    var value = $(this).val().toLowerCase();
    $.post("users/backend.php", {"data": value});
    $(".table tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("#quicksearch2").on("keyup", function() {

    var value = $(this).val().toLowerCase();
 ;
    $(".table tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("#groupsearch").on("keyup", function() {

    var value = $(this).val().toLowerCase();
   
    $(".groups").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });







});
