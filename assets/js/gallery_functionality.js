window.onload = function()
{
  var previous_location = window.location.href;
  sessionStorage.setItem("lastname", previous_location);


  document.querySelector('.amazingslider-box-1').addEventListener('click',showFullscreenModal);


  function showFullscreenModal()
  {
    var location = window.location.href;
    let url_str = location;
let url = new URL(url_str);
let search_params = url.searchParams;

let id = search_params.get('id');
let name = search_params.get('name');
    window.location.href = 'gallery?id='+id+'&name='+name+'';
  }



};
