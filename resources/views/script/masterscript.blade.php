<script>
    $(document).ready(function(){
            $('.menu-toggle').click(function() {
                $(this).addClass('active');
                $(this).siblings('.menu-sub').slideToggle('fast');
            });

            var current_url = window.location.href;
            // var dynamic_url = $('.current-dynamic-url').val() + '/authenticate';

            $('.menu-item').each(function(){
                var menu_url = $(this).find('.menu-link').attr('href');
                if(current_url.includes(menu_url)) {
                    $(this).addClass('active');
                }
            });


            $('.menu-sub .menu-item').removeClass('active');
            $('.menu-sub .menu-item').each(function() {
                var menu_url = $(this).find('.menu-link').attr('href');

                if(current_url.includes(menu_url)) {
                    $(this).addClass('active');
                    $(this).parents('.menu-item').addClass('active').toggleClass('open');
                    $(this).parents('.menu-sub').css('display' , 'block');
                }
            });

            $('.menu-item').click(function() {
                $(this).toggleClass('open');
            });

    });
</script>



  {{-- Master Script --}}
  <script>
    $(document).ready(function(){
        $(".datepicker").flatpickr({
            dateFormat: "Y-m-d",
            allowInput: true,
            todayHighlight: true
        });

        
        setTimeout(function() {
            $('.bg-toast-custom-gold').fadeOut('slow');
        }, 3000); 

        $( ".layout-menu-toggle" ).click(function() {
            $('#password').attr('type', function(index, attr){
                return attr == 'password' ? 'text' : 'password';
            });
            $(this).toggleClass('bx-show');
        });

        $('.pass-eye').click(function() {
            $('.password').attr('type', function(index, attr){
                return attr == 'password' ? 'text' : 'password';
            });
            $(this).toggleClass('bx-show');
        });


    });

    // focus in input on load.
    // $(".form-control").focus();


    // enable tooltip everywhere.
    // $('[data-toggle="tooltip"]').tooltip();


    // hide loading when page loaded.
    $(window).on('load', function() {
        $('#loader').fadeOut("slow");
    });
  </script>




{{-- User Maintenance script --}}
<script>
    $(document).ready(function() {

        // blocking 
        $('.user_blocking').click(function() {
            const id = $(this).attr('data-item-id');
            $.ajax({
                type: "GET",
                url:  '/user/blocking/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });



        // delete 
        $('.user_delete').click(function() {
            const id = $(this).attr('data-item-id');
            $.ajax({
                type: "GET",
                url:  '/user/confirm/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });

        // edit
        $('.user_edit').click(function() {
            const id = $(this).attr('data-item-id');   
            $.ajax({
                method: "GET",
                url:  '/user/edit/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    $('.modal-content').html(res);
                },
            });
        });

        // create
        $('#user_add').click(function() {
            $.ajax({
                method: "GET",
                url:  '/user/add',
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });


    });
</script>



{{-- Level Maintenance script --}}
<script>
    $(document).ready(function() {



        // delete 
        $('.level_delete').click(function() {
            const id = $(this).attr('data-item-id');
            $.ajax({
                type: "GET",
                url:  '/level/confirm/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });

        // edit
        $('.level_edit').click(function() {
            const id = $(this).attr('data-item-id');   
            $.ajax({
                method: "GET",
                url:  '/level/edit/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    $('.modal-content').html(res);
                },
            });
        });

        // create
        $('#level_add').click(function() {
            $.ajax({
                method: "GET",
                url:  '/level/add',
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });


    });
</script>




{{-- Customers Maintenance script --}}
<script>
    $(document).ready(function() {

        // search by customer category 
        $('#categoryid').change(function() {
            $('#normal_search').click();
        });

        // delete 
        $('.customers_delete').click(function() {
            const id = $(this).attr('data-item-id');
            $.ajax({
                type: "GET",
                url:  '/customers/confirm/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });

        // edit
        $('.customers_edit').click(function() {
            const id = $(this).attr('data-item-id');   
            $.ajax({
                method: "GET",
                url:  '/customers/edit/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    $('.modal-content').html(res);
                },
            });
        });

        // create
        $('#customers_add').click(function() {
            $.ajax({
                method: "GET",
                url:  '/customers/add',
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });


    });
</script>



{{-- Profile Maintenance script --}}
<script>
    $(document).ready(function() {

        // delete 
        $('.profile_delete').click(function() {
            const id = $(this).attr('data-item-id');
            var customerid = $(this).attr('data-manager-id');

            $.ajax({
                type: "GET",
                url:  '/customers/profile/'+customerid+'/confirm/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });

        // edit
        $('.profile_edit').click(function() {
            const id = $(this).attr('data-item-id');   
            var customerid = $(this).attr('data-manager-id');


            $.ajax({
                method: "GET",
                url:  '/customers/profile/'+customerid+'/edit/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    $('.modal-content').html(res);
                },
            });
        });

        // create
        $('#profile_add').click(function() {
            var customerid = $(this).attr('data-manager-id');


            $.ajax({
                method: "GET",
                url:  '/customers/profile/'+customerid+'/add',
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });


    });
</script>



{{-- Ads Maintenance script --}}
<script>
    $(document).ready(function() {



        // delete 
        $('.ads_delete').click(function() {
            const id = $(this).attr('data-item-id');
            $.ajax({
                type: "GET",
                url:  '/ads/confirm/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });

        // edit
        $('.ads_edit').click(function() {
            const id = $(this).attr('data-item-id');   
            $.ajax({
                method: "GET",
                url:  '/ads/edit/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    $('.modal-content').html(res);
                },
            });
        });

        // create
        $('#ads_add').click(function() {
            $.ajax({
                method: "GET",
                url:  '/ads/add',
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });

    });
</script>


{{-- Plans Maintenance script --}}
<script>
    $(document).ready(function() {



        // delete 
        $('.plans_delete').click(function() {
            const id = $(this).attr('data-item-id');
            $.ajax({
                type: "GET",
                url:  '/plans/confirm/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });

        // edit
        $('.plans_edit').click(function() {
            const id = $(this).attr('data-item-id');   
            $.ajax({
                method: "GET",
                url:  '/plans/edit/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    $('.modal-content').html(res);
                },
            });
        });

        // create
        $('#plans_add').click(function() {
            $.ajax({
                method: "GET",
                url:  '/plans/add',
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });


    });
</script>






{{-- Permission Maintenance script --}}
<script>
    $(document).ready(function() {

        $('#levelid').change(function() {
            $('#normal_search').click();
        });

        // delete 
        $('.permissions_delete').click(function() {
            const id = $(this).attr('data-item-id');
            $.ajax({
                type: "GET",
                url:  '/permissions/confirm/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });

        // edit
        $('.permissions_edit').click(function() {
            const id = $(this).attr('data-item-id');   
            $.ajax({
                method: "GET",
                url:  '/permissions/edit/'+ id,
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    $('.modal-content').html(res);
                },
            });
        });

        // create
        $('#permissions_add').click(function() {
            $.ajax({
                method: "GET",
                url:  '/permissions/add',
                beforeSend: function(){$("#loader").show();},
                complete: function(){$("#loader").fadeOut("slow");},
                success: function(res) {
                    console.log(res);
                    $('.modal-content').html(res);
                },
            });
        });


    });
</script>



