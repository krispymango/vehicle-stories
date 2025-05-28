window.onload = function()
{
  /* */
  document.getElementById('rg_btn').addEventListener('click',showRegister);
  document.getElementById('lgn_btn').addEventListener('click',showLogin);
  document.querySelector('.gallery_container').addEventListener('click',showFullscreenModal);
  document.querySelector('.fullscreen_modal .fa-times').addEventListener('click',hideFullscreenModal);

  function showRegister()
  {
    document.querySelector('.registration_form_toggle').style.display = 'block';
    document.querySelector('.registration_content_wrapper').style.marginBottom = '17vh';
    document.querySelector('.login_form_toggle').style.display = 'none';
    document.getElementById('rg_btn').style.background = 'white';
    document.getElementById('lgn_btn').style.background = '#D7DBDD';
  }

  function showLogin()
  {
    document.querySelector('.registration_form_toggle').style.display = 'none';
    document.querySelector('.registration_content_wrapper').style.marginBottom = '35vh';
    document.querySelector('.login_form_toggle').style.display = 'block';
    document.getElementById('rg_btn').style.background = '#D7DBDD';
    document.getElementById('lgn_btn').style.background = 'white';
  }

  function showFullscreenModal()
  {
    document.querySelector('.fullscreen_modal_wrapper').style.display = 'block';
    document.querySelector('.gallery_container').style.display = 'none';
  }

  function hideFullscreenModal()
  {
    document.querySelector('.fullscreen_modal_wrapper').style.display = 'none';
    document.querySelector('.gallery_container').style.display = 'block';
  }


};
