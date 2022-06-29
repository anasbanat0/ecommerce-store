jQuery(function () {
  /// Hide And Show Code Starts ///
  $(".nav-toggle").click(function () {
    $(".card-collapse,.collapse-data").slideToggle(700, function () {
      if ($(this).css("display") == "none") {
        $(".hide-show").html("Show");
      } else {
        $(".hide-show").html("Hide");
      }
    });
  });
  /// Hide And Show Code Ends ///
  /// Search Filters code Starts ///
  $(function () {
    $.fn.extend({
      filterTable: function () {
        return this.each(function () {
          $(this).on("keyup", function () {
            var $this = $(this),
              search = $this.val().toLowerCase(),
              target = $this.attr("data-filters"),
              handle = $(target),
              rows = handle.find("li a");
            if (search == "") {
              rows.show();
            } else {
              rows.each(function () {
                var $this = $(this);
                $this.text().toLowerCase().indexOf(search) === -1
                  ? $this.hide()
                  : $this.show();
              });
            }
          });
        });
      },
    });
    $('[data-action="filter"][id="dev-table-filter"]').filterTable();
  });
  /// Search Filters code Ends ///
  // getProducts Function Code Starts
  function getProducts() {
    // Manufacturers Code Starts
    var sPath = "";
    var aInputs = $("li").find(".get_manufacturer");
    var aKeys = Array();
    var aValues = Array();
    iKey = 0;
    $.each(aInputs, function (key, oInput) {
      if (oInput.checked) {
        aKeys[iKey] = oInput.value;
      }
      iKey++;
    });
    if (aKeys.length > 0) {
      var sPath = "";
      for (var i = 0; i < aKeys.length; i++) {
        sPath = sPath + "man[]=" + aKeys[i] + "&";
      }
    }
    // Manufacturers Code ENDS
    // Products Categories Code Starts
    var aInputs = Array();
    var aInputs = $("li").find(".get_p_cat");
    var aKeys = Array();
    var aValues = Array();
    iKey = 0;
    $.each(aInputs, function (key, oInput) {
      if (oInput.checked) {
        aKeys[iKey] = oInput.value;
      }
      iKey++;
    });
    if (aKeys.length > 0) {
      for (var i = 0; i < aKeys.length; i++) {
        sPath = sPath + "p_cat[]=" + aKeys[i] + "&";
      }
    }
    // Products Categories Code ENDS
    // Categories Code Starts
    var aInputs = Array();
    var aInputs = $("li").find(".get_cat");
    var aKeys = Array();
    var aValues = Array();
    iKey = 0;
    $.each(aInputs, function (key, oInput) {
      if (oInput.checked) {
        aKeys[iKey] = oInput.value;
      }
      iKey++;
    });
    if (aKeys.length > 0) {
      for (var i = 0; i < aKeys.length; i++) {
        sPath = sPath + "cat[]=" + aKeys[i] + "&";
      }
    }
    // Categories Code ENDS
    // Loader Code Starts
    $("#wait").html('<img src="images/load.gif">');
    // Loader Code ENDS
    // ajax Code Starts
    $.ajax({
      url: "load.php",
      method: "POST",
      data: sPath + "sAction=getProducts",
      success: function (data) {
        $("#Products").html("");
        $("#Products").html(data);
        $("#wait").empty();
      },
    });
    $.ajax({
      url: "load.php",
      method: "POST",
      data: sPath + "sAction=getPaginator",
      success: function (data) {
        $(".pagination").html("");
        $(".pagination").html(data);
      },
    });
    // ajax Code Ends
  }
  // getProducts Function Code Ends
  $(".get_manufacturer").click(function () {
    getProducts();
  });
  $(".get_p_cat").click(function () {
    getProducts();
  });
  $(".get_cat").click(function () {
    getProducts();
  });
  $(document).on("keyup", ".quantity", function () {
    var id = $(this).data("product_id");
    var quantity = $(this).val();
    if (quantity != "") {
      $.ajax({
        url: "change.php",
        method: "POST",
        data: { id: id, quantity: quantity },
        success: function (data) {
          $("body").load("cart_body.php");
        },
      });
    }
  });
  $('.tick1').hide();
  $('.cross1').hide();
  $('.tick2').hide();
  $('.cross2').hide();
  $('.confirm').focusout(function () {
    var password = $('#pass').val();
    var confirmPassword = $('#con_pass').val();
    if (password == confirmPassword) {
      $('.tick1').show();
      $('.cross1').hide();
      $('.tick2').show();
      $('.cross2').hide();
    } else {
      $(".tick1").hide();
      $(".cross1").show();
      $(".tick2").hide();
      $(".cross2").show();
    }
  });
  $("#pass").keyup(function () {
    check_pass();
  });
});

function check_pass() {
  var val = document.getElementById("pass").value;
  var meter = document.getElementById("meter");
  var no = 0;
  if (val != "") {
    // If the password length is less than or equal to 6
    if (val.length <= 6) no = 1;
    // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
    if (
      val.length > 6 &&
      (val.match(/[a-z]/) ||
        val.match(/\d+/) ||
        val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))
    )
      no = 2;
    // If the password length is greater than 6 and contain alphabet,number,special character respectively
    if (
      val.length > 6 &&
      ((val.match(/[a-z]/) && val.match(/\d+/)) ||
        (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) ||
        (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))
    )
      no = 3;
    // If the password length is greater than 6 and must contain alphabets,numbers and special characters
    if (
      val.length > 6 &&
      val.match(/[a-z]/) &&
      val.match(/\d+/) &&
      val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)
    )
      no = 4;
    if (no == 1) {
      $("#meter").animate({ width: "50px" }, 300);
      meter.style.backgroundColor = "red";
      document.getElementById("pass_type").innerHTML = "Very Weak";
    }
    if (no == 2) {
      $("#meter").animate({ width: "100px" }, 300);
      meter.style.backgroundColor = "#F5BCA9";
      document.getElementById("pass_type").innerHTML = "Weak";
    }
    if (no == 3) {
      $("#meter").animate({ width: "150px" }, 300);
      meter.style.backgroundColor = "#FF8000";
      document.getElementById("pass_type").innerHTML = "Good";
    }
    if (no == 4) {
      $("#meter").animate({ width: "200px" }, 300);
      meter.style.backgroundColor = "#00FF40";
      document.getElementById("pass_type").innerHTML = "Strong";
    }
  } else {
    meter.style.backgroundColor = "";
    document.getElementById("pass_type").innerHTML = "";
  }
}
