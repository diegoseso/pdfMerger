<html>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<script src="jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<body>
<img src=logo.jpg />
<div>
<form action="upload.php" method="post" enctype="multipart/form-data">
<div>
    <div id="uploads">
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
                <input type="file" name="pdfs[1]" id="pdfs-1" style="margin:4px">
            </div>
        </div>
        <div>
            <div class="col-md-2 col-md-offset-5">
                <input type="file" name="pdfs[2]" id="pdfs-2" style="margin:4px" >
            </div>
        </div>
    </div>
    <div class="col-md-2 col-md-offset-5" style="display:flex">
        <label class="btn btn-primary" id="add-upload" >Agregar otro fichero</label>
        <input type="submit" value="Juntar ficheros" name="submit" class="btn btn-primary" style="margin-left:4px">
    </div>
</div>
</form>
</div>
</body>
<script>
var uploads = 2;
$('#add-upload').click( function(){
    console.log('clicked');
    uploads = uploads + 1;
    $("#uploads").append('<div><div class="col-md-2 col-md-offset-5"><input type="file" name="pdfs['+ uploads + ']" id="pdfs-' + uploads + '" style="margin:4px" ></div></div>');
});
</script>
</html>
