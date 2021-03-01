var base_url = "https://cgi.sice.indiana.edu/~team12/backend/";
function post(){
    const element = document.getElementById("post-form");
    const data = new FormData(element);
    const form = Array.from(data.entries());
    console.log(form)

    json = form.reduce((json, value, key) => {
        console.log("value", value);
        json[value[0]] = value[1];
        return json;
      }, {});
    
    var request_url = this.base_url + "post.php";
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
      })
    
    
}

