var base_url = "https://cgi.sice.indiana.edu/~team12/backend/";

// Update first Name and last name
function update_name() {
  const element = document.getElementById("update_name_form");
  const data = new FormData(element);
  const form = Array.from(data.entries());

  // convert array into json format
  json = form.reduce((json, value, key) => {
    json[value[0]] = value[1];
    return json;
  }, {});

  var request_url = this.base_url + "update_name.php";
  json["userID"] = sessionStorage.getItem("userID");
  json["session_id"] = sessionStorage.getItem("session_id");

  fetch(request_url, {
    method: "POST",
    mode: "no-cors",
    body: JSON.stringify(json),
    headers: {
      "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Could not reach website.");
      }
      return response.json();
    })
    .then(function (json) {
      document.getElementById("update_response").innerHTML =
      json["response_message"];
      console.log("response is, ", json);
    })
    .catch(
      (err) => (document.getElementById("update_response").innerHTML = err)
    );
}

// update Password
function update_password() {
  const element = document.getElementById("update_password_form");
  const data = new FormData(element);
  const form = Array.from(data.entries());

  // convert array into json format
  json = form.reduce((json, value, key) => {
    json[value[0]] = value[1];
    return json;
  }, {});

  var request_url = this.base_url + "update_password.php";
  json["userID"] = sessionStorage.getItem("userID");
  json["session_id"] = sessionStorage.getItem("session_id");
  console.log(json);

  fetch(request_url, {
    method: "POST",
    mode: "no-cors",
    body: JSON.stringify(json),
    headers: {
      "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Could not reach website.");
      }
      console.log(response);
      return response.json();
    })
    .then(function (json) {
      document.getElementById("update_password_response").innerHTML =
        json["response_message"];
    })
    .catch(
      (err) =>
        (document.getElementById("update_password_response").innerHTML = err)
    );
}

// update bio
function update_bio() {
  const element = document.getElementById("update_bio_form");
  const data = new FormData(element);
  const form = Array.from(data.entries());

  // convert array into json format
  json = form.reduce((json, value, key) => {
    json[value[0]] = value[1];
    return json;
  }, {});

  var request_url = this.base_url + "update_bio.php";
  //   console.log("requested url is ", request_url);
  json["userID"] = sessionStorage.getItem("userID");
  json["session_id"] = sessionStorage.getItem("session_id");

  fetch(request_url, {
    method: "POST",
    mode: "no-cors",
    body: JSON.stringify(json),
    headers: {
      "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Could not reach website.");
      }
      console.log(response);
      return response.json();
    })
    .then(function (json) {
      document.getElementById("update_bio_response").innerHTML =
        json["response_message"];
    })
    .catch(
      (err) => (document.getElementById("update_bio_response").innerHTML = err)
    );
}

// update Email

function update_email() {
  const element = document.getElementById("update_email_form");
  const data = new FormData(element);
  const form = Array.from(data.entries());

  // convert array into json format
  json = form.reduce((json, value, key) => {
    // console.log("value", value);
    json[value[0]] = value[1];
    return json;
  }, {});

  var request_url = this.base_url + "update_email.php";
  //   console.log("requested url is ", request_url);
  json["userID"] = sessionStorage.getItem("userID");
  json["session_id"] = sessionStorage.getItem("session_id");

  fetch(request_url, {
    method: "POST",
    mode: "no-cors",
    body: JSON.stringify(json),
    headers: {
      "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Could not reach website.");
      }
      console.log(response);
      return response.json();
    })
    .then(function (json) {
      document.getElementById("update_email_response").innerHTML =
        json["response_message"];
    })
    .catch(
      (err) =>
        (document.getElementById("update_email_response").innerHTML = err)
    );
}
