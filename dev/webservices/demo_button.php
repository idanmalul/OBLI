<?php ?>
<body></body>
<!-- <body onload="myfunction()">
<script>
function myfunction() {
  // console.log("Send post message");
  // window.postMessage("Hello React", "*");
  alert("Page is loaded");
  // console.log("Send post message");
  // window.postMessage("Hello React", "*");
}


</script>
 -->
<!-- <button>Send post message from web</button> -->

<script>
// // document.querySelector("button").onclick = function() {
// // console.log("Send post message");
// // window.postMessage("Hello React", "*");
// // }
// document.querySelector("body").onclick = function(){
// 	console.log("Send post message");
// 	window.postMessage("Hello React", "*");
// }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">

  	.close{
  		display: none;
  	}

  	.modal-header{
  		border-bottom: 0px !important;
  	}

  	.modal-footer{
  		border-top: 0px !important;
  	}

  </style>
</head>
<body>

<div class="container">
  <!-- <h2>Activate Modal with JavaScript</h2> -->
  <!-- Trigger the modal with a button -->
  <!-- <button type="button" class="btn btn-info btn-lg" id="myBtn">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thank You!</h4>
        </div>
        <div class="modal-body">
          <p>We will get back to you shortly...</p>
        </div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-default" id="1" style="background-color:#3399cc;border-radius: 19px;width: 80px;color:#fff;"  data-dismiss="modal" onclick="myfunction()">OK</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<script>
$(document).ready(function(){
    $("#myModal").modal();

    $('#myModal').modal({
           backdrop: 'static',
           keyboard: false
    })

});

function myfunction() {
  
  console.log("Send post message");
  window.postMessage("Hello React", "*");
}

function centerModal() {
    $(this).css('display', 'block');
    var $dialog = $(this).find(".modal-dialog");
    var offset = ($(window).height() - $dialog.height()) / 2;
    // Center modal vertically in window
    $dialog.css("margin-top", offset);
}

$('.modal').on('show.bs.modal', centerModal);
$(window).on("resize", function () {
    $('.modal:visible').each(centerModal);
});


</script>

</body>
</html>
