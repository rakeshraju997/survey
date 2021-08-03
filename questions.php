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
/* input,
textarea {
     -moz-user-select: text;
} */
</style>
<div class="grid" style="display:block">
<?php 

error_reporting(0);


$page = file_get_contents('http://localhost/img/test.html');
$doc = new DOMDocument();
$doc->loadHTML($page);   

$xpath = new DomXPath($doc);

$nodeList = $xpath->query("///span[@class='c1']");
$i=0;$j=1;
foreach($nodeList as $item){

    if($nodeList->item($i)->nodeValue == '+-----+'){

        ?>
            <form id="user<?php echo $j;?>" method="POST">
                Is the question relevant<br> 
                <?php echo $j;?>
                <input type="radio"  name="Q" value="1">Yes 
                <input type="radio"  name="Q" value="0">No<br>
                Is option A relevant <br>
                <input type="radio" onclick="div('<?php echo $j; ?>-a')" name="A" value="1">Yes
                <input type="radio" onclick="div('<?php echo $j; ?>-a')" name="A" value="0">No
                <input type="radio" onclick="div('<?php echo $j; ?>-a')" name="A" value="">Rephrase
                <input type="text" id="<?php echo $j; ?>-a" style="display: none" placeholder="Change / Rephrase" name="A"><br>
                Is option B relevant <br>
                <input type="radio" onclick="div('<?php echo $j; ?>-b')" name="B" value="1">Yes
                <input type="radio" onclick="div('<?php echo $j; ?>-b')" name="B" value="0">No
                <input type="radio" onclick="div('<?php echo $j; ?>-b')" name="B" value="">Rephrase
                <input type="text" id="<?php echo $j; ?>-b" style="display: none" placeholder="Change / Rephrase" name="B"><br>
                Is option C relevant <br>
                <input type="radio" onclick="div('<?php echo $j; ?>-c')" name="C" value="1">Yes
                <input type="radio" onclick="div('<?php echo $j; ?>-c')" name="C" value="0">No
                <input type="radio" onclick="div('<?php echo $j; ?>-c')" name="C"  value="">Rephrase
                <input type="text" id="<?php echo $j; ?>-c" style="display: none" placeholder="Change / Rephrase" name="C"><br>
                Is option D relevant <br>
                <input type="radio" onclick="div('<?php echo $j; ?>-d')" name="D" value="1">Yes
                <input type="radio" onclick="div('<?php echo $j; ?>-d')" name="D" value="0">No
                <input type="radio" onclick="div('<?php echo $j; ?>-d')" name="D" value="">Rephrase
                <input type="text" id="<?php echo $j; ?>-d" style="display: none" placeholder="Change / Rephrase" name="D"><br>

                <input type="submit" value="Next" onClick="formsub('<?php echo "user".$j;?>',<?php echo $j;?>)">
            
                <hr><hr>
            </form>
        <?php
        echo '</div><div class="grid">';$j++;
        
    }
    echo $nodeList->item($i)->nodeValue."<br>";

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
            document.getElementById(id).value='';
            $('#' + id).hide();
        }
    }

function formsub(form_id,ID){
    $( '#'+form_id ).submit(function( event ) {
        
        var $formData = $("#"+form_id+" :input[value!='']").serializeArray();
        // var formData = JSON.stringify($('#user1').serializeObject());
        // console.log(formData);
        event.preventDefault();
        display();

        var data = JSON.stringify($formData)
        console.log(data);
        $.ajax({
        url: "http://localhost/img/xhr/questions.php",
        type: "GET",
        data: {'ID' : ID,'question' : $formData},
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
    var allDiv= document.querySelectorAll('.grid');
    console.log(allDiv);
    var count=1;
    function display(){
        
        if (count >= allDiv.length){
            count = 1;
        }
        for (let i = 0; i < allDiv.length; i++) {
            
            allDiv[i].style.display = 'none';
        }
        allDiv[count].style.display = 'block';
        count = count + 1;
    }
</script>
