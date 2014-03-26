$('#main_form').on('submit', function(e){
	alert('test');
    e.preventDefault();
    $('#thankYou').removeClass('hidden');
    $.post('mailto.php',$(this).serialize(), function(data) {
    });
});
