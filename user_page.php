<style>
    .inp {
  position: relative;
  margin: auto;
  width: 100%;
  max-width: 280px;
  border-radius: 7px;
  overflow: hidden;
}
.inp .label {
  position: absolute;
  top: 14px;
  left: 12px;
  font-size: 16px;
  color: rgba(0, 0, 0, 0.5);
  font-weight: 500;
  transform-origin: 0 0;
  transform: translate3d(0, 0, 0);
  transition: all 0.2s ease;
  pointer-events: none;
}
.inp .focus-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.05);
  z-index: -1;
  transform: scaleX(0);
  transform-origin: left;
}
.inp input {
  -webkit-appearance: none;
  -moz-appearance: none;
       appearance: none;
  width: 100%;
  border: 0;
  font-family: inherit;
  padding: 16px 12px 0 12px;
  height: 48px;
  font-size: 16px;
  font-weight: 400;
  background: rgba(0, 0, 0, 0.02);
  box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.3);
  color: #000;
  transition: all 0.15s ease;
}
.inp input:hover {
  background: rgba(0, 0, 0, 0.04);
  box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.5);
}
.inp input:not(:-moz-placeholder-shown) + .label {
  color: rgba(0, 0, 0, 0.5);
  transform: translate3d(0, -12px, 0) scale(0.75);
}
.inp input:not(:-ms-input-placeholder) + .label {
  color: rgba(0, 0, 0, 0.5);
  transform: translate3d(0, -12px, 0) scale(0.75);
}
.inp input:not(:placeholder-shown) + .label {
  color: rgba(0, 0, 0, 0.5);
  transform: translate3d(0, -12px, 0) scale(0.75);
}
.inp input:focus {
  background: rgba(0, 0, 0, 0.05);
  outline: none;
  box-shadow: inset 0 -2px 0 #0077FF;
}
.inp input:focus + .label {
  color: #0077FF;
  transform: translate3d(0, -12px, 0) scale(0.75);
}
.inp input:focus + .label + .focus-bg {
  transform: scaleX(1);
  transition: all 0.1s ease;
}  p{
  text-align: justify;
  text-justify: inter-word;
}
</style>
<?php include 'header.php';?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Details</a>
</nav>
<form id="user_form">
<section class="text-gray-600 body-font">
  <div class="container px-4 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
      <h1 class="title-font font-medium text-3xl text-gray-900">
      Welcome to Mentor Merlin!
            </h1>
            <!-- <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="https://localhost/img/pictures/UK-Education.jpg"> -->

      <p class="leading-relaxed mt-4">
      Mentor Merlin is the largest and leading NMC CBT training provider in the world. Mentor Merlin’s NMC CBT online practice and NMC CBT mock test include previously asked Latest NMC CBT exam questions and answers. Our NMC CBT Exam Preparation course is developed by a team of well-experienced nursing professionals. We regularly update our NMC CBT guide to the nurses seeking nursing jobs in the UK, hence our material is based on the upgraded syllabus with constant researches.
        </p>
    </div>
   
    <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
      <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Enter Your Details</h2>
      
      <div class="relative mb-4">
        <label for="inp" class="inp">
        <input type="text" name="user_name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  placeholder="&nbsp;">
        <span class="label">Name</span>
        <span class="focus-bg"></span>
        </label>
    </div>
    <div class="relative mb-4">
        <label for="inp" class="inp">
        <input type="text" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  placeholder="&nbsp;">
        <span class="label">Email</span>
        <span class="focus-bg"></span>
        </label>
    </div>
    <div class="relative mb-4">
        <label for="inp" class="inp leading-7 text-sm text-gray-600">
        <input type="text" name="phone" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  placeholder="&nbsp;">
        <span class="label">Contact no</span>
        <span class="focus-bg"></span>
        </label>
    </div>
     
      <button style="text-decoration: none" id="user_form"  class="text-center text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit">Next</button>
    </div>
  </div>
</section>
</form>
<!-- <form id="user_form">
<div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto  form p-4">
<h3>Enter your details</h3><br>

    <div class="form-group">
        <label for="username" class="inp"></label>
        <input type="text" class="form-control"  id="inp" placeholder="&nbsp;" name="user_name"><br>
        <span class="label">Enter your name</span>
        <span class="focus-bg"></span>
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
</form> -->
<?php include 'footer.php';?>
<script type="text/javascript">
$('#user_form').submit(function( event ) {
        var $formData = $('#user_form').serializeArray();
        event.preventDefault();
        console.log($formData);
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
