function isuccess(title, desc) {
  swal({
    title: '<span style="color:#222">' + title + "</span>",
    type: "success",
    html: '<span style="color:gray">' + desc + "</span>",
    confirmButtonText:
      '<span style="color:white"><i class="fa fa-times"></i> ปิด</span>',
    confirmButtonColor: "#e54d40"
  }).then(function(isConfirm) {
    var url = "";
    if (isConfirm === true) {
      $(location).attr("href", url);
    } else {
      $(location).attr("href", url);
    }
  });
}
function itoken(title, desc) {
  swal({
    title: '<span style="color:#222">' + title + "</span>",
    type: "success",
    html: '<span style="color:gray">' + desc + "</span>",
    confirmButtonText:
      '<span style="color:white"><i class="fa fa-times"></i> ปิด</span>',
    confirmButtonColor: "#e54d40"
  }).then(function(isConfirm) {
    var url = ".";
    if (isConfirm === true) {
      $(location).attr("href", url);
    } else {
      $(location).attr("href", url);
    }
  });
}

function ierror(title, desc) {
  swal({
    title: '<span style="color:#222">' + title + "</span>",
    type: "error",
    html: '<span style="color:gray">' + desc + "</span>",
    confirmButtonText:
      '<span style="color:white"><i class="fa fa-times"></i> ปิด</span>',
    confirmButtonColor: "#e54d40"
  });
}

function iwarning(title, desc) {
  swal({
    title: '<span style="color:#222">' + title + "</span>",
    type: "warning",
    html: '<span style="color:gray">' + desc + "</span>"
  });
}
