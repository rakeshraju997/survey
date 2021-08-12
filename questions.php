<style>
    .custom-control {
        padding-left: 2.5rem !important;
}
.p-4 {
    padding: 1.5rem!important;
}</style>
<?php include 'header.php';?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Questions</a>
</nav>

    <div class="grid container p-4" style="display:block">
    
        <?php
        error_reporting(0);
        $page = file_get_contents('http://localhost/img/test.html');
        $doc = new DOMDocument();
        $doc->loadHTML($page);
        $xpath = new DomXPath($doc);
        $nodeList = $xpath->query("///span[@class='c0']");
        //var_dump($xpath);
        $i = 1;
        $j = 1;
        foreach ($nodeList as $item) {
            if ($nodeList->item($i)->nodeValue == '+-----+') {
        ?>
               <form class="form-group" id="user<?php echo $j; ?>" method="POST">
               <span class="title-font font-medium form-values custom-control-inline" style="padding-top: 15px;">
                <label  for="yes_no_radio">Is the question relevant</label>
                        <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" id="customRadio-<?php echo $j; ?>" type="radio" name="Q" value="no">
                        <span class="checkmark"></span>
                        <label class="custom-control-label" for="customRadio-<?php echo $j; ?>">No</label>
                        </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" id="customRadioq-<?php echo $j; ?>" type="radio" name="Q" value="1">
                        <span class="checkmark"></span>
                        <label class="custom-control-label" for="customRadioq-<?php echo $j; ?>">Yes</label>
                    </div>
                </span>
                
                <section class="text-gray-600 body-font overflow-hidden">
                <div class="container">
                    <div class="flex flex-wrap">
                    <div class="md:w-1/2 flex flex-col items-start p-2">
                        <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">Option A</span>
                        <h5 class=" title-font font-medium text-gray-900">Is option A relevant</h5>
                    <div class="custom-control custom-radio">
                        <input  type="radio" class="custom-control-input" id="customRadioA<?php echo $j; ?>" onclick="div('<?php echo $j; ?>-a')" name="A" value="1">
                        <label  class="custom-control-label"  for="customRadioA<?php echo $j; ?>">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadioa-<?php echo $j; ?>" onclick="div('<?php echo $j; ?>-a')" name="A" value="0">
                        <label class="custom-control-label"  for="customRadioa-<?php echo $j; ?>">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input  type="radio" class="custom-control-input" id="customRadioAa<?php echo $j; ?>" onclick="div('<?php echo $j; ?>-a')" name="A" value="">
                        <label class="custom-control-label"  for="customRadioAa<?php echo $j; ?>">Rephrase</label>
                        <input class="form-control" type="text" id="<?php echo $j; ?>-a" style="display: none" placeholder="Change / Rephrase" name="A">
 
                    </div>
        <!-- <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100  w-full">
        </div> -->
      </div>
      <div class=" md:w-1/2 flex flex-col items-start p-2">
        <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">Option B</span>
        <h5 class="title-font font-medium text-gray-900 ">Is option B relevant</h5>
        <div class="custom-control custom-radio">
                        <input  type="radio" class="custom-control-input" id="customRadioB<?php echo $j; ?>" onclick="div('<?php echo $j; ?>-b')" name="B" value="1">
                        <label  class="custom-control-label"  for="customRadioB<?php echo $j; ?>">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadiob-<?php echo $j; ?>" onclick="div('<?php echo $j; ?>-b')" name="B" value="0">
                        <label class="custom-control-label"  for="customRadiob-<?php echo $j; ?>">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input  type="radio" class="custom-control-input" id="customRadioBb<?php echo $j; ?>" onclick="div('<?php echo $j; ?>-b')" name="B" value="">
                        <label class="custom-control-label"  for="customRadioBb<?php echo $j; ?>">Rephrase</label>
                        <input class="form-control" type="text" id="<?php echo $j; ?>-b" style="display: none" placeholder="Change / Rephrase" name="B">
 
                    </div>
        <!-- <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
         
        </div> -->
        
      </div>
    </div>
  </div>
  <div class="container  mx-auto">
    <div class="flex flex-wrap">
      <div class=" md:w-1/2 flex flex-col items-start p-2">
        <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">Option C</span>
        <h5 class=" title-font font-medium text-gray-900">Is option C relevant</h5>
        <div class="custom-control custom-radio">
                        <input  type="radio" class="custom-control-input" id="customRadioC<?php echo $j; ?>" onclick="div('<?php echo $j; ?>-c')" name="C" value="1">
                        <label class="custom-control-label"  for="customRadioC<?php echo $j; ?>">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadioc<?php echo $j; ?>" onclick="div('<?php echo $j; ?>-c')" name="C" value="0">
                        <label class="custom-control-label"  for="customRadioc<?php echo $j; ?>">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadioCc<?php echo $j; ?>" onclick="div('<?php echo $j; ?>-c')" name="C" value="">
                        <label class="custom-control-label" for="customRadioCc<?php echo $j; ?>">Rephrase</label>
                        <input  class="form-control" type="text" id="<?php echo $j; ?>-c" style="display: none" placeholder="Change / Rephrase" name="C"><br>

                    </div>
        <!-- <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100  w-full">
        </div> -->
      </div>
      <div class=" md:w-1/2 flex flex-col items-start p-2">
        <span class="inline-block py-1 px-2 rounded bg-indigo-50 text-indigo-500 text-xs font-medium tracking-widest">Option D</span>
        <h5 class="title-font font-medium text-gray-900 ">Is option D relevant</h5>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadioD<?php echo $j; ?>" onclick="div('<?php echo $j; ?>-d')" name="D" value="1">
                        <label class="custom-control-label"  for="customRadioD<?php echo $j; ?>">Yes</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadiod<?php echo $j; ?>" onclick="div('<?php echo $j; ?>-d')" name="D" value="0">
                        <label class="custom-control-label"  for="customRadiod<?php echo $j; ?>">No</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="customRadioDd<?php echo $j; ?>" onclick="div('<?php echo $j; ?>-d')" name="D" value="">
                        <label class="custom-control-label"  for="customRadioDd<?php echo $j; ?>">Rephrase</label>
                        <input class="form-control" type="text" id="<?php echo $j; ?>-d" style="display: none" placeholder="Change / Rephrase" name="D">
                    </div>
                    <div>
        <!-- <div class="flex items-center flex-wrap pb-4 mb-4 border-b-2 border-gray-100 mt-auto w-full">
         
        </div> -->
              
      </div>
      
    </div>
    <div class="form-group p-4">
        <input type="submit" value="Next" class="btn btn-primary" onClick="formsub('<?php echo "user". $j; ?>',<?php echo $j; ?>)">
        </div> 
  </div>
</section>
        <?php
                echo '</div><div class="grid container">';
                $j++;
            }
            if($nodeList->item($i)->nodeValue != '+-----+'){
                echo $nodeList->item($i)->nodeValue . "<br>";
            }
            
            ++$i;
        }
        ?>
    </div>
    </form>
    <?php include 'footer.php';?>
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
                event.preventDefault();
                $.ajax({
                        url: "http://localhost/img/xhr/questions.php",
                        type: "GET",
                        data: {
                            'ID': ID,
                            'question': $formData
                        },
                        contentType: "application/json",
                    })
                    .done(function(res) {
                        if (display() == true && res['status'] == 200) {
                            window.location.href = "http://localhost/img/user_questions.php";
                        }
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
            const string = allDiv[count].innerHTML;
            const substring = "*-----*";
            count = count + 1;
            var end_string = string.includes(substring);
            return end_string;
        }
    </script>
