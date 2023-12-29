let loading = false;

$(document).ready(function () {
    loadContent();

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && !loading) {
            loadContent();
        }
    });
});

function loadContent() {
    loading = true;
    $.ajax({
        url: 'load_content.php',
        type: 'POST',
        data: { page: $('.post').length / 5 + 1 },
        success: function (data) {
            $('#content').append(data);
            loading = false;
        }
    });
}
