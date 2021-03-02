var base_url = "https://cgi.sice.indiana.edu/~team12/backend/";
function post(){
    const element = document.getElementById("post-form");
    const data = new FormData(element);
    const form = Array.from(data.entries());
    console.log(form)

    var request_url =  "https://cgi.soic.indiana.edu/~team12/backend/" + "post.php";
    console.log("requested url is ", request_url);
    json = form.reduce((json, value, key) => {
        console.log("value", value);
        json[value[0]] = value[1];
        return json;
      }, {});
    
   

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
}

