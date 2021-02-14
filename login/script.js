// <script>
//         Javascript code for calling APi

$(document).ready(function () {
  console.log("ready!");

  $("#signup-button").click(function (event) {
    event.preventDefault();
  });
});

function api_request() {
  var result = validate_input();
  // checking if user has enterd something in input field ..
  if (result == true) {
    // if valid then send APi request by calling send_request() function
    send_request();
  }
}

function validate_input() {
  if (document.getElementById("team-number").value.length == 0) {
    // if length of input is 0 it means input field has not been entered
    document.getElementById("error-message").innerHTML =
      "Input must not be empty *";
    return false;
  } else {
    return true;
  }
}

function delete_previous_data() {
  // deleting card body element if exist .. sp if we have already called APi and again calling it will remove previous data
  var list = document.getElementsByClassName("card-body")[0];

  // As long as list has a child node, remove it
  while (list.hasChildNodes()) {
    list.removeChild(list.firstChild);
    document.getElementById("error-message").innerHTML = "";
  }
}

async function send_request() {
  // this function send request to APu using POst method
  delete_previous_data();

  var URL = "https://infocpst.luddy.indiana.edu/magic-number/generate";
  //   var URL = "./login.php";

  var data = new FormData();

  data.append("team", 12);

  data.append("number", document.getElementById("team-number").value);

  let request = await fetch(URL, {
    method: "POST",
    body: data,
  });

  data = await request.json();
  // decoding data into json format
  // now we are calling get_response function to display response of API Call
  get_response(data);
}

function get_response(data) {
  var heading = document.createElement("H3");
  heading.innerHTML = "Status:";

  // Creating H3 for Status heading

  var heading_status = document.createElement("P");
  heading_status.innerHTML = data["status"]; // true or false // based on API data it will display true or false

  var message_title = document.createElement("H3");

  message_title.innerHTML = "Message:";
  var message_detail = document.createElement("P");

  message_detail.innerHTML = data["message"]; // message content based on APi response

  var card_body = document.getElementsByClassName("card-body")[0];

  // Append above elements using insertbefore child

  card_body.insertBefore(heading, card_body.childNodes[0]);
  card_body.insertBefore(heading_status, card_body.childNodes[1]);
  card_body.insertBefore(message_title, card_body.childNodes[2]);
  card_body.insertBefore(message_detail, card_body.childNodes[3]);
}

function validate_login_form() {
  // Getting value from input field User name and password we will use these value to check for validation

  event.preventDefault();
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  if (username.length <= 0) {
    document.getElementsByClassName("login-error-message")[0].innerHTML =
      "Email must not be empty";
    // message will be displayed if user name is not entered
  } else if (password.length <= 0) {
    document.getElementsByClassName("login-error-message")[1].innerHTML =
      "Password must not be empty";
    // message will be displayed if password is not entered
  } else if (password.length > 0 && username.length > 0) {
    document.getElementsByClassName("login-error-message")[0].innerHTML = "";
    document.getElementsByClassName("login-error-message")[1].innerHTML = "";
    // clearing all error message because username and password is enterd now we will call login function .. from there we will call php function
    login();
  }
}

function login() {
  // creating XML request for ajax call
  // There are two ways to call implement ajax  1 jQuery 2 Javascript XMLHttpRequest function so here i am using  XMLHttpRequest function
  var request = new XMLHttpRequest(); // object created
  $("#login-button").text("....");

  var url = "https://cgi.soic.indiana.edu/~team12/login.php";

  $("#login-message").text("Please wait While verify credintials from DB");
  request.open("POST", url, true);
  // It Sets the request method, request URL, and synchronous flag.Throws a "SyntaxError" DOMException if either method is not a valid HTTP method or url cannot be parsed.

  // Throws a "SecurityError" DOMException if method is a case-insensitive match for CONNECT, TRACE, or TRACK.

  request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
      // var jsonData = JSON.parse(request.response);
      console.log(request.response);

      var data = JSON.parse(request.response);
      // console.log(typeof(data));

      if (data.status_code == 200) {
        // data.response_message
        location.href = "./afterlogin.html";

        // Login successful so we will redirect to afterlogin page
      } else {
        document.getElementById("login-message").innerHTML =
          data.response_message;
        $("#login-button").text("Login");
        $("#login-button").on();

        // No user name found in database so message will be displayed to user
      }
    }
  };

  request.setRequestHeader("Content-Type", "application/json");
  // Combines a header in author request headers.

  // Throws an "InvalidStateError" DOMException if either state is not opened or the send() flag is set.

  // Throws a "SyntaxError" DOMException if name is not a header name or if value is not a header value.

  var data = JSON.stringify({
    username: document.getElementById("username").value,
    password: document.getElementById("password").value,
  });
  // stringify function Converts a JavaScript value to a JavaScript Object Notation (JSON) string.

  // console.log(typeof(JSON.parse(data)));

  request.send(data);
  // Initiates the request. The body argument provides the request body, if any, and is ignored if the request method is GET or HEAD.
  // data = JSON.parse(data)
}

function registration(email, first_name, last_name, password) {
  $("#signup-button").off();
  $("#signup-button").html("Loading..");
  document.getElementById("signup-response-message").innerHTML = "";

  var request = new XMLHttpRequest();
  var url = "https://cgi.luddy.indiana.edu/~jeadelso/capstone-individual/Itp-06/register.php";

  request.open("POST", url, true);

  request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
      $("#signup-button").on();
      $("#signup-button").html("Sign Up");
      var data = JSON.parse(request.response);
      document.getElementById("signup-response-message").innerHTML =
        data.response_message;
      document.getElementById("signup-form").reset();
    }
  };
  // };
  request.setRequestHeader("Content-Type", "application/json");

  var data = JSON.stringify({
    email: email,
    first_name: first_name,
    last_name: last_name,
    password: password,
  });

  request.send(data);
}

function validate_signup_form() {
  event.preventDefault();
  // $("#signup-button").click(function (event) {
  //   event.preventDefault();
  // });
  var first_name_validated = false;
  var last_name_validated = false;
  var password_validated = false;

  var email = document.getElementById("signup-email").value;
  var password = document.getElementById("signup-password").value;
  var first_name = document.getElementById("first-name").value;
  var last_name = document.getElementById("last-name").value;
  var repeat_password = document.getElementById("repeat-password").value;

  var repeat_validated = false;

  if (validate_email(email)) {
    $("#signup-email-error").text("");
    // email_validated = true;
  } else {
    $("#signup-email-error").text("Please Enter valid email");
  }

  if (first_name.length < 2) {
    $("#first-name-error").text("First name must be at least 2 digit");
    first_name_validated = false;
  } else {
    $("#first-name-error").text("");
    first_name_validated = true;
  }

  if (password != repeat_password) {
    $("#repeat-password-error").text("Both password must be same");
    repeat_password = false;
  } else {
    $("#repeat-password-error").text("");
    repeat_password = true;
  }
  if (last_name.length < 3) {
    $("#last-name-error").text("Last name must be at least 3 digits");
    last_name_validated = false;
  } else {
    $("#last-name-error").text("");
    last_name_validated = true;
  }

  if (password.length == 0 || password.length < 8) {
    $("#signup-password-error").text("password must be at least 8 digits");
  } else {
    $("#signup-password-error").text("");
    password_validated = true;
  }
  if (
    validate_email(email) &&
    password_validated &&
    first_name_validated &&
    last_name_validated &&
    repeat_password
  ) {
    registration(email, first_name, last_name, password);
  }
}

function validate_email(email) {
  const re = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
  if (re.test(email)) {
    return true;
    // email_validated = true;
  } else {
    return false;
    // $("#login-email-error").text("Please Enter valid email");
  }
}
