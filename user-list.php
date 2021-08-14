<?php include 'header.php'; ?>
<?php include 'config.php';
$query = "SELECT * FROM `users` order by 'user_id'";
$users = mysqli_query($sqlConnect, $query); ?>
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
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Name</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_array($users)) { ?>
                        <tr>
                            <td class="px-4 py-3"><?php echo $data['user_id']; ?></td>
                            <td class="px-4 py-3"><a href="user-view.php?id=<?php echo $data['user_id']; ?>"><?php echo ucwords($data['user_name']); ?></a></td>
                            <td class="px-4 py-3"><?php echo $data['phone']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>