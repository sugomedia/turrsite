$(document).ready(function (){
  $("html").on("dragover", function(e) {
    e.preventDefault();
    e.stopPropagation();
  });
  $("html").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });

  $('.makeposts input[name=picturepost]').on('click', function () {
    $('.picupload').load('posts/post_pictureUpload.php');
  });

  $(document).on('click', '.closepicupload', function() {
    $('.picuploadpost').remove();
  });





  $('.picuploadform input[name=uploadPicture]').on('click', function () {
    //alert("asdasdasdasdasds");
    $('.picup').load('posts/_post_pictureUpload.php');
  });







  $('.imghere').on('dragenter', function (e) {
    e.stopPropagation();
    e.preventDefault();
    
  });

  $('.iimghere').on('dragover', function (e) {
    e.stopPropagation();
    e.preventDefault();
  });


  $('.imghere').on('drop', function (e) {
    e.stopPropagation();
    e.preventDefault();

    let file = e.originalEvent.dataTransfer.files;
    //let fd = new FormData();
    alert("asd");
    $('.pictureuploadinput').val(file[0]);
  });
});