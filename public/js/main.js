$('.order').on('click', function () {
   $('#form').submit();
});

$('#paginate').on('change', function () {
    $('#form').submit();
});

function showDescription(jobId) {
    $('#' + jobId + '-description').toggle(100);
}



