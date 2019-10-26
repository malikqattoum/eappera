$(document).ready(function(){
    function prepareHomePosts(data)
    {
        var postsCards = [];
        if(typeof data.result !== "undefined")
        {
            data.result.forEach(function(post, index){
                posts = `<div class="card my-4">`;
                if(post.image != null)
                    posts +=`<img src="`+data.imagePath+post.image+`" class="card-img-top">`;
                posts += `<div class="card-body">
                                                 <h5 class="card-title">`+post.title+`</h5>
                                                 <p class="card-text">`+post.description+`</p>
                                                 </div>
                                             </div>`;
                postsCards.push(posts);
            });
        }
        return postsCards;
    }

    var offset = 0;
    $.ajax({
        type:"GET",
        url:"posts/home-posts",
        data:{
            'offset':0,
            'limit':10
        },
        success: function(data){
            $("#homePosts").append(prepareHomePosts(data));
            offset += 10;
        }
    });

    $(window).scroll(function(){
        if($(window).scrollTop() >= $(document).height() - $(window).height()) {
            $.ajax({
                type:"GET",
                url:"posts/home-posts",
                data:{
                    'offset':offset,
                    'limit':10
                },
                success: function(data){
                    $("#homePosts").append(prepareHomePosts(data));
                    offset += 10;
                }
            });
        }
    });
});

$("#loginForm").submit(function(e) {

    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(),
           success: function(data)
           {
               $("#my-id").val(data.csrfToken);
               if(typeof data.validation !== "undefined")
               {
                   $("#errorMessage").removeClass("d-none");
                   $("#errorMessage").html('');
                   if(typeof data.validation.email !== "undefined")
                   {
                        $("#errorMessage").append(data.validation.email+"<br>");
                   }
                   if(typeof data.validation.password !== "undefined")
                   {
                        $("#errorMessage").append(data.validation.password+"<br>");
                   }
               }

               if(typeof data.result !== "undefined")
               {
                    $("#errorMessage").html('');
                    if(!$("#errorMessage").hasClass('d-none') && data.result.success)
                        $("#errorMessage").addClass("d-none");
                    else if(!$("#errorMessage").hasClass('d-none') && !data.result.success)
                    {
                        $("#errorMessage").append(data.result.message);
                    }
                    else if($("#errorMessage").hasClass('d-none') && !data.result.success)
                    {
                        $("#errorMessage").removeClass("d-none");
                        $("#errorMessage").append(data.result.message);
                    }
                    if(data.result.success)
                    {
                        $("#successMessage").removeClass("d-none");
                        $("#successMessage").append(data.result.message);
                        setTimeout(function(){ window.location.href="/"; }, 2000);
                    }
               }
           }
         });


});


$("#postForm").submit(function(e) {

    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');
    var formData = new FormData(form[0]);
    $.ajax({
           type: "POST",
           url: url,
           data: formData,
           processData: false,
           contentType: false,
           success: function(data)
           {
               $("#my-id").val(data.csrfToken);
               if(typeof data.validation !== "undefined")
               {
                   $("#errorMessage").removeClass("d-none");
                   $("#errorMessage").html('');
                   if(typeof data.validation.title !== "undefined")
                   {
                        $("#errorMessage").append(data.validation.title+"<br>");
                   }
                   if(typeof data.validation.user_id !== "undefined")
                   {
                        $("#errorMessage").append(data.validation.user_id+"<br>");
                   }
                   if(typeof data.validation.description !== "undefined")
                   {
                        $("#errorMessage").append(data.validation.description+"<br>");
                   }
               }

               if(typeof data.post !== "undefined")
               {
                    $("#errorMessage").html('');
                    if(!$("#errorMessage").hasClass('d-none') && data.post.success)
                        $("#errorMessage").addClass("d-none");
                    else if(!$("#errorMessage").hasClass('d-none') && !data.post.success)
                    {
                        $("#errorMessage").append(data.post.message);
                    }
                    else if($("#errorMessage").hasClass('d-none') && !data.post.success)
                    {
                        $("#errorMessage").removeClass("d-none");
                        $("#errorMessage").append(data.post.message);
                    }
                    if(data.post.success)
                    {
                        $("#successMessage").removeClass("d-none");
                        $("#successMessage").append(data.post.message);
                        setTimeout(function(){ window.location.href="/"; }, 2000);
                    }
               }
           }
         });


});