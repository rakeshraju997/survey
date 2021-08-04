<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Survey</title>
    <style>
        body {
            -webkit-user-select: none;
            -moz-user-select: -moz-none;
            -ms-user-select: none;
            user-select: none;
        }
        .grid {
            display: none;
        }
        .text-center{
            position:absolute;
            left:12em;
        }
        .form-control{
            width:50% !important;

        }
        /* input,
textarea {
     -moz-user-select: text;
} */
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Questions</a>
</nav>
<body>
    <div class="grid container" style="display:block">
        <?php
        error_reporting(0);
        $page = file_get_contents('http://localhost/img/test.html');
        $doc = new DOMDocument();
        $doc->loadHTML($page);
        $xpath = new DomXPath($doc);
        $nodeList = $xpath->query("///span[@class='c1']");
        $i = 0;
        $j = 1;
        foreach ($nodeList as $item) {
            if ($nodeList->item($i)->nodeValue == '+-----+') {
        ?>
                <form class="form-group" id="user<?php echo $j; ?>" method="POST">
                    <b> Is the question relevant</b><br>
                    <?php //echo $j; 
                    ?>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input"  id="customRadio" name="Q" value="1">
                        <label class="custom-control-label"  for="customRadio">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input"  id="customRadio1" name="Q" value="0">
                        <label class="custom-control-label"  for="customRadio1">No</label>
                    </div>
                    
                    <div class="form-group">
                        <b>Is option A relevant</b> <br>
                    </div>
                    <div class="custom-control custom-radio">
                        <input  type="radio" class="custom-control-input" id="customRadioA" onclick="div('<?php echo $j; ?>-a')" name="A" value="1">
                        <label  class="custom-control-label"  for="customRadioA">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadioa" onclick="div('<?php echo $j; ?>-a')" name="A" value="0">
                        <label class="custom-control-label"  for="customRadioa">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input  type="radio" class="custom-control-input" id="customRadioAa" onclick="div('<?php echo $j; ?>-a')" name="A" value="">
                        <label class="custom-control-label"  for="customRadioAa">Rephrase</label>
                        <input class="form-control" type="text" id="<?php echo $j; ?>-a" style="display: none" placeholder="Change / Rephrase" name="A">

                    </div>
                    <div class="form-group">
                        <b>Is option B relevant</b>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadioB" onclick="div('<?php echo $j; ?>-b')" name="B" value="1">
                        <label class="custom-control-label"  for="customRadioB">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadiob" onclick="div('<?php echo $j; ?>-b')" name="B" value="0">
                        <label  class="custom-control-label"  for="customRadiob">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input  type="radio" class="custom-control-input" id="customRadioBb" onclick="div('<?php echo $j; ?>-b')" name="B" value="">
                        <label  class="custom-control-label" for="customRadioBb">Rephrase</label>
                        <input  class="form-control" type="text" id="<?php echo $j; ?>-b" style="display: none" placeholder="Change / Rephrase" name="B">
                    </div>
                    <div class="form-group">
                    <b>Is option C relevant</b> 
                    </div>
                    <div class="custom-control custom-radio">
                        <input  type="radio" class="custom-control-input" id="customRadioC" onclick="div('<?php echo $j; ?>-c')" name="C" value="1">
                        <label class="custom-control-label"  for="customRadioC">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadioc" onclick="div('<?php echo $j; ?>-c')" name="C" value="0">
                        <label class="custom-control-label"  for="customRadioc">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadioCc" onclick="div('<?php echo $j; ?>-c')" name="C" value="">
                        <label class="custom-control-label" for="customRadioCc">Rephrase</label>
                        <input  class="form-control" type="text" id="<?php echo $j; ?>-c" style="display: none" placeholder="Change / Rephrase" name="C"><br>

                    </div>
                    <div class="form-group">
                        <b> Is option D relevant </b>
                   </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadioD" onclick="div('<?php echo $j; ?>-d')" name="D" value="1">
                        <label class="custom-control-label"  for="customRadioD">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadiod" onclick="div('<?php echo $j; ?>-d')" name="D" value="0">
                        <label class="custom-control-label"  for="customRadiod">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadioDd" onclick="div('<?php echo $j; ?>-d')" name="D" value="">
                        <label class="custom-control-label"  for="customRadioDd">Rephrase</label>
                        <input class="form-control" type="text" id="<?php echo $j; ?>-d" style="display: none" placeholder="Change / Rephrase" name="D">
                    </div><br>
                    <div class="text-center" >
                    <input type="submit" value="Next" class="btn btn-primary" onClick="formsub('<?php echo "user" . $j; ?>',<?php echo $j; ?>)">
                    </div>
                </form>
        <?php
                echo '</div><div class="grid container">';
                $j++;
            }
            echo $nodeList->item($i)->nodeValue . "<br>";
            ++$i;
        }
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        function div(id) {
            if (event.target.value == '') {
                $('#' + id).show();
            } else {
                document.getElementById(id).value = '';
                $('#' + id).hide();
            }
        }
        function formsub(form_id, ID) {
            $('#' + form_id).submit(function(event) {
                var $formData = $("#" + form_id + " :input[value!='']").serializeArray();
                // var formData = JSON.stringify($('#user1').serializeObject());
                event.preventDefault();
                display();
                var data = JSON.stringify($formData)
                console.log(data);
                $.ajax({
                        url: "http://localhost/img/xhr/questions.php",
                        type: "GET",
                        data: {
                            'ID': ID,
                            'question': $formData
                        },
                        contentType: "application/json"
                    })
                    .done(function(res) {
                        console.log(res);
                        // if(res['status'] == 200){
                        // window.location.href="http://localhost/img/questions.php";
                        // }
                        console.log('success');
                    })
                    .fail(function(e) {
                        console.log('error')
                    });
                window.receipt = function(res) {
                    // this function will execute upon finish
                }
            });
        }
    </script>
    <script>
        var allDiv = document.querySelectorAll('.grid');
        console.log(allDiv);
        var count = 1;
        function display() {
            if (count >= allDiv.length) {
                count = 1;
            }
            for (let i = 0; i < allDiv.length; i++) {
                allDiv[i].style.display = 'none';
            }
            allDiv[count].style.display = 'block';
            count = count + 1;
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>