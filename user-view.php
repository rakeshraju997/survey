<?php
error_reporting(0);
include 'header.php';
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
<style>.grid{display:block;}</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Review</a>
</nav>
<div class="container px-5 pt-12 mx-auto">
    <div class="flex flex-wrap w-full">
      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Topics Selected By the user</h1>
        <div class="h-1 w-20 bg-blue-500 rounded"></div>
      </div>
</div>
</div>
<div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">

    <?php foreach ($nodeList as $item) {
    if ($nodeList->item($i)->nodeValue[0] == '#') {
?>
    <div class="p-2 sm:w-1/2 w-full">
        <div class="bg-gray-100 rounded flex p-3 h-full items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                class="<?php if ($u_topics['topic' . ($i - 1)] == '1') {  echo "text-blue-500";}else{ echo "text-gray-500";} ?> w-6 h-6 flex-shrink-0 mr-4"
                viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
            </svg>

            <span class="title-font font-medium">
                <?php
        echo substr($nodeList->item($i)->nodeValue, 3) . "<br>";?>
            </span>
        </div>
    </div>
    <?php } else {
        //echo $nodeList->item($i)->nodeValue . "<br>";
    }
    $i++;
}
?>
</div>
<hr>
<!-- //////////////////////// -->
<div class="container px-5 pt-12 mx-auto">
    <div class="flex flex-wrap w-full">
      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Topics Suggested By the user</h1>
        <div class="h-1 w-20 bg-blue-500 rounded"></div>
      </div>
    </div>
</div>
<div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
    <?php
    $query1 = mysqli_query($sqlConnect, "SELECT * FROM `topic_sugg` where user_id = $user_id");
    while ($data1 = mysqli_fetch_assoc($query1)) {?>
    <div class="p-2 sm:w-1/2 w-full">
        <div class="bg-gray-100 rounded flex p-3 h-full items-center">
            <span class="title-font font-medium">
              <?php  echo $data1['topic_sugg'];?>
            </span>
        </div>
    </div>        
    <?php }
    ?>
</div>
<hr>
<!-- //////////////////////// -->
<div class="container px-5 pt-12 mx-auto">
    <div class="flex flex-wrap w-full">
      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">User reviews on questions</h1>
        <div class="h-1 w-20 bg-blue-500 rounded "></div>
      </div>
    </div>
</div>
<div class="flex flex-wrap lg:w-4/5 pt-4 sm:mx-auto sm:mb-2 -mx-2">
<div class="grid container " style="display:block">
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
    <b> Is the question relevant ? :</b>
    <?php if($value[$j]['Q'] == '1' || $value[$j]['Q'] == null) { echo 'Yes'; }
            else { echo 'No'; }

            ?>
    
    <br><b>Is option A relevant ? :</b>

    <?php if($value[$j]['A'] == '1' || $value[$j]['A'] == null) { echo 'Yes'; }
            else if($value[$j]['A'] == '0') { echo 'No'; }
            else { echo "Rephrased : ". $value[$j]['A'];  }
            ?>

    
    <br><b>Is option B relevant ? :</b>
    <?php if($value[$j]['B'] == '1' || $value[$j]['B'] == null) { echo 'Yes'; }
            else if($value[$j]['B'] == '0') { echo 'No'; }
            else { echo "Rephrased : ". $value[$j]['B'];  }
            ?>
    
    <br><b>Is option C relevant ? :</b>
    <?php if($value[$j]['C'] == '1' || $value[$j]['C'] == null) { echo 'Yes'; }
            else if($value[$j]['C'] == '0') { echo 'No'; }
            else { echo "Rephrased : ". $value[$j]['C'];  }
            ?>

    <br><b> Is option D relevant ? :</b>
    <?php if($value[$j]['D'] == '1' || $value[$j]['D'] == null) { echo 'Yes'; }
            else if($value[$j]['D'] == '0') { echo 'No'; }
            else { echo "Rephrased : ". $value[$j]['D'];  }
            ?>
    <br><br>

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
</div>