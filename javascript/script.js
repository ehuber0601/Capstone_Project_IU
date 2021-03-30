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

function load_posts() {
  // console.log("Sessionid is", localStorage.getItem("session_id"));
  var json = { session_id: localStorage.getItem("session_id") };
  fetch(this.base_url + "show_posts.php", {
    method: "POST",
    mode: "no-cors",
    body: JSON.stringify(json),
    headers: {
      "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
  })
    .then((response) => {
      if (!response.ok) {
        console.log("response is", response);
        throw new Error("Could not reach website.");
      }
      console.log(response);
      return response.json();
    })
    .then(function (json) {
      console.log("Data from fetch");
      console.log(json["posts"]);
      var myarray = json["posts"];
      myarray.forEach(function (item, index) {
        // console.log("likes is", item.likes);
        // console.log("Post Content", item.postContent);
        // console.log("Date", item.postDate);

        document.getElementById(
          "post-content"
        ).innerHTML += `<div class="post p-2 border mt-2 mb-2">
                <P class="top-heading mb-2">Posted-by <span></span></P>
                <p class="top-heading mb-2">Post Content</p>
                <p class="mt-2 mb-2">${item.postContent}</p>
                <p class="mt-2 mb-2 top-heading"> Posted on <span> ${
                  item.postDate
                } </span></p>
                <div class="d-flex justify-content-between mt-2 mb-2">
                    <p onclick="update_likes(${
                      item.postID
                    })">Like <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span> ${
          item.likes
        }</span> </p>
                    <p>comments <i class="fa fa-comment" aria-hidden="true"></i> <span></span> </p>
                    <p>Total Views <span>${item.likes * 2}</span> </p>
                </div>
            </div>`;
        // Object.entries(item).forEach(([key, value]) =>
        //   console.log(`${key}: ${value}`)
        // );
      });

      //   document.getElementById("response-message").innerHTML =
      //     json["response_message"];

      if (json["result_code"] === 200) {
        console.log("hi");
        // window.location = "./index.html";
      } else if (json["result_code"] === 206) {
        console.log("206");
        // window.location = "./index.html";
      }
    })
    .catch((err) => console.error(err));
}



function load_posts() {
  var json = { session_id: localStorage.getItem("session_id") };
  fetch(this.base_url + "show_posts.php", {
    method: "POST",
    mode: "no-cors",
    body: JSON.stringify(json),
    headers: {
      "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
  })
    .then((response) => {
      if (!response.ok) {
        console.log("response is", response);
        throw new Error("Could not reach website.");
      }
      console.log(response);
      return response.json();
    })
    .then(function (json) {
      console.log("Data from fetch");
      console.log(json["posts"]);
      var myarray = json["posts"];
      myarray.forEach(function (item, index) {

        document.getElementById(
          "post-content"
        ).innerHTML += `<div class="post p-2 border mt-2 mb-2">
                <P class="top-heading mb-2">Posted-by <span></span></P>
                <p class="top-heading mb-2">Post Content</p>
                <p class="mt-2 mb-2">${item.postContent}</p>
                <p class="mt-2 mb-2 top-heading"> Posted on <span> ${
                  item.postDate
                } </span></p>

                <div class="d-flex justify-content-between mt-2 mb-2">
                    <p onclick="update_likes(${
                      item.postID
                    })">Like <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span> ${
          item.likes
        }</span>
                </div>
            </div>`;
        
      });


      if (json["result_code"] === 200) {
        console.log("hi");
       
      } else if (json["result_code"] === 206) {
        console.log("206");
        // window.location = "./index.html";
      }
    })
    .catch((err) => console.error(err));
}


