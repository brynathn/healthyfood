$(document).ready(function () {
  var readURL = function (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $(".profile-pic").attr("src", e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  };

  $(".file-upload").on("change", function () {
    readURL(this);
  });

  $(".upload-button").on("click", function () {
    $(".file-upload").click();
  });
});

function calculateTotalAndGrade() {
  var responsibility =
    parseFloat(document.getElementById("responsibility").value) || 0;
  var teamwork = parseFloat(document.getElementById("teamwork").value) || 0;
  var managementTime =
    parseFloat(document.getElementById("managementTime").value) || 0;

  var total = 0.3 * responsibility + 0.3 * teamwork + 0.4 * managementTime;

  var grade = "";
  if (total >= 80) {
    grade = "A";
  } else if (total >= 60) {
    grade = "B";
  } else if (total >= 40) {
    grade = "C";
  } else {
    grade = "D";
  }

  // Masukkan hasil perhitungan ke input
  document.getElementById("total").value = total;
  document.getElementById("grade").value = grade;
}
