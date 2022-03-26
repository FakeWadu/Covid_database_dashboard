window.setTimeout(function () {
  $(".alert")
    .fadeTo(500, 0)
    .slideUp(500, function () {
      $(this).remove();
    });
}, 3000);
$("#editModal").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget);
  //bootstrap way of retrieving data-* attributes
  //data-formid in this case
  var id = button.data("formid");
  $.get(yourSiteUrl + "/classes/forms/edit.php?id=" + id, function (data) {
    $("#editModal .modal-title").html(data);
    //Resize the modal to the size of the loaded form.
    $("#editModal").modal("handleUpdate");
  });
});


