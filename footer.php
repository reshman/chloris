<!---->
<div class="shoping">
    <div class="container">
        <div class="shpng-grids">

            <div class="col-md-6 shpng-grid">
                <h3>ABOUT</h3>
                <p>Learn more about FLORAL Designs</p>
            </div>
            <div class="col-md-6 shpng-grid">
                <h3>STAY IN TOUCH</h3>
                <p><div class="social">
                    <ul >
                        <li><a class="fa" href="#"> </a></li>
                        <li><a class="tw" href="#"> </a></li>
                        <li><a class="p" href="#"> </a></li>
                    </ul>
                </div></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!---->
<!---->
<div class="copywrite">
    <div class="container">
        <p>&nbsp;</p>
        <center>
            <p>Copyright © 2015 FLORAL DESIGNS All rights reserved | Design by <a href="http://www.lionmarks.in" target="_BLANK">LIONMARKS</a></p></center>
    </div>
</div>

<!--<script src="//cdnjs.cloudflare.com/ajax/libs/minicart/3.0.6/minicart.min.js"></script>

<script>
    config = {action:'https://www.sandbox.paypal.com/en/cgi-bin/webscr'}
    paypal.minicart.render(config);
    
	$('#viewcart').on('click', function() {
		paypal.minicart.view.show();
	})
</script>-->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" id="modal-dialog-affix">

        <!-- Modal content-->
        <?php include_once 'list-cart-items.php'; ?>

    </div>
</div>

<script>$(document).ready(function(c) {
        $('body').on('click','.close1', function(c){

            var pdtid = $(this).attr('removeid');
            $.ajax({
                url:'list-cart-items.php?productid='+pdtid+'&action=remove'
            }).done(function(data){
                $('#modal-dialog-affix').html(data);
            })

/*            $('.rem'+pdtid).fadeOut('slow', function(c){
                $('.rem'+pdtid).remove();
            });*/
        });
    });
</script>

<!--quantity-->
<script>
    $('body').on('click','.value-plus', function(){
        pid = $(this).parent().attr('qtyproduct');
        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
        divUpd.text(newVal);

        $.ajax({
            url:'list-cart-items.php?productid='+pid+'&action=qtyincr&qty='+newVal
        }).done(function(data){
            $('#modal-dialog-affix').html(data);
        })

    });

    $('body').on('click','.value-minus', function(){
        pid = $(this).parent().attr('qtyproduct');
        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
        if(newVal>=1) {
           divUpd.text(newVal);
	        $.ajax({
	            url:'list-cart-items.php?productid='+pid+'&action=qtyincr&qty='+newVal
	        }).done(function(data){
	            $('#modal-dialog-affix').html(data);
	        })
        }


    });
</script>
<!--quantity-->
