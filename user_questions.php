<?php include 'header.php'; ?>
<style>
    .form-input {
        margin: -12px 6px 0px;
        position: absolute;
    }

    .form-inputs {
        margin: 6px 11px 0px;
        position: absolute;
    }

    .close-qstn-field {
        position: relative;
    top: 7%;
    margin-left: 88%;
    }
    .skip_txt{
        font-size: 18px;
        font-family: sans-serif;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Suggest Your Questions</a>
</nav>
<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full">
            <h1 style="font-size: 1.4em;" class="sm:text-3xl  font-medium title-font mb-4 text-gray-900">Add new questions now.</h1>
            <!-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify.</p> -->
        </div>
       
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <form class="" id="user_questions" method="POST">
                <div class="question-form flex flex-wrap -m-2">
                    <h4>Question 1</h4>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="message" class="leading-7 text-sm text-gray-600">Enter your question here.</label>
                            <textarea id="message" name="question" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" required></textarea>
                        </div>
                    </div>
                    <div class="w3-quarter w3-container p-2 ">
                        <label for="name" class="leading-7 text-sm text-gray-600">Option 1</label>
                        <input type="text" id="name" name="A" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required><br>
                    </div>
                    <div class="w3-quarter w3-container p-2 ">
                        <label for="name" class="leading-7 text-sm text-gray-600">Option 2</label>
                        <input type="text" id="name" name="B" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                    </div>
                    <div class="w3-quarter w3-container p-2 ">
                        <label for="name" class="leading-7 text-sm text-gray-600">Option 3</label>
                        <input type="text" id="name" name="C" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                    </div>
                    <div class="w3-quarter w3-container p-2">
                        <label for="name" class="leading-7 text-sm text-gray-600">Option 4</label>
                        <input type="text" id="name" name="D" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button class="add-question-button flex  text-white bg-indigo-500  border-0 py-2 px-8 focus:outline-none rounded text-sm">Add more</button>
                </div>
                <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                    <!-- content -->
                </div>
        </div>
       <div class="text-center">
            <div class="p-2 custom-control-inline">
                <button type="submit" class="flex text-white mx-auto bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-500 rounded">Submit</button>
            </div>
            <a href="finalmsg.php" class="custom-control-inline skip_txt text-indigo-500 inline-flex items-center ml-4">Skip
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
            </a>
        </div>
        
        </form>
    </div>
    </div>
</section>
<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function() {
        var user_name = <?php echo json_encode($_SESSION['user_name']); ?>;
        var user_id = <?php echo json_encode($_SESSION['user_id']); ?>;

        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".question-form"); //Fields wrapper
        var add_button = $(".add-question-button"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click                
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                // alert(x);
                $(wrapper).append('<div class="question-form flex flex-wrap -m-2"><h4 class="font-medium title-font text-gray-900 form-inputs">Question ' + x + '</h4><button type="button" class="close close_qstn remove_field close-qstn-field" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="p-2 w-full "><div class="w3-quarter w3-container p-2 "><label for="message" class="leading-7 text-sm text-gray-600">Enter your question here.</label><textarea id="message" name="question" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea></div></div><div class="w3-quarter w3-container p-2 "><label for="name" class="leading-7 text-sm text-gray-600">Option 1</label><input type="text" id="name" name="A" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></div><div class="w3-quarter w3-container p-2 "><label for="name" class="leading-7 text-sm text-gray-600">Option 2</label><input type="text" id="name" name="B" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></div><div class="w3-quarter w3-container p-2 "><label for="name" class="leading-7 text-sm text-gray-600">Option 3</label><input type="text" id="name" name="C" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></div><div class="w3-quarter w3-container p-2 "><label for="name" class="leading-7 text-sm text-gray-600">Option 4</label><input type="text" id="name" name="D" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></div></div><br></div>'); //add input box
            }
        });
        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })

        //ajax
        $('#user_questions').submit(function(event) {
            var $formData = $('#user_questions').serializeArray();
            console.log($formData);
            event.preventDefault();
            let i = 0;
            let qNO = 0
            for (let j = 1; j <= x; j++) {
                let data = {}
                qNO = qNO + 5;
                for (i; i < qNO; i++) {
                    data[$formData[i]['name']] = $formData[i]['value'];
                }
                data['userName'] = user_name;
                data['userID'] = user_id;
                $.ajax({
                        url: "https://script.google.com/macros/s/AKfycbxQfXC7mLdb4VazkLhpucz_z1A0VGUAqbmle1k7xuVGPMgo2nONOywWc5w_TOVGNZvN/exec",
                        type: "POST",
                        data: data,
                        contentType: "application/javascript",
                        dataType: 'jsonp'
                    })
                    .done(function(res) {

                        console.log('success')
                    })
                    .fail(function(e) {
                        window.location.href = "<?php echo $site_name;?>/finalmsg.php";
                        console.log("error")
                    });

                window.receipt = function(res) {
                    // this function will execute upon finish
                }
            }
        });
    });
</script>