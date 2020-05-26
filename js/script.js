$(function(){
  //For User Registration
  $("#regsubmit").click(function(){
    var name       = $("#name").val();
    var username   = $("#username").val();
    var email      = $("#email").val();
    var password   = $("#password").val();
    //assigning it in to a database
    var dataString = 'name='+name+'&username='+username+'&email='+email+'&password='+password;
    $.ajax({
      //asking that the type of the for, which is post
      type:'POST',
      //the name of the url
      url:'getregister.php',
      //the data variable name
      data:dataString,
      //Success Callback that get invoked upon success completion of an Ajax request
      success:function(data){
        $("#state").html(data);
      }
    });
    return false;
  });
  // window.location = "index.php";
});

$(function(){
  //For User Login
  $("#login").click(function(){
    var email      = $("#email").val();
    var password   = $("#password").val();
    //assigning it in to a database
    var dataString = 'email='+email+'&password='+password;
    // alert(dataString);
    $.ajax({
      type:'POST',
      url:'getlogin.php',
      data:dataString,
      success:function(data){
        if ($.trim(data) == "empty") {
          $(".empty").show();
          $(".disable").hide();
          $(".error").hide();
          setTimeout(function(){
            $(".empty").fadeOut();
          }, 4000);
        }else if ($.trim(data) == "disable") {
          $(".disable").show();
          $(".empty").hide();
          $(".error").hide();
          setTimeout(function(){
            $(".disable").fadeOut();
          }, 4000);
        }
        else if ($.trim(data) == "error") {
          $(".error").show();
          $(".empty").hide();
          $(".disable").hide();
          setTimeout(function(){
            $(".error").fadeOut();
          }, 4000);
        }
        else{
          window.location = "exam.php";
        }
      }
    });
    return false;
  });
});