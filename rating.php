<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Rating Bintang</title>

<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

<link href="assets/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/star-rating.min.js"></script> 

<link rel="icon" href="assets/img/abangko.png">
</head>
<body>

<?php include_once('control/proses.php') //panggil proses simpan dan query rating dari folder control 
?>

<input value="<?= getRatingByidkos(connect(), 1); ?>" type="number" class="rating" min=0 max=5 step=0.1 data-size="md" data-stars="5" idkos=1>

<!-- fungsi java script nya disini -->
  <script type="text/javascript">
    $(function(){
      $('.rating').on('rating.change', function(event, value, caption) {
      idkos = $(this).attr('idkos');
      $.ajax({
            url: "control/proses.php",
            dataType: "json",
            data: {vote:value, idkos:idkos, type:'save'},
            success: function( data ) {
            alert("Rating Tersimpan");
          },
        error: function(e) {
        console.log(e);
      },
        timeout: 30000  
      });
    });
  });
  </script>
  <!-- end -->
</body>
</html>