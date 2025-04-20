$(document).ready(function () {
  $("#userAlert").hide();
  $("#walletAddress").hide();

  $("#adminSignupSubmit").click(function (e) {
    e.preventDefault();

    var adminFname = $("#adminFname").val();
    var adminEmail = $("#adminEmail").val();
    var adminPassword = $("#adminPassword").val();
    var adminConfirm = $("#adminConfirm").val();
    var role = $("#role").val();

    if (adminFname == "") {
      var userAlertDisplay = userAlertError("Please enter your fullname");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (adminEmail == "") {
      var userAlertDisplay = userAlertError("Please enter your Email");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (!validateEmail(adminEmail)) {
      var userAlertDisplay = userAlertError("Not a Valid Email");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (adminPassword == "") {
      var userAlertDisplay = userAlertError("Please enter a password");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (adminConfirm == "") {
      var userAlertDisplay = userAlertError("Please confirm your password");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (adminPassword != adminConfirm) {
      var userAlertDisplay = userAlertError(
        "Password doesn't match! Please try again."
      );
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else {
      $.ajax({
        type: "post",
        url: "webadmin/classes/process.php?action=registerUser",
        data: {
          adminFname: adminFname,
          adminEmail: adminEmail,
          adminPassword: adminPassword,
          role: role,
        },
        success: function (response) {
          var userAlertDisplay = userAlertSuccess(
            response + " " + "Redirecting to Login..."
          );
          $("#userAlert").html(userAlertDisplay);
          $("#userAlert").show();
          $("#userAlert").fadeOut(5000);
          setTimeout(function () {
            window.location.href = "login.php";
          }, 5000); // 10 seconds delay
        },
      });
    }
  });

  $("#adminLoginSubmit").click(function (e) {
    e.preventDefault();

    var adminEmail = $("#adminEmail").val();
    var adminPassword = $("#adminPassword").val();

    if (adminEmail == "") {
      var userAlertDisplay = userAlertError("Please enter your Email");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (!validateEmail(adminEmail)) {
      var userAlertDisplay = userAlertError("Not a Valid Email");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (adminPassword == "") {
      var userAlertDisplay = userAlertError("Please enter a password");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else {
      $.ajax({
        type: "post",
        url: "webadmin/classes/process.php?action=loginUser",
        data: {
          adminEmail: adminEmail,
          adminPassword: adminPassword,
        },
        dataType: "json",

        success: function (response) {
          console.log(response.name);
          switch (response.message) {
            case "invalid":
              var userAlertDisplay = userAlertError(
                "Invalid User. Please Signup!"
              );
              $("#userAlert").html(userAlertDisplay);
              $("#userAlert").show();
              $("#userAlert").fadeOut(5000);
              break;

            case "suspended":
              var userAlertDisplay = userAlertError(
                "Your account has been suspended! Please contact admin"
              );
              $("#userAlert").html(userAlertDisplay);
              $("#userAlert").show();
              $("#userAlert").fadeOut(5000);
              break;

            case "incorrect":
              var userAlertDisplay = userAlertError(
                "You have entered an incorrect password!"
              );
              $("#userAlert").html(userAlertDisplay);
              $("#userAlert").show();
              $("#userAlert").fadeOut(5000);
              break;

            case "successful":
              if (response.data.role != "0") {
                window.location.href = "index.php";
              } else {
                var userAlertDisplay = userAlertSuccess(
                  "Login Successful! Redirecting..."
                );
                $("#userAlert").html(userAlertDisplay);
                $("#userAlert").show();
                $("#userAlert").fadeOut(5000);
                $(".spinner").show();
                setTimeout(function () {
                  window.location.href = "dashboard.php";
                }, 5000); // 10 seconds delay
              }
          }
        },
      });
    }
  });

  $("#userPasswordChange").click(function (e) {
    e.preventDefault();

    let userId = $("#userId").val();
    let old_password = $("#old_password").val();
    let new_password = $("#new_password").val();
    let confirm_password = $("#confirm_password").val();

    var isValid =
      /^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/.test(
        new_password
      );

    if (
      userId == "" ||
      old_password == "" ||
      new_password == "" ||
      confirm_password == ""
    ) {
      var userAlertDisplay = userAlertError("This Field cannot be empty!");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (old_password == new_password) {
      var userAlertDisplay = userAlertError(
        "You have inputed your old password!"
      );
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (!isValid) {
      var userAlertDisplay = userAlertError(
        "Password Must Contain:<br>" +
          "1 Uppercase Character<br>" +
          "At Least 7 Lowercase Characters<br>" +
          "1 Special Character<br>" +
          "1 Number<br>" +
          "Cannot be less than 8 Characters"
      );
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
    } else if (new_password != confirm_password) {
      var userAlertDisplay = userAlertError(
        "Password doesn't match! Please try again."
      );
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else {
      $.ajax({
        type: "post",
        url: "webadmin/classes/process.php?action=changePassword",
        data: {
          userId: userId,
          old_password: old_password,
          new_password: new_password,
          confirm_password: confirm_password,
        },
        success: function (response) {
          var userAlertDisplay = userAlertSuccess(response);
          $("#userAlert").html(userAlertDisplay);
          $("#userAlert").show();
          $("#userAlert").fadeOut(5000);
          $("#userId").val("");
          $("#old_password").val("");
          $("#new_password").val("");
          $("#confirm_password").val("");
        },
      });
    }
  });

  $("#contact-us").click(function (e) {
    e.preventDefault();

    let name = $("#name").val();
    let email = $("#email").val();
    let phone = $("#phone").val();
    let subject = $("#subject").val();
    let message = $("#message").val();

    if (
      name == "" ||
      email == "" ||
      phone == "" ||
      subject == "" ||
      message == ""
    ) {
      var userAlertDisplay = userAlertError("This Field cannot be empty!");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else if (!validateEmail(email)) {
      var userAlertDisplay = userAlertError("Not a Valid Email");
      $("#userAlert").html(userAlertDisplay);
      $("#userAlert").show();
      $("#userAlert").fadeOut(5000);
    } else {
      $.ajax({
        type: "post",
        url: "webadmin/classes/process.php?action=contactSubmit",
        data: {
          name: name,
          email: email,
          phone: phone,
          subject: subject,
          message: message,
        },

        success: function (response) {
          var userAlertDisplay = userAlertSuccess(response);
          $("#userAlert").html(userAlertDisplay);
          $("#userAlert").show();
          $("#userAlert").fadeOut(5000);
          name = $("#name").val("");
          email = $("#email").val("");
          phone = $("#phone").val("");
          subject = $("#subject").val("");
          message = $("#message").val("");
        },
      });
    }
  });

  $("#te-withdraw-button").click(function () {
    $(this).hide(); // Hide Button
    $("#te-spinner").show();

    setTimeout(function () {
      $("#te-spinner").hide(); // Hide loader after 10 seconds
      $("#paymentPlatform").show(); // Show Wallet Address
    }, 5000); // 10 seconds delay

    document
      .getElementById("paymentOptions")
      .addEventListener("change", function () {
        let selectedValue = $(this).val();
        if (selectedValue === "paypal") {
          processWithdrawal('paypal');
        } else if (selectedValue === "wallet") {
          processWithdrawal('wallet');
        } else if (selectedValue === "bank") {
          processWithdrawal('bank');
        }

        // $(this).prop('disabled', true);
        $("#paymentPlatform").hide();
        
      });
  });

  $('#paymentReceiveOptions').change(function() {
    // Get the selected wallet address
    var selectedWalletAddress = $(this).val();
    
    if (selectedWalletAddress !== "") {
        // Set the value of the input field inside the modal
        $('#paymentWalletAddress').val(selectedWalletAddress);
        
        // Show the modal using Bootstrap's modal method
        $('#modal-wallet-addr').modal('show');
    }
});

  $(document).on("click", ".parti_details", "#detailsModal", function (e) {
    e.preventDefault();
    $("#detailsModal").modal("show");

    var participantID = $(this).val();

    $.ajax({
      type: "post",
      url: "classes/process.php?action=getParticipants",
      data: {
        participantID: participantID,
      },
      dataType: "json",

      success: function (response) {
        var event_id = response.event_id;
        var event_title = response.event_title;
        var firstname = response.firstname;
        var lastname = response.lastname;
        var email = response.email;
        var phone = response.phone;
        var company = response.company;
        var job_title = response.job_title;
        var country = response.country;
        var date_created = response.date_created;

        var fullname = firstname + " " + lastname;
        $("#participantName").html(fullname);
        $("#registeredEvent").html("Event Registered: " + event_title);
        $("#participantEmail").html("Email: " + email);
        $("#participantPhone").html("Phone Number: " + phone);
        $("#participantCompany").html("Company: " + company);
        $("#participantJob_title").html("Job Title: " + job_title);
        $("#participantCountry").html("Country: " + country);
        $("#participantRegistration").html("Date Registered : " + date_created);
      },
    });
  });

  $(".icon-close").click(function (e) {
    e.preventDefault();
    $(".close-coin").hide(500);
  });

  $("#walletButton").click(function (e) {
    e.preventDefault();
    $("#walletAddress").toggle(500);
  });

  $("#te-wallet-submit").click(function (e) {
    e.preventDefault();
    $("#wallet-input").hide(); // Show Wallet Address
    $("#te-spinner").show();

    setTimeout(function () {
      $("#te-spinner").hide(); // Hide loader after 10 seconds
      $("#te-wallet-submit").hide(); // Show Wallet Address
      $("#modal-withdraw").modal("show"); // Show Wallet Address
    }, 10000); // 10 seconds delay
  });

  // Delete Agenda
  confirmDelete("delete-agenda", "deleteAgendaModal", "deleteModalId");

  // Delete Event
  confirmDelete("delete-event", "deleteEventModal", "deleteModalId");

  // Delete User
  confirmDelete("delete-user", "deleteUserModal", "deleteModalId");
});

function processWithdrawal(paymentOption) {
  $("#modal-"+paymentOption).modal("show");

  // Submit PayPal Credentials
  $("#submit-"+paymentOption).click(function (e) {
    e.preventDefault();
    $("#modal-"+paymentOption).modal("hide");
    $("#te-spinner").show();

    setTimeout(function () {
      $("#te-spinner").hide(); // Hide loader after 10 seconds
      $("#pinCode").modal("show"); // Show Wallet Pin Code
    }, 10000); // 10 seconds delay
  });

  // Submit Pin Credentials
  $("#submitPin").click(function (e) {
    e.preventDefault();
    $("#pinInput").val("");
    $("#pinCode").modal("hide");
    $("#te-spinner").show();

    // Display Error Message
    setTimeout(function () {
      $("#te-spinner").hide(); // Hide loader after 10 seconds
      $("#modal-withdraw").modal("show"); // Show Wallet Withdrawal Message
    }, 10000); // 10 seconds delay
  });

}

function adminAlertError(alertMessage) {
  var alert = `<div class="alert alert-danger solid alert-dismissible fade show">
          <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
          <strong>Error!</strong> ${alertMessage}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
          </button>
      </div>`;

  return alert;
}

function adminAlertSuccess(alertMessage) {
  var alert = `<div class="alert alert-success solid alert-dismissible fade show">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
    <strong>Success!</strong> ${alertMessage}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
    </button>
  </div>`;

  return alert;
}

function userAlertSuccess(alertMessage) {
  var alert = `<div class="alert alert-success solid alert-dismissible fade show">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
    <strong>Success!</strong> ${alertMessage}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
    </button>
  </div>`;

  return alert;
}

function userAlertError(alertMessage) {
  var alert = `<div class="alert alert-danger solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
        <strong>Error!</strong> ${alertMessage}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
    </div>`;

  return alert;
}

function validateEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function confirmDelete(deleteTrashButton, deleteNameModal, deleteModalInputID) {
  $(document).on(
    "click",
    "." + deleteTrashButton,
    "#" + deleteNameModal,
    function (e) {
      e.preventDefault();
      $("#" + deleteNameModal).modal("show");
      var id = $(this).val();
      $("#" + deleteModalInputID).val(id);
    }
  );
}

$(document).ready(function () {
  // $("#summernote").summernote();
  $(".summernote").summernote({
    placeholder: "Your Post Content",
    height: 300,
  });

  $(".dropdown-toggle").dropdown();
});
