console.log('admin js file');
$(document).ready(function(){
    var $adminBody = $('.admin-body');
    $('#add-article-button').click(function(){
       console.log('ai apasat bah !');
       $adminBody.html('');
       var adminBodyHtml = '<div class="add-article-form">'+
           '<div class="form-group">'+
           '<label>Category :</label>'+
           '<select name="category">'+
           '<option value="above">Above</option>'+
           '<option value="below">Below</option>'+
           '<option value="people">People</option>'+
           '</select>'+
           '</div>'+
           '<div class="form-group">'+
           '<label>Title :</label>'+
           '<input type="text" class="form-control" name="title">'+
           '</div>'+
           '<div class="form-group">'+
           '<label>Body :</label>'+
           '<textarea type="text" rows="10" class="form-control" name="body"></textarea>'+
           '</div>'+
           '<p id="submit-article-button" class="my-buttons">Submit Article</p>'
           '</div>';
       $adminBody.html(adminBodyHtml);
       $('#submit-article-button').click(function() {
           if ($('input[name=title]').val() == '' || $('textarea[name=body]').val() == '') {
               alert('You must enter a title and a body for your article !');
           } else {
           $.ajax({
               url: "http://localhost/blog_scoala/Articles/addArticle",
               method: "POST",
               data: {
                   category: $('select[name=category]').val(),
                   title: $('input[name=title]').val(),
                   body: $('textarea[name=body]').val()
               }
           }).done(function (picture_id) {
               console.log('ultimul articol adaugat are idu-l',picture_id.id);
               var pictureCat = $('select[name=category]').val();
               var pictureId = picture_id.id;
               $adminBody.html('');
               $adminBody.html('<p>Your Article has been added !</p>' +
                   '<p>Would you like to add an image for the article ?</p>' +
                   '<p id="add-image-button" class="my-buttons"> Yes </p><p id="no-button" class="my-buttons"> No </p>');
               $('#no-button').click(function(){
                   //console.log('ai pasat no !');
                   $adminBody.html('');
                   $adminBody.html(adminBodyHtml);
               });
               $('#add-image-button').click(function(){
                   $adminBody.html('');
                   var uploadFormHtml = '<form id="file-upload-form" action="blog_scoala/Admin/uploadFile" method="post" enctype="multipart/form-data">'+
                       '<div class="form-group"><input type="hidden" class="form-control" name="pictureCategory" value="' + pictureCat + '"></div>' +
                       '<div class="form-group"><input type="hidden" class="form-control" name="pictureId" value="' + pictureId + '"></div>' +
                       '<div class="form-group"><input type="file" class="form-control" name="file" id="file"></div>'+
                       '<div class="form-group"><input type="submit" class="submit" value="Upload" id="file-upload-button"/></div>' +
                       '</form>';
                   $adminBody.html(uploadFormHtml);
               });
           });
       }
       });
   });
});