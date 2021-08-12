<?php include 'header.php';?>
<style>
.close_qstn {
    position: absolute;
    bottom: -2.3em;
    left: 51%;
}

.w-5 {
    width: 1rem !important;
}

.h-5 {
    height: 0.8rem !important;
}

.form-values {
    margin-left: 6em;
}

.form-value {
    margin-left: 8.3em;
}

.form-content {
    /* background-color:#def4ff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 15px 15px 40px #5ed7ff, 15px 15px 40px #75edf5; */
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Topics</a>
</nav>
<?php
error_reporting(0);
$page = file_get_contents('http://localhost/img/document.html');
$doc = new DOMDocument();
$doc->loadHTML($page);
$xpath = new DomXPath($doc);
$nodeList = $xpath->query("///span[@class='c0']");
$i = 0;
$j = 0; ?>
<form class="form-content" id="topic" method="POST">
    <section class="text-gray-600 body-font">
        <div class="container px-5  mx-auto">
            <div class="container px-5  mx-auto">
                <div class="p-2  w-full">
                    <div class="rounded flex  h-full items-center" style="margin-left: 0.8em;">
                        <span class="title-font font-medium p-4">
                            <label class="container" for="yes_no_radio">
                                <?php  echo $nodeList->item($i)->nodeValue ?> </label>
                        </span>
                    </div>
                </div>
            </div>
            <!-- <div class="text-center">
      <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">
      <?php  //echo $nodeList->item($i)->nodeValue ?>
       .</p>
    </div> -->
            <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                <?php foreach ($nodeList as $item) {
            if ($nodeList->item($i)->nodeValue[0] == '#') {  ?>
                <div class="p-2 sm:w-1/2 w-full">
                    <div class="bg-gray-100 rounded flex p-2.5 items-center">
                        <span class="title-font font-medium">
                            <div class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" value="1"
                                    name="topic<?php echo $i - 1; ?>">
                            </div>
                            <?php
                echo substr($nodeList->item($i)->nodeValue, 3);?>
                        </span>
                    </div>
                </div>

                <?php  }
            
            $i++;
            
        }
                ?>

            </div>

            <span class="title-font font-medium form-values">
                <label class="container" for="yes_no_radio">Would you like to add any topics to the above list?</label>
            </span>

            <span class="title-font font-medium form-value">
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" id="customRadio" type="radio" name="yes_no" value="no">
                    <span class="checkmark"></span>
                    <label class="custom-control-label" for="customRadio">No</label>
                </div>
            </span>
            <span class="title-font font-medium form-values">

                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" id="customRadio2" type="radio" name="yes_no" value="yes">
                    <span class="checkmark"></span>
                    <label class="custom-control-label" for="customRadio2">Yes</label>
                </div>
            </span>




            <div id="extra" style="display:none">
                <div class="input_fields_wrap">
                    <div class="form-group p-2.5 form-values">
                        <button class="add_field_button btn btn-secondary ">Add Topic</button>
                    </div>

                    <div class="form-group">
                        <input type="text" style="width: 40%;margin-left: 11%;"
                            class="p-2 sm:w-1/2 w-full bg-gray-100 rounded flex p-2.5 items-center title-font font-medium"
                            name="sugg_topic" placeholder="Enter Topic">
                    </div>

                </div>
            </div>
            </span>

            <div class="text-center">
                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
            </div>
            <!-- </div> -->
    </section>
</form>
<?php include 'footer.php';?>
<script type="text/javascript">
$(document).ready(function() {
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID
    var x = 1; //initlal text box count
    $(add_button).click(function(e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            $(wrapper).append(
                '<div><input type="text"  style="width: 40%;margin-left: 11%;" class="p-2 sm:w-1/2 w-full bg-gray-100 rounded flex p-2.5 items-center title-font font-medium"  placeholder="Enter Topic" name="sugg_topic" /><button type="button" class="close close_qstn remove_field form-position" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><br>'
                ); //add input box
        }
    });
    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
$("input[type='radio']").change(function() {
    if ($(this).val() == "yes") {
        $("#extra").show();
    } else {
        var elements = document.getElementsByClassName("extra");
        for (var i = 0, len = elements.length; i < len; i++) {
            elements[i].value = '';
        }
        $("#extra").hide();
    }
});
//ajax
$('#topic').submit(function(event) {
    var $formData = $('#topic').serializeArray();
    console.log($formData);
    var aa = 'rewr';
    event.preventDefault();
    $.ajax({
            url: "http://localhost/img/xhr/topic.php",
            type: "GET",
            data: {
                'topic': $formData
            },
            contentType: "application/json"
            // dataType: "jsonp"
        })
        .done(function(res) {
            // if(res['status'] == 200){
            window.location.href = "http://localhost/img/questions.php";
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
</script>