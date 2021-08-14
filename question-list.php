<?php include 'header.php'; ?>
<?php include 'config.php';
$query = "SELECT DISTINCT question_no FROM `questions` order by 'question_no'";
$question = mysqli_query($sqlConnect, $query); ?>
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-10">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">User List</h1>
        </div>
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ID</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Question</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    while ($data = mysqli_fetch_array($question)) { ?>
                        <tr>
                            <td class="px-4 py-3"><?php echo $i; ?></td>
                            <td class="px-4 py-3"><a href="question-view.php?id=<?php echo $data['question_no']; ?>"><?php echo ucwords($data['question_no']); ?></a></td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>