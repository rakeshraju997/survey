<?php
error_reporting(0);
include 'config.php';
$user_id = $_REQUEST['id'];
$query = "SELECT * FROM `topic` where `user_id` = $user_id";
$u_topics = mysqli_fetch_array(mysqli_query($sqlConnect, $query));

$page = file_get_contents('http://localhost/img/document.html');
$doc = new DOMDocument();
$doc->loadHTML($page);
$xpath = new DomXPath($doc);
$nodeList = $xpath->query("///span[@class='c0']");
$i = 0;
$j = 0; ?>
<h2>Topics Selected By the user</h2>
<?php foreach ($nodeList as $item) {
    if ($nodeList->item($i)->nodeValue[0] == '#') {
?>
        <input type="checkbox" value="1" name="topic<?php echo $i - 1; ?>" <?php if ($u_topics['topic' . ($i - 1)] == '1') {
                                                                                echo "checked disabled";
                                                                            } ?>>
<?php
        echo substr($nodeList->item($i)->nodeValue, 3) . "<br>";
    } else {
        echo $nodeList->item($i)->nodeValue . "<br>";
    }
    $i++;
}
?>
<hr>
<!-- //////////////////////// -->
<h2>Topics Suggested By the user</h2>
<?php
$query1 = mysqli_query($sqlConnect, "SELECT * FROM `topic_sugg` where user_id = $user_id");
while ($data1 = mysqli_fetch_assoc($query1)) {
    echo $data1['topic_sugg'] . "<br>";
}
?>
<hr>
<!-- //////////////////////// -->
<h2>User reviews on questions</h2>
<div class="grid container" style="display:block">
    <?php

    $query2 = mysqli_query($sqlConnect, "SELECT * FROM `questions` where user_id = $user_id");
    while($data2 = mysqli_fetch_array($query2)) {
      $temp['Q'] = $data2['Q']; 
      $temp['A'] = $data2['A']; 
      $temp['B'] = $data2['B']; 
      $temp['C'] = $data2['C']; 
      $temp['D'] = $data2['D']; 
      $value[] = $temp;
    }

    $page = file_get_contents('http://localhost/img/test.html');
    $doc = new DOMDocument();
    $doc->loadHTML($page);
    $xpath = new DomXPath($doc);
    $nodeList = $xpath->query("///span[@class='c0']");
    //var_dump($xpath);
    $i = 1;
    $j = 0;
    foreach ($nodeList as $item) {       
        if ($nodeList->item($i)->nodeValue == '+-----+') {
    ?>
            <b> Is the question relevant</b><br>
            <?php if($value[$j]['Q'] == '1' || $value[$j]['Q'] == null) { echo 'Yes'; }
            else { echo 'No'; }

            ?>           
            <div class="form-group">
                <b>Is option A relevant</b> <br>
            </div>
            <?php if($value[$j]['A'] == '1' || $value[$j]['A'] == null) { echo 'Yes'; }
            else if($value[$j]['A'] == '0') { echo 'No'; }
            else { echo "Rephrase : ". $value[$j]['A'];  }
            ?>  

            <div class="form-group">
                <b>Is option B relevant</b>
            </div>
            <?php if($value[$j]['B'] == '1' || $value[$j]['B'] == null) { echo 'Yes'; }
            else if($value[$j]['B'] == '0') { echo 'No'; }
            else { echo "Rephrase : ". $value[$j]['B'];  }
            ?>  
            <div class="form-group">
                <b>Is option C relevant</b>
            </div>
            <?php if($value[$j]['C'] == '1' || $value[$j]['C'] == null) { echo 'Yes'; }
            else if($value[$j]['C'] == '0') { echo 'No'; }
            else { echo "Rephrase : ". $value[$j]['C'];  }
            ?>  
            <div class="form-group">
                <b> Is option D relevant </b>
            </div>
            <?php if($value[$j]['D'] == '1' || $value[$j]['D'] == null) { echo 'Yes'; }
            else if($value[$j]['D'] == '0') { echo 'No'; }
            else { echo "Rephrase : ". $value[$j]['D'];  }
            ?>  
            <br>

    <?php
            echo '</div><div class="grid container">';
            $j++;
        }
        if ($nodeList->item($i)->nodeValue != '+-----+') {
            echo $nodeList->item($i)->nodeValue . "<br>";
        }

        ++$i;
    }
    ?>
</div>