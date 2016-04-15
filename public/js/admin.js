/**
 * Created by Administrator on 04.03.2016.
 */
console.log('admin javascript');
$( document ).ready(function() {
    function getArticles() {
        $.ajax({
            url: "http://localhost/blog_scoala/admin/getJson",
            success: function( data ) {
                //console.log(json);
                var table = '';
                for (var i=0; i<data.length; i++) {
                    table += '<tr><td>' + data[i].title +
                        '</td><td><button data-edit-id="' +
                        data[i].id +
                        '">Edit</button><button>Delete</button>' +
                        '</td></tr>';
                }

                $('#articlesTbl').html(table);
            }

        });
    }

    getArticles();
});
