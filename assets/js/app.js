$(document).ready(function () {
  $("body").tooltip({ selector: "[data-toggle=tooltip]" });
  $("body").popover({ selector: "[data-toggle=popover]" });

  $(function () {
    $("#form").hide();
  });
  $("#bt_prod").click(function () {
    $("#cad_prod").show();
    $("#bt1").hide();
  });
  $("#bt1").click(function () {
    $("#form").show();
    $("#bt1").hide();
    $("#tb1").hide();
  });
  $("#btcancel").click(function () {
    $("#tb1").show();
    $("#bt1").show();
    $("#form").hide();
  });
});
