document.onreadystatechange = function() {
  setTimeout(function() {
    document.getElementById("loader").style.visibility = "hidden";
  }, 2000);
};
