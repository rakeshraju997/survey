<?php
error_reporting(0);
include 'header.php';
include 'config.php';
$user_id = $_REQUEST['id'];
$query = "SELECT * FROM `topic` where `user_id` = $user_id";
$u_topics = mysqli_fetch_array(mysqli_query($sqlConnect, $query));

$query1 = "SELECT * FROM `users` where `user_id` = $user_id";
$user_data = mysqli_fetch_array(mysqli_query($sqlConnect, $query1));

$page = file_get_contents('http://localhost/img/document.html');
$doc = new DOMDocument();
$doc->loadHTML($page);
$xpath = new DomXPath($doc);
$nodeList = $xpath->query("///span[@class='c0']");
$i = 0;
$j = 0; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Review</a>
</nav>

<!-- ///////////////////////////////////// -->
<section class="text-gray-600 body-font">
    <div class="container px-5 pt-5 mx-auto">
        <div class="flex flex-wrap -m-2">
            <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                    <div class="flex-grow">
                        <h2 class="text-gray-900 title-font font-medium"><?php echo ucwords($user_data['user_name']); ?></h2>
                        <svg style="float: left;margin: 7px 5px;" fill="grey" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20" height="20" viewBox="0 0 122.879 88.855" enable-background="new 0 0 122.879 88.855" xml:space="preserve">
                            <g>
                                <path d="M7.048,0h108.784c1.939,0,3.701,0.794,4.977,2.069c1.277,1.277,2.07,3.042,2.07,4.979v74.759 c0,1.461-0.451,2.822-1.221,3.951c-0.141,0.365-0.361,0.705-0.662,0.994c-0.201,0.189-0.422,0.344-0.656,0.461 c-1.225,1.021-2.799,1.643-4.508,1.643H7.048c-1.937,0-3.701-0.793-4.979-2.07C0.794,85.51,0,83.748,0,81.807V7.048 c0-1.941,0.792-3.704,2.068-4.979C3.344,0.792,5.107,0,7.048,0L7.048,0z M5.406,78.842l38.124-38.22L5.406,9.538V78.842 L5.406,78.842z M47.729,44.045L8.424,83.449h105.701L76.563,44.051L64.18,54.602l0,0c-0.971,0.83-2.425,0.877-3.453,0.043 L47.729,44.045L47.729,44.045z M80.674,40.549l36.799,38.598V9.198L80.674,40.549L80.674,40.549z M8.867,5.406l53.521,43.639 l51.223-43.639H8.867L8.867,5.406z" />
                            </g>
                        </svg>
                        <h4 class="text-gray-500"><?php echo $user_data['email']; ?></h4>
                        <svg style="float: left;margin: 5px;" version="1.1" fill="grey" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20" height="20" viewBox="0 0 122.88 122.267" enable-background="new 0 0 122.88 122.267" xml:space="preserve">
                            <g>
                                <path d="M33.822,50.291c4.137,7.442,8.898,14.604,15.074,21.133C55.1,77.984,62.782,83.962,72.771,89.03l0.01,0.005l0.002-0.005 c0.728,0.371,1.421,0.362,2.072,0.118c0.944-0.353,1.927-1.137,2.883-2.086c0.729-0.726,1.643-1.924,2.631-3.223 c3.846-5.054,8.601-11.301,15.314-8.193c0.142,0.065,0.276,0.141,0.402,0.226l22.373,12.852c0.08,0.046,0.157,0.095,0.23,0.147 c2.966,2.036,4.177,5.172,4.19,8.683c0.014,3.621-1.329,7.674-3.274,11.101c-2.565,4.517-6.387,7.502-10.761,9.525 c-4.17,1.928-8.798,2.954-13.267,3.608c-6.989,1.025-13.578,0.374-20.288-1.692c-6.55-2.017-13.176-5.385-20.4-9.86l-0.526-0.326 c-3.326-2.06-6.906-4.276-10.389-6.904C31.108,93.296,18.007,79.283,9.512,63.904C2.361,50.958-1.552,36.995,0.581,23.681 C1.75,16.375,4.901,9.743,10.333,5.35c4.762-3.853,11.188-5.94,19.448-5.203c0.973,0.084,1.793,0.639,2.255,1.419l0.006-0.003 l14.324,24.27c2.11,2.718,2.344,5.415,1.203,8.096c-0.943,2.218-2.892,4.251-5.476,6.168c-0.786,0.65-1.708,1.325-2.659,2.021 C36.236,44.459,32.578,47.136,33.822,50.291L33.822,50.291z M44.67,75.422C38.066,68.44,33.035,60.88,28.695,53.065 c-0.076-0.123-0.144-0.253-0.202-0.39c-3.174-7.459,2.52-11.625,7.493-15.262c0.845-0.618,1.663-1.217,2.401-1.829l0.002,0.003 c0.043-0.036,0.088-0.071,0.135-0.105c1.843-1.354,3.171-2.647,3.678-3.837c0.289-0.679,0.182-1.426-0.466-2.265 c-0.111-0.129-0.213-0.271-0.303-0.423L27.795,5.852c-5.869-0.241-10.419,1.321-13.784,4.044 c-4.239,3.429-6.723,8.759-7.674,14.699c-1.905,11.894,1.716,24.594,8.292,36.5c8.078,14.623,20.575,27.977,32.864,37.25 c3.379,2.55,6.776,4.653,9.932,6.607l0.526,0.326c6.818,4.223,13.017,7.386,19.052,9.244c5.876,1.809,11.634,2.38,17.729,1.486 c4.009-0.587,8.113-1.485,11.668-3.129c3.351-1.55,6.248-3.785,8.134-7.104c1.496-2.637,2.53-5.653,2.521-8.222 c-0.006-1.63-0.472-3.029-1.605-3.844L93.2,80.93c-2.461-1.081-5.629,3.081-8.193,6.45c-1.104,1.452-2.125,2.792-3.156,3.817 c-1.477,1.466-3.118,2.723-4.962,3.411c-2.136,0.799-4.395,0.834-6.755-0.37l0.002-0.004C59.522,88.849,51.323,82.457,44.67,75.422 L44.67,75.422z" />
                            </g>
                        </svg>
                        <h4 class="text-gray-500"><a href="tel:<?php echo $user_data['phone']; ?>"><?php echo $user_data['phone']; ?></a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /////////////////////////////////////// -->


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
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="<?php if ($u_topics['topic' . ($i - 1)] == '1') {
                                                                                                                                        echo "text-blue-500";
                                                                                                                                    } else {
                                                                                                                                        echo "text-gray-500";
                                                                                                                                    } ?> w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                        <path d="M22 4L12 14.01l-3-3"></path>
                    </svg>

                    <span class="title-font font-medium">
                        <?php
                        echo substr($nodeList->item($i)->nodeValue, 3) . "<br>"; ?>
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
    while ($data1 = mysqli_fetch_assoc($query1)) { ?>
        <div class="p-2 sm:w-1/2 w-full">
            <div class="bg-gray-100 rounded flex p-3 h-full items-center">
                <span class="title-font font-medium">
                    <?php echo $data1['topic_sugg']; ?>
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
        while ($data2 = mysqli_fetch_array($query2)) {
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
                <?php if ($value[$j]['Q'] == '1' || $value[$j]['Q'] == null) {
                    echo 'Yes';
                } else {
                    echo 'No';
                }

                ?>

                <br><b>Is option A relevant ? :</b>

                <?php if ($value[$j]['A'] == '1' || $value[$j]['A'] == null) {
                    echo 'Yes';
                } else if ($value[$j]['A'] == '0') {
                    echo 'No';
                } else {
                    echo "Rephrased : " . $value[$j]['A'];
                }
                ?>


                <br><b>Is option B relevant ? :</b>
                <?php if ($value[$j]['B'] == '1' || $value[$j]['B'] == null) {
                    echo 'Yes';
                } else if ($value[$j]['B'] == '0') {
                    echo 'No';
                } else {
                    echo "Rephrased : " . $value[$j]['B'];
                }
                ?>

                <br><b>Is option C relevant ? :</b>
                <?php if ($value[$j]['C'] == '1' || $value[$j]['C'] == null) {
                    echo 'Yes';
                } else if ($value[$j]['C'] == '0') {
                    echo 'No';
                } else {
                    echo "Rephrased : " . $value[$j]['C'];
                }
                ?>

                <br><b> Is option D relevant ? :</b>
                <?php if ($value[$j]['D'] == '1' || $value[$j]['D'] == null) {
                    echo 'Yes';
                } else if ($value[$j]['D'] == '0') {
                    echo 'No';
                } else {
                    echo "Rephrased : " . $value[$j]['D'];
                }
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