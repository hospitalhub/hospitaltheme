<script>
$(function(){
  $('#video').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });

  $(window).resize(function(){
    $('#video').css({ width: $(window).innerWidth() + 'px', height: $(window).innerHeight() + 'px' });
  });
});
</script>
<style>
div.dim {
    background-color:rgba(0,0,0,0.1); 
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height:100%;
    z-index: 10;
    border-left: 40px dotted rgba(0,0,0,0.2);
    border-right: 40px dotted rgba(0,0,0,0.2);
}
</style>
<iframe id="video" src="https://www.youtube.com/embed/tDvBwPzJ7dY?rel=0&autoplay=1&loop=1&controls=0&autohide=1&wmode=opaque&enablejsapi=1&origin=http%3A%2F%2Fwww.jellythemes.com" frameborder="0" width="100%" height="100%" allowfullscreen></iframe>
<div class="dim" />
