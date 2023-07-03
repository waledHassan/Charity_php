<?php 
include("template/head.php");
include("template/header.php");
?>


        
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
            <div class="section-header text-center">
                    <p> اضف تعليقك</p>
                    <h2> رأيك يهمنا</h2>
                </div>
                <div class="contact-img">
                    <img src="img/قسم-الجاليات.png" alt="Image">
                </div>
                <div class="contact-form">
                        <div id="success"></div>
                        <form name="sentMessage" id="" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" style='text-align:right;' class="form-control" id="name" placeholder="الاسم" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" style='text-align:right;' class="form-control" id="phone" placeholder="الهاتف" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" style='text-align:right;' class="form-control" id="jop" placeholder="الوظيفة" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea style='text-align:right;' class="form-control" id="message" placeholder=" اكتب تعليقك هنا" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <div class="btn btn-custom" id="sendButton">ارسال</div>
                            </div>
                        </form>
                        <div id="resultdiv"></div>
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

     $("#sendButton").on("click", function () {
              console.log('test');
            var name = $("#name").val();
            var phone = $("#phone").val();
            var jop = $("#jop").val();
            var message = $("#message").val();

       $.ajax({
            type: "POST",
            url: 'comments.php',
            data: {name , phone , jop , message},
            success: function(data){

            $("#resultdiv").html(data);
            $('input , textarea').val('');

            }

        });

    });
</script>