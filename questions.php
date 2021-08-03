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
                <input type="radio"  name="Q<?php echo $j;?>-q" value="yes">Yes 
                <input type="radio"  name="Q<?php echo $j;?>-q" value="no">No<br>
                Is option A relevant <br>
                <input type="radio"  name="Q<?php echo $j;?>-a" value="yes">Yes 
                <input type="radio"  name="Q<?php echo $j;?>-a" value="no">No<br>
                <input type="text" placeholder="Change / Rephrase" name="Q<?php echo $j;?>-a"><br>
                Is option B relevant <br>
                <input type="radio"  name="Q<?php echo $j;?>-b" value="yes">Yes 
                <input type="radio"  name="Q<?php echo $j;?>-b" value="no">No<br>
                <input type="text" placeholder="Change / Rephrase" name="Q<?php echo $j;?>-b"><br>
                Is option C relevant <br>
                <input type="radio"  name="Q<?php echo $j;?>-c" >Yes 
                <input type="radio"  name="Q<?php echo $j;?>-c" >No<br>
                <input type="text" placeholder="Change / Rephrase" name="Q<?php echo $j;?>-c"><br>
                Is option D relevant <br>
                <input type="radio"  name="Q<?php echo $j;?>-d" value="yes">Yes 
                <input type="radio"  name="Q<?php echo $j;?>-d" value="no">No<br>
                <input type="text" placeholder="Change / Rephrase" name="Q<?php echo $j;?>-d"><br> 
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
function formsub(form_id,ID){
    console.log(ID)
    $( '#'+form_id ).submit(function( event ) {
        
        var $formData = $('#'+form_id).serializeArray();
        // var formData = JSON.stringify($('#user1').serializeObject());
        // console.log(formData);
        event.preventDefault();
        display();

        var data = JSON.stringify($formData)
        console.log(data);
        // $.ajax({
        // url: "https://script.google.com/macros/s/AKfycbzSmvFjjzj9X82AbDVyYCKy1QprfC06Q5WcuBFmqB8fbFP0YwWQ_LOmVc0PwvYjtR-Vsw/exec",
        // type: "POST",
        // data: data,
        // contentType: "application/json",
        // dataType: 'jsonp'
        // })
        // .done(function(res) {
        // console.log('success')
        // })
        // .fail(function(e) {
        // console.log(e)
        // });

        // window.receipt = function(res) {
        // // this function will execute upon finish
        // }
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
