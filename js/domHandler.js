/**
 * Created by irenemeisel on 3/28/16.
 */

// jquery
$(document).ready(function() {
    console.log('Page Loaded!!');
    $('tr').on('click', function (e) {
        window.location.href = "http://localhost:8000/bitsblog/post.php?id=" + $(this).attr('id');
    });
});