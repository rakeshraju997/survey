<?php include 'header.php'; ?>
<style>
    /* .close_qstn {
        position: absolute;
        bottom: -2.3em;
        left: 51%;
    } */
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Topics</a>
</nav>
<?php
error_reporting(0);
$page = file_get_contents($site_name .'/document.html');
$doc = new DOMDocument();
$doc->loadHTML($page);
$xpath = new DomXPath($doc);
$nodeList = $xpath->query("///span[@class='c0']");
$i = 0;
$j = 0; ?>
<form class="form-content" id="topic" method="POST">
    <section class="text-gray-600 body-font">
        <div class="container px-5  mx-auto">
            <div class="mx-auto lg:w-4/5">
                <div class="md:p-2 w-full">
                    <div class="rounded flex h-full items-center">
                        <span class="title-font font-medium pt-4 ">
                            <label class="" for="yes_no_radio">
                                <?php echo $nodeList->item($i)->nodeValue ?> </label>
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                <?php foreach ($nodeList as $item) {
                    if ($nodeList->item($i)->nodeValue[0] == '#') {  ?>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-gray-100 rounded flex p-2.5 items-center topic_container">
                                <!-- <span class="title-font font-medium"> -->
                                <div class="inline-flex items-center title-font font-medium">
                                    <div><input type="checkbox" class="form-checkbox w-5 h-5 text-blue-600" value="1" name="topic<?php echo $i - 1; ?>"></div>
                                    <div class="ml-3"><label><?php echo substr($nodeList->item($i)->nodeValue, 3); ?></label></div>
                                </div>
                                <!--  </span> -->
                            </div>
                        </div>

                <?php  }

                    $i++;
                }
                ?>

            </div>
            <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2 md:justify-between p-2">
                <span class="title-font font-medium">
                    <label class="" for="yes_no_radio">Would you like to add any topics to the above list?</label>
                </span>
                <span class="title-font font-medium">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" id="customRadio" type="radio" name="yes_no" value="no">
                        <span class="checkmark"></span>
                        <label class="custom-control-label" for="customRadio">No</label>
                    </div>
                </span>
                <span class="title-font font-medium form-value">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" id="customRadio2" type="radio" name="yes_no" value="yes">
                        <span class="checkmark"></span>
                        <label class="custom-control-label" for="customRadio2">Yes</label>
                    </div>
                </span>
            </div>
            <!-- <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                <span class="title-font font-medium">
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
            </div> -->

            <div id="extra" style="display:none">
                <div class="form-group p-2.5 form-value lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                    <button class="add_field_button btn btn-secondary ">Add Topic</button>
                </div>
                <div class="input_fields_wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </section>
</form>
<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        var topics_count = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (topics_count < max_fields) { //max input box allowed
                topics_count++; //text box increment
                $(wrapper).append(
                    '<div class="form-group relative p-2.5"><input type="text" class="p-2 w-full bg-gray-100 rounded flex p-2.5 items-center title-font font-medium"  placeholder="Enter Topic" name="sugg_topic" /><button type="button" class="close delete_topic remove_field form-position" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                ); //add input box        
            }
        });
        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            topics_count--;
        })
    });
    $("input[type='radio']").change(function() {
        if ($(this).val() == "yes") {
            $("#extra").show();            
            $(".input_fields_wrap").empty();
        } else {
            $(".input_fields_wrap").empty();
            $("#extra").hide();
        }
    });
    //ajax
    $('#topic').submit(function(event) {
        var $formData = $('#topic').serializeArray();
        console.log($formData);
        event.preventDefault();
        $.ajax({
                url: "<?php echo $site_name;?>/xhr/topic.php",
                type: "GET",
                data: {
                    'topic': $formData
                },
                contentType: "application/json"
                // dataType: "jsonp"
            })
            .done(function(res) {
                // if(res['status'] == 200){
                window.location.href = "<?php echo $site_name;?>/questions.php";
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