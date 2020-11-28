<!DOCTYPE html>
<html lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/materialize.min.css')}}"  media="screen,projection"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Slider Image</title>
    <style>
        .tulisan{
            color: grey;
            font-family: 'Roboto Condensed', sans-serif;
        }
    </style>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
    </script>
</head> 
<body> 
    <div class="container" style="max-width: 1920px; width: 80%;">
        <form method="post" action="upload.php" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <!--Slider 1-->
                <div class="col s6" style="border:1px solid gray; padding: 10px;">
                    <div class="row">
                        <div class="col s12">
                            <h3 class="tulisan">SLIDING IMAGES 1</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <img src="{{asset('assets/images/SwiperFoto/1.jpeg')}}" id="preview-s4" alt="Invalid image!" width="100%" height="270px"/>
                        </div>
                    </div>
                </div>
                <!--Slider 2-->
                <div class="col s6" style="border:1px solid gray; padding: 10px;">
                    <div class="row">
                        <div class="col s12">
                            <h3 class="tulisan">SLIDING IMAGES 2</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <img src="{{asset('assets/images/SwiperFoto/2.jpeg')}}" id="preview-s4" alt="Invalid image!" width="100%" height="270px"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--Slider 3-->
                <div class="col s6" style="border:1px solid gray; padding: 10px;">
                    <div class="row">
                        <div class="col s12">
                            <h3 class="tulisan">SLIDING IMAGES 3</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <img src="{{asset('assets/images/SwiperFoto/3.jpeg')}}" id="preview-s4" alt="Invalid image!" width="100%" height="270px"/>
                        </div>
                    </div>    
                </div>
                <!--Slider 4-->
                <div class="col s6" style="border:1px solid gray; padding: 10px;">
                    <div class="row">
                        <div class="col s12">
                            <h3 class="tulisan">SLIDING IMAGES 3</h3>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col s12">
                            <img src="{{asset('assets/images/SwiperFoto/4.jpeg')}}" id="preview-s4" alt="Invalid image!" width="100%" height="270px"/>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col s6 offset-s3 center">
                    <div class="row">
                        <div class="col s12">
                            <h3 class="tulisan">Edit Images</h3>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col s12">
                            <img src="{{asset('assets/images/SwiperFoto/null-img.jpeg')}}" id="preview-upload" alt="Invalid image!" width="100%" height="270px"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <input type="file" name="slider1" id="slider1"/>
                            <div style="color:red;">
                                *Recommended size 1920x500 px
                            </div><br><br>
                            <input type="submit" value="Edit Image 1" name="up1">
                            <input type="submit" value="Edit Image 2" name="up2">
                            <input type="submit" value="Edit Image 3" name="up3">
                            <input type="submit" value="Edit Image 4" name="up4">
                        </div> 
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            $('#preview-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#slider1").change(function() {
        readURL(this);
    });
    $("#slider2").change(function() {
        readURL(this);
    });
    $("#slider3").change(function() {
        readURL(this);
    });
    $("#slider4").change(function() {
        readURL(this);
    });
</script>