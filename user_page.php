
<?php include 'header.php';?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Details</a>
</nav>
<form id="user_form">
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto  form p-4">
<h3>Enter your details</h3><br>
    <div class="form-group">
        <label for="username">First of all Please Enter Your name</label>
        <input type="text" class="form-control"  placeholder="Enter your name" name="user_name"><br>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control"  placeholder="Enter your email" name="email"><br>
    </div>
    <div class="form-group">
        <label for="contact">Contact no</label>
        <input type="text" class="form-control"  placeholder="Enter your phone number" name="phone"><br>
    </div>
    <div class="text-center">
    <input type="submit" class="btn btn-primary">
    </div>
</div>
</form>
<?php include 'footer.php';?>
<script type="text/javascript">
$('#user_form').submit(function( event ) {
        var $formData = $('#user_form').serializeArray();
        event.preventDefault();
        $.ajax({
        url: "http://localhost/img/xhr/user_details.php",
        type: "GET",
        data: {'user_name' : $formData[0]['value'],'email' : $formData[1]['value'],'phone' : $formData[2]['value']},
        contentType: "application/json"
        // dataType: "jsonp"
        })
        .done(function(res) {
            if(res['status'] == 200){
                window.location.href="http://localhost/img/topic.php";
            }
        console.log('success');
        })
        .fail(function(e) {
        console.log('error')
        });
    });

</script>
</body>
</html>