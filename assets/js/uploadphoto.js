$(function() {
  $(".btn-upload").on("click", function() {
    $(this)
      .prev("input:file")
      .trigger("click");
  });
  $(".file-up").on("change", function() {
    var fileLength = $(this)[0].files.length;
    if (fileLength != 0) {
      $(this)
        .next(".btn-upload")
        .text($(this).val());
      $("#imguploadshow").show();
      $(this)
        .nextAll(".btn-remove-file")
        .show();
    } else {
      $(this)
        .next(".btn-upload")
        .text("อัพโหลดรูปภาพสมาชิก");
      $(this)
        .nextAll(".btn-remove-file")
        .hide();
      $("#imguploadshow").hide();
    }
  });
  $(".btn-remove-file").on("click", function() {
    var el = $(this).prevAll("input:file");
    el.wrap("<form>")
      .closest("form")
      .get(0)
      .reset();
    el.unwrap();
    $(this)
      .prev(".btn-upload")
      .text("อัพโหลดรูปภาพสมาชิก");
    $(this).hide();
  });
});

$(function() {
  $(".btn-uploadgallery").on("click", function() {
    $(this)
      .prev("input:file")
      .trigger("click");
  });
  $(".file-upgallery").on("change", function() {
    var fileLength = $(this)[0].files.length;
    if (fileLength != 0) {
      $(this)
        .next(".btn-uploadgallery")
        .text($(this).val());
      $("#imguploadshow2").show();
      $(this)
        .nextAll(".btn-remove-file")
        .show();
    } else {
      $(this)
        .next(".btn-uploadgallery")
        .text("อัพโหลดรูปภาพกิจกรรม");
      $(this)
        .nextAll(".btn-remove-file")
        .hide();
      $("#imguploadshow2").hide();
    }
  });
  $(".btn-remove-file").on("click", function() {
    var el = $(this).prevAll("input:file");
    el.wrap("<form>")
      .closest("form")
      .get(0)
      .reset();
    el.unwrap();
    $(this)
      .prev(".btn-uploadgallery")
      .text("อัพโหลดรูปภาพกิจกรรม");
    $(this).hide();
  });
});

$(function() {
  $(".btn-uploadbook").on("click", function() {
    $(this)
      .prev("input:file")
      .trigger("click");
  });
  $(".file-upbook").on("change", function() {
    var fileLength = $(this)[0].files.length;
    if (fileLength != 0) {
      $(this)
        .next(".btn-uploadbook")
        .text($(this).val());
      $("#imguploadshow").show();
      $("#imguploadshow2").show();
      $(this)
        .nextAll(".btn-remove-file")
        .show();
    } else {
      $(this)
        .next(".btn-uploadbook")
        .text("อัพโหลดรูปภาพกิจกรรม");
      $(this)
        .nextAll(".btn-remove-file")
        .hide();
    }
  });
  $(".btn-remove-file").on("click", function() {
    var el = $(this).prevAll("input:file");
    el.wrap("<form>")
      .closest("form")
      .get(0)
      .reset();
    el.unwrap();
    $(this)
      .prev(".btn-uploadbook")
      .text("อัพโหลดรูปภาพกิจกรรม");
    $(this).hide();
    $("#imguploadshow").hide();
    $("#imguploadshow2").hide();
  });
});

$(function() {
  $(".btn-uploadbookp1").on("click", function() {
    $(this)
      .prev("input:file")
      .trigger("click");
  });
  $(".file-bookp1").on("change", function() {
    var fileLength = $(this)[0].files.length;
    if (fileLength != 0) {
      $(this)
        .next(".btn-uploadbookp1")
        .text($(this).val());
      $(this)
        .nextAll(".btn-remove-file")
        .show();
    } else {
      $(this)
        .next(".btn-uploadbookp1")
        .text("อัพโหลดรูปภาพ");
      $(this)
        .nextAll(".btn-remove-file")
        .hide();
    }
  });
  $(".btn-remove-file").on("click", function() {
    var el = $(this).prevAll("input:file");
    el.wrap("<form>")
      .closest("form")
      .get(0)
      .reset();
    el.unwrap();
    $(this)
      .prev(".btn-uploadbookp1")
      .text("อัพโหลดรูปภาพ");
    $(this).hide();
  });
});
