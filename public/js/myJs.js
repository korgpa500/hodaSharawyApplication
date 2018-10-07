/**
 * Created by Yousry Elwrdany on 08/06/2018.
 */


$(document).ready(function () {


    //change color of navbar
    var scroll;
    var app = document.getElementById("app");
    if (app) {
        $(".myNavBar").css({
            "background-color": "rgba(131, 0, 11, 0.7)"
        });
    } else {
        $(window).scroll(function () {
            scroll = $(window).scrollTop();
            if (scroll > 300) {
                $(".myNavBar").css({
                    "background-color": "rgba(131, 0, 11, 0.7)"
                });
            } else {
                $(".myNavBar").css({
                    "background-color": "rgba(131, 0, 11, 0.0)"
                });
            }
        });
    }


    //move to contact form in home page
    $("#btnClose").click(function () {
        $('html, body').animate({
            scrollTop: $("#contact").offset().top
        }, 800);
    });

    //logo animation
    $(".navbar-brand").hover(function () {
        if ($(this).hasClass("logoAnim")) {
            $(this).removeClass("logoAnim");
        } else {
            $(this).addClass("logoAnim");
        }
    });


    //show password field
    $('#eye').hide();
    $('#password').mouseover(function () {
        if ($(this).val() !== "") {
            $('#eye').show();
        }
    });
    $('#password').mousedown(function () {
        $('#eye').hide();
    });

    $('#eye').click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        if ($('#password').attr("type") == "password") {
            $('#password').attr("type", "text");
        } else {
            $('#password').attr("type", "password");
        }
    });

});

//show section blog ajax
function show_section_blog(section_id) {
    var ajaxConfig = {
        'url': '/blog/' + section_id + '/showBlog',
        'success': function (data) {
            $("#showBlog").html(data);
        }
    }
    $.ajax(ajaxConfig)
        .done(function () {
            $('#showBlog').addClass('showBlog');
        })
        .fail(function () {
            $('#wrong').css('display', 'block');
        });
}


//show section photos ajax
function show_section_photos(id) {
    var ajaxConfig = {
        'url': '/photos/' + id + '/showPhotos',
        'success': function (data) {
            $("#showPhotos").html(data);
        }
    }
    $.ajax(ajaxConfig)
        .done(function () {
            $('#showPhotos').addClass('showPhotos');
        })
        .fail(function () {
            $('#wrong').css('display', 'block');
        });
}
//del photo by ajax
function deletePhoto(id) {
    var ajaxDelete = {
        'url': '/photos/' + id + '/deletePhoto',
    }
    $.ajax(ajaxDelete)
        .done(
            function () {
                $('#DeleteImage').modal('show');
                $('#' + id).css("display", "none");
            }
        )
        .fail(function (error) {
            console.log(error);
        });
}
//delete suggestion or message by ajax
function deleteSuggestion(id) {
    var ajaxDelete = {
        'url': '/notification/' + id + '/suggestion_del',
    }
    $.ajax(ajaxDelete)
        .done(
            function () {
                $('#DeleteSuggestion').modal('show');
                $('#' + id).css("display", "none");
            }
        )
        .fail(
            function (error) {
                console.log(error);
            }
        );
}

//add user registered by ajax
function approveUser(id) {
    $('.imageLogo').addClass("animated infinite rotateIn").css("display", "block");

    var ajaxAddUser = {
        'url': '/notification/' + id + '/addUserRegistered',
    }

    $.ajax(ajaxAddUser)
        .done(
            function () {
                $('#AddedUser').modal('show');
                $('#' + id).css("display", "none");
                $('.imageLogo').removeClass("animated infinite rotateIn").css("display", "none");
            }
        )
        .fail(
            function (error) {
                console.log(error);
            }
        );
}

//ignore registered user
function IgnoreUser(id) {
    $('.imageLogo').addClass("animated infinite rotateIn").css("display", "block");

    var ajaxIgnore = {
        'url': '/notification/' + id + '/ignoreUserRegistered',
    }

    $.ajax(ajaxIgnore)
        .done(
            function () {
                $('#IgnoredUser').modal('show');
                $('#' + id + 'Delete').css("display", "none");
                $('.imageLogo').removeClass("animated infinite rotateIn").css("display", "none");
            }
        )
        .fail(
            function (error) {
                console.log(error);
            }
        );
}

//delete user from User Table
function DeleteUserAjax(id) {
    var deleteUser = {
        'url': '/users/' + id + '/delete',
    }

    $.ajax(deleteUser)
        .done(
            function () {
                $('#DeleteUser').modal('show');
                $('#' + id).css("display", "none");
            }
        )
        .fail(
            function (error) {
                console.log(error);
            }
        );
}

//show model add post
function addNewPost() {
    $('#AddPost').modal('show');
}

//show model add event
function addNewEvent() {
    $('#AddEvent').modal('show');
}

//add like to post
function AddLike(post_id) {
    var like = {
        'url': '/posts/' + post_id + '/add_like',
        'success': function (data) {
            $("#btnLike" + post_id).html(data);
        },
    }
    $('#btnLike' + post_id).addClass("animated swing");
    $.ajax(like)
        .done(
            function () {
                $('#btnLike' + post_id).attr("disabled", true);
                if ($('#btnLike' + post_id).hasClass("animated swing")) {
                    $('#btnLike' + post_id).removeClass("animated swing");
                }
            }
        )
        .fail(
            function (error) {
                console.log(error);
            }
        );
}

//print div id
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}