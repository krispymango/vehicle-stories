
$(document).ready(function()
{
// about Wrapper submit
  $('.about_wrapper').submit(function(event)
  {
    event.preventDefault();
    var text = $('#editorlist1').val();
    var about_submit = $('#about_sbmt').val();
    alert(text);
    $('#pop_up').load("../app/helpers/listElementVerify",
   {
      text: text,
      about_submit: about_submit
  });
  });
});

  // rules Wrapper submit
  $(document).ready(function()
  {
    $('.rules_wrapper').submit(function(event)
    {
      event.preventDefault();
      var text = $('#editorlist2').val();
      var rules_submit = $('#rules_sbmt').val();
      $('#pop_up').load("../app/helpers/listElementVerify",
     {
        text: text,
        rules_submit: rules_submit
    });
    });
});

    // rodo Wrapper submit
    $(document).ready(function()
    {
      $('.rodo_wrapper').submit(function(event)
      {
        event.preventDefault();
        var text = $('#editorlist3').val();
        var rodo_submit = $('#rodo_sbmt').val();
        $('#pop_up').load("../app/helpers/listElementVerify",
       {
          text: text,
          rodo_submit: rodo_submit
      });
      });
});

$(document).ready(function()
{
  $('.cookie_wrapper').submit(function(event)
  {
    event.preventDefault();
    var text = $('#editorlist4').val();
    var cookie_submit = $('#cookie_sbmt').val();
    $('#pop_up').load("../app/helpers/listElementVerify",
   {
      text: text,
      cookie_submit: cookie_submit
  });
  });
});
      // news Wrapper submit

      $(document).ready(function()
      {
        $('.news_wrapper').submit(function(event)
        {
          event.preventDefault();
          var heading = $('#heading_text').val();
          var text = $('#news_text').val();
          var news_submit = $('#news_sbmt').val();
          $('#pop_up').load("../app/helpers/NewslistElementVerify",
         {
            text: text,
            heading:heading,
            news_submit: news_submit
        });
        });

});
