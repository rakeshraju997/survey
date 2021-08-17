<?php
error_reporting(0);
include 'header.php';
include 'config.php';
$key = array("", "0", "1");
?>
<div class="grid container p-4" style="display:block">
    <?php
    $page = file_get_contents('http://localhost/img/test.html');
    $doc = new DOMDocument();
    $doc->loadHTML($page);
    $xpath = new DomXPath($doc);
    $nodeList = $xpath->query("///span[@class='c0']");
    $j = 1;
    $p = 1;
    foreach ($nodeList as $item) {        
        if ($nodeList->item($j)->nodeValue != '+-----+') {            
            echo $nodeList->item($j)->nodeValue . "<br>";
        } else if ($nodeList->item($j)->nodeValue == '+-----+') { 
            $question_id = $p; // $_REQUEST['id'];
            $i = 0;
            $query = "SELECT * FROM `questions` where `question_no` = $question_id";
            $questions = mysqli_query($sqlConnect, $query);
            unset($oq, $oa, $ob, $oc, $od);
            while ($data = mysqli_fetch_assoc($questions)) {
                $oq[] = $data['Q'];
                $oa[] = $data['A'];
                $ob[] = $data['B'];
                $oc[] = $data['C'];
                $od[] = $data['D'];
                $i++;
            }
            $optionq = array_count_values($oq);
            $optiona = array_count_values($oa);
            $optionb = array_count_values($ob);
            $optionc = array_count_values($oc);
            $optiond = array_count_values($od);

            $qyes = Round(($optionq['yes'] / $i) * 100);
            $qno = Round(($optionq['no'] / $i) * 100);
            $qnull = Round(($optionq[''] / $i) * 100);

            $ayes = Round(($optiona['1'] / $i) * 100);
            $ano = Round(($optiona['0'] / $i) * 100);
            $anull = Round(($optiona[''] / $i) * 100);

            $byes = Round(($optionb['1'] / $i) * 100);
            $bno = Round(($optionb['0'] / $i) * 100);
            $bnull = Round(($optionb[''] / $i) * 100);

            $cyes = Round(($optionc['1'] / $i) * 100);
            $cno = Round(($optionc['0'] / $i) * 100);
            $cnull = Round(($optionc[''] / $i) * 100);

            $dyes = Round(($optiond['1'] / $i) * 100);
            $dno = Round(($optiond['0'] / $i) * 100);
            $dnull = Round(($optiond[''] / $i) * 100);
    ?>
            Is the Question relevent :<br>
            Yes : <?php echo $qyes; ?>% | No : <?php echo $qno; ?>% | Null : <?php echo $qnull; ?>%<br>

            <br>Is the Option A relevent : <br>
            Yes : <?php echo $ayes; ?>% | No : <?php echo $ano; ?>% | Null : <?php echo $anull; ?>%<br>
            Rephrases :
            <?php foreach (array_keys($optiona) as $rephrasea) {
                if (!in_array($rephrasea, $key)) {
                    echo $rephrasea . ", ";
                }
            } ?>
            <br><br>Is the Option B relevent : <br>
            Yes : <?php echo $byes; ?>% | No : <?php echo $bno; ?>% | Null : <?php echo $bnull; ?>%<br>
            Rephrases :
            <?php foreach (array_keys($optionb) as $rephraseb) {
                if (!in_array($rephraseb, $key)) {
                    echo $rephraseb . ", ";
                }
            } ?>
            <br><br>Is the Option C relevent : <br>
            Yes : <?php echo $cyes; ?>% | No : <?php echo $cno; ?>% | Null : <?php echo $cnull; ?>%<br>
            Rephrases :
            <?php foreach (array_keys($optionc) as $rephrasec) {
                if (!in_array($rephrasec, $key)) {
                    echo $rephrasec . ", ";
                }
            } ?>
            <br><br>Is the Option D relevent : <br>
            Yes : <?php echo $dyes; ?>% | No : <?php echo $dno; ?>% | Null : <?php echo $dnull; ?>%<br>
            Rephrases :
    <?php foreach (array_keys($optiond) as $rephrased) {
                if (!in_array($rephrased, $key)) {
                    echo $rephrased . ", ";
                }
            }
            $p++;                                
            echo "<br>------------------------------------<br>";
            
        }
        ++$j;
    }
    ?>
</div>

<?php include 'footer.php'; ?>