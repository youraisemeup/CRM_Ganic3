<?php echo $js; ?>
</div><!-- /.content-wrapper -->

<footer class="main-footer">
	<strong>Copyright &copy; 2016-2017</a>.</strong> All rights reserved.
</footer>

<script type="text/javascript">
	$('.select2').select2();

$('.tip').tooltip({placement: "auto", html: true});
// console.log($(".select2-container").length)
$(".select2-container").tooltip({
    title: function() {
        return $(this).prev().attr("title");
    },
    placement: "auto",
    //container: 'body'
});
</script>
