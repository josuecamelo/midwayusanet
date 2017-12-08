@include('flash::message')
<script>
	var myAlert = document.querySelector('.alert');
	if (myAlert != null) {
		myAlert.classList.add('animated', 'bounceInRight');
	}
</script>