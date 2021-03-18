var base_url = "https://cgi.sice.indiana.edu/~team12/backend/";
//  change base url from here

var current_item_active = "security";

function login() {
  const element = document.getElementById("login-form");
  const data = new FormData(element);

  const form = Array.from(data.entries());
  console.log("form type is", form);

  json = form.reduce((json, value, key) => {
    console.log("value", value);
    json[value[0]] = value[1];
    return json;
  }, {});
  var request_url = this.base_url + "login.php";
  console.log("requested url is ", request_url);

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
        console.log("response is, ", response);

        throw new Error("Could not reach website.");
      }
      console.log(response);
      return response.json();
    })
    .then(function (json) {
      console.log("Data from fetch");
      console.log(json);
      document.getElementById("response-message").innerHTML =
        json["response_message"];

      if (json["result_code"] === 200) {
        console.log("hi", json);
        localStorage.setItem("session_id", json["session_id"]); // login and logout
        localStorage.setItem("username", json["username"]);
        localStorage.setItem("userID", json["userID"]); // when we post something we will use this id
        window.location = "./index.html";
      } else if (json["result_code"] === 206) {
        console.log("206");
        // window.location = "./index.html";
      }
    })
    .catch(
      (err) => (document.getElementById("response-message").innerHTML = err)
    );
}


