<html>
    <head>
        <title>weakness drive</title>
    </head>
    <body>
        <link href="static/index.css" rel="stylesheet"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="file-upload">
                <h1>Weakne22 Dr11ve</h1>
              <div class="file-select">
                <div class="file-select-button" id="fileName">Choose File</div>
                <div class="file-select-name" id="noFile">No file chosen...</div> 
                <input type="file" name="file" id="chooseFile">
              </div>
              <input class="file-submit-button" type="submit" value="submit file">

            </div>
        </form>
        <div class="copyright">
            By <a target="_blank" href="https://github.com/R99bbit">R99bbit</a>.
        </div>
        <script>
            $('#chooseFile').bind('change', function () {
                var filename = $("#chooseFile").val();
                if (/^\s*$/.test(filename)) {
                    $(".file-upload").removeClass('active');
                    $("#noFile").text("No file chosen..."); 
                }
                else {
                    $(".file-upload").addClass('active');
                    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
                }
            });
        </script>
    </body>
</html>