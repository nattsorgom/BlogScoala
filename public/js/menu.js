/**
 * Created by Administrator on 21.03.2016.
 */
$( document ).ready(function() {
    var $articole = $('.articole');
    var $paginare = $('.paginare');


    function addMenuAnimation() {
        $('.menu a').mouseover(function () {
            $(this).animate({fontSize: '27px'}, 'fast')
        });
        $('.menu a').mouseout(function () {
            $(this).animate({fontSize: '25px'}, 'fast')
        });
    }

    function addArticlesAnimation() {
        $('.text-link').mouseover(function () {
            $(this).animate({opacity: '1'}, 200);
        });
        $('.text-link').mouseout(function () {
            $(this).animate({opacity: '0.5'}, 75);
        });
    }

    function getOneArticle() {
        $('.one-of-three-articles').click('[data-articleid]', function () {
            $.ajax({
                url: 'http://localhost/blog_scoala/Articles/getOneArticleJson/?articleId=' + $(this).data('articleid'),
                success: function (oneArticle) {
                    $('.articole').slideUp(1000, function () {
                        $articole.html('');
                        $articole.append('<div class="one-article"><h2>' +
                            oneArticle[0].title + '</h2><br><img src = "' +
                            oneArticle[0].img + '"><p>' +
                            oneArticle[0].body + '</p><br>' +
                            oneArticle[0].creation_date + ' in     <button>' +
                            oneArticle[0].category + '</button></div><hr>' +
                            '<div class="comment-form">' +
                            '<p>Email   :</p><input type="text"><br>' +
                            '<p>Comment :</p><textarea></textarea><br>' +
                            '<button>Add a Comment</button></div><hr>' +
                            '<div class="comments"><div>');
                        //console.log(oneArticle[0].id);
                        getComments(oneArticle[0].id);
                        $('.articole').slideDown(1000);
                    });
                }
            });
        });
    }

    function getComments(id) {
        $.ajax ({
            url:'http://localhost/blog_scoala/Articles/getCommentsForArticleJson/?articleIdComments=' + id,
            success:function (comments) {
                //console.log(comments);
                $.each(comments, function (j, comment) {
                    $comments = $('.comments');
                    $comments.append ('<i><p>' + comment.body +
                        '</p></i><br>' + comment.creation_date +
                        '<p>' + comment.email + '</p><hr>');
                });
            }
        });
    }

    addMenuAnimation();
    addArticlesAnimation();
    getOneArticle();

    $('.page-button').click('[data-pagenumber]', function() {

        $.ajax({
            url: 'http://localhost/blog_scoala/Articles/indexJson/?page_number=' + $(this).data('pagenumber'),
            success: function (current_page) {
                $('.articole').html('');
                $.each(current_page, function (i, articol) {
                    //console.log(articol.title);
                    $articole.append(
                        '<div class="one-of-three-articles" data-articleid="'+articol.id+'">' +
                        '<h2 class="text-link"> Title : ' + articol.title +
                        '</h2><br><img src="'+ articol.img +'"><br>' +
                        '<p class="text-link">' +
                        articol.body.substring(125,0) + ' ... </p></div>'
                    );
                    console.log(articol.id);

                });
                addArticlesAnimation();
                getOneArticle();
            }
        });

    });




});
