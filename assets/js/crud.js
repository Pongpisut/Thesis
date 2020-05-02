$(document).ready(function() {
  $(".delete_member").click(function() {
    var uid = $(this).attr("id");
    Swal({
      title: "ต้องการลบสมาชิกหรือไม่ ?",
      text: "หากท่านต้องการลบสมาชิกให้ท่านกดปุ่ม ยืนยัน",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ยืนยัน",
      cancelButtonText: "ยกเลิก"
    }).then(result => {
      if (result.value) {
        $.ajax({
          url: "backend/delete_member.php",
          method: "post",
          data: { id: uid },
          dataType: "text",
          success: function() {
            swal({
              type: "success",
              html: $("<div>")
                .addClass("some-class")
                .text("ลบสมาชิกสำเร็จ."),
              animation: true
            });
            window.setTimeout(function() {
              window.location.reload();
            }, 1000);
          }
        });
      }
    });
  });
});
$(document).ready(function() {
  $(".delete_photo").click(function() {
    var uid = $(this).attr("id");
    Swal({
      title: "ต้องการลบหมวดหมู่ภาพกิจกรรมหรือไม่ ?",
      text: "หากท่านต้องการลบหมวดหมู่ภาพกิจกรรมห้ท่านกดปุ่ม ยืนยัน",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ยืนยัน",
      cancelButtonText: "ยกเลิก"
    }).then(result => {
      if (result.value) {
        $.ajax({
          url: "backend/delete_catalog.php",
          method: "post",
          data: { id: uid },
          dataType: "text",
          success: function() {
            swal({
              type: "success",
              html: $("<div>")
                .addClass("some-class")
                .text("ลบแคตตาล็อกสำเร็จ."),
              animation: true
            });
            window.setTimeout(function() {
              window.location.reload();
            }, 1000);
          }
        });
      }
    });
  });
});
$(document).ready(function() {
  $(".delete_gallery").click(function() {
    var uid = $(this).attr("id");
    Swal({
      title: "ต้องการลบรูปภาพหรือไม่ ?",
      text: "หากท่านต้องการลบรูปภาพให้ท่านกดปุ่ม ยืนยัน",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ยืนยัน",
      cancelButtonText: "ยกเลิก"
    }).then(result => {
      if (result.value) {
        $.ajax({
          url: "backend/delete_galleryedit.php",
          method: "post",
          data: { id: uid },
          dataType: "text",
          success: function() {
            swal({
              type: "success",
              html: $("<div>")
                .addClass("some-class")
                .text("ลบรูปภาพสำเร็จ."),
              animation: true
            });
            window.setTimeout(function() {
              window.location.reload();
            }, 1000);
          }
        });
      }
    });
  });
});

$(document).ready(function() {
  $(".delete_book").click(function() {
    var uid = $(this).attr("id");
    Swal({
      title: "ต้องการลบบทความหรือไม่ ?",
      text: "หากท่านต้องการลบบทความให้ท่านกดปุ่ม ยืนยัน",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ยืนยัน",
      cancelButtonText: "ยกเลิก"
    }).then(result => {
      if (result.value) {
        $.ajax({
          url: "backend/delete_book.php",
          method: "post",
          data: { id: uid },
          dataType: "text",
          success: function() {
            swal({
              type: "success",
              html: $("<div>")
                .addClass("some-class")
                .text("ลบบทความสำเร็จ."),
              animation: true
            });
            window.setTimeout(function() {
              window.location.reload();
            }, 1000);
          }
        });
      }
    });
  });
});

$(document).ready(function() {
  $(".delete_comment").click(function() {
    var uid = $(this).attr("id");
    Swal({
      title: "ต้องการคอมเมนต์ความหรือไม่ ?",
      text: "หากท่านต้องการคอมเมนต์ความให้ท่านกดปุ่ม ยืนยัน",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ยืนยัน",
      cancelButtonText: "ยกเลิก"
    }).then(result => {
      if (result.value) {
        $.ajax({
          url: "backend/delete_comment.php",
          method: "post",
          data: { id: uid },
          dataType: "text",
          success: function() {
            swal({
              type: "success",
              html: $("<div>")
                .addClass("some-class")
                .text("ลบบทความสำเร็จ."),
              animation: true
            });
            window.setTimeout(function() {
              window.location.reload();
            }, 1000);
          }
        });
      }
    });
  });
});

/**search book**/
$(document).ready(function() {
  $("#searchbook").keyup(function() {
    var txt = $(this).val();
    $("#resultbook").html("");
    if (txt != "") {
      $.ajax({
        url: "backend/fetch_searchbook.php",
        method: "POST",
        data: { search: txt },
        success: function(data) {
          $("#resultbook").html(data);
        }
      });
    } else {
      $("#resultbook").html();
    }
  });
});

/**search gallery**/
$(document).ready(function() {
  $("#searchgallery").keyup(function() {
    var txt = $(this).val();
    $("#resultgallery").html("");
    if (txt != "") {
      $.ajax({
        url: "backend/fetch_searchgallery.php",
        method: "POST",
        data: { search: txt },
        success: function(data) {
          $("#resultgallery").html(data);
        }
      });
    } else {
      $("#resultgallery").html();
    }
  });
});

/**search bookhome**/
$(document).ready(function() {
  $("#searchbookhome").keyup(function() {
    var txt = $(this).val();
    $("#resultbookhome").html("");
    if (txt != "") {
      $.ajax({
        url: "backend/fetch_searchbookhome.php",
        method: "POST",
        data: { search: txt },
        success: function(data) {
          $("#resultbookhome").html(data);
        }
      });
    } else {
      $("#resultbookhome").html();
    }
  });
});

/**search gallery**/
$(document).ready(function() {
  $("#searchgalleryhome").keyup(function() {
    var txt = $(this).val();
    $("#resultgalleryhome").html("");
    if (txt != "") {
      $.ajax({
        url: "backend/fetch_searchgalleryhome.php",
        method: "POST",
        data: { search: txt },
        success: function(data) {
          $("#resultgalleryhome").html(data);
        }
      });
    } else {
      $("#resultgalleryhome").html();
    }
  });
});

/**search comment**/
$(document).ready(function() {
  $("#searchcomment").keyup(function() {
    var txt = $(this).val();
    $("#resultcomment").html("");
    if (txt != "") {
      $.ajax({
        url: "backend/fetch_searchcomment.php",
        method: "POST",
        data: { search: txt },
        success: function(data) {
          $("#resultcomment").html(data);
        }
      });
    } else {
      $("#resultcomment").html();
    }
  });
});
