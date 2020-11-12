<div id="fab-menu" class="btn-group-fab" role="group" aria-label="FAB Menu">
  <div>
    <button type="button" class="btn btn-main btn-primary has-tooltip" data-placement="left" title="Menu"> <i class="fa fa-bars"></i> Menu</button>
    <a href="<?= route_to("about") ?>" class="btn btn-sub btn-primary has-tooltip" data-placement="left" title="Fullscreen"> About</a>
    <a href="<?= route_to("contact") ?>" class="btn btn-sub btn-primary has-tooltip" data-placement="left" title="Save">Contact</a>
    <a href="<?= route_to("/") ?>" class="btn btn-sub btn-primary has-tooltip" data-placement="left" title="Download">   My Works</a>
  </div>
</div>

<script type="text/javascript">
$(function() {
$('.btn-group-fab').on('click', '.btn', function() {
  $('.btn-group-fab').toggleClass('active');
});
$('has-tooltip').tooltip();
});
</script>
