var base_url = "https://cgi.sice.indiana.edu/~team12/backend/";

function post() {
  event.preventDefault();
  const element = document.getElementById("post-form");
  const data = new FormData(element);
  const form = Array.from(data.entries());

  var request_url =
    "https://cgi.sice.indiana.edu/~team12/backend/" + "post.php";
 var json = form.reduce((json, value, key) => {

    json[value[0]] = value[1];
    return json;
  }, {});
  
  json["userID"] = sessionStorage.getItem("userID");


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

      document.getElementById("response-message").innerHTML =
        json["response_message"];
    })
    .catch(
      (err) => (document.getElementById("response-message").innerHTML = err)
    );
}
