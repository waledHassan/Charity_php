<?php 
include("template/head.php");
include("template/header.php");
?>


        
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
            <div class="section-header text-center">
                    <p>تواصل معنا</p>
                    <h2>تواصل معنا عن اي سؤال</h2>
                </div>
                <div class="contact-img">
                    <img src="img/قسم-الجاليات.png" alt="Image">
                </div>
                <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="الاسم" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="الايميل" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="الموضوع" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="message" placeholder=" اكتب رسالتك هنا" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <div class="btn btn-custom" type="submit" id="sendMessageButton">ارسال</div>
                            </div>
                        </form>
                        <div id="result"></div>
                        </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Footer Start -->
        <?php 
include("template/footer.php");
include("template/script.php");
?>
        
        <!-- Back to top button -->
      
<script>

     $("#sendMessageButton").on("click", function () {
              
            var name = $("#name").val();
            var email = $("#email").val();
            var subject = $("#subject").val();
            var message = $("#message").val();

       $.ajax({
            type: "POST",
            url: 'message.php',
            data: {name , email , subject , message},
            success: function(data){

            $("#result").html(data);
            $('input , textarea').val('');

            }

        });

    });
</script>