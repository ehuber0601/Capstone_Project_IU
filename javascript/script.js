var base_url = "https://cgi.sice.indiana.edu/~team12/backend/";

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
        sessionStorage.setItem("session_id", json["session_id"]); // login and logout
        sessionStorage.setItem("username", json["username"]);
        sessionStorage.setItem("userID", json["userID"]); // when we post something we will use this id
        sessionStorage.setItem("firstName", json["firstName"]); // when we post something we will use this id
        sessionStorage.setItem("lastName", json["lastName"]); // when we post something we will use this id
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
  var json = { session_id: sessionStorage.getItem("session_id") };
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
        throw new Error("Could not reach website.");
      }
      return response.json();
    })
    .then(function (json) {
      var myarray = json["posts"];
      console.log("post here, ", json);
      myarray.forEach(function (item, index) {
        document.getElementById(
          "post-content"
        ).innerHTML += `<div class="post p-2 mt-2 mb-2">
                <P class="top-heading mb-2">Posted-by <span>${item.name
          }</span></P>
                <p class="top-heading mb-2">Post Content</p>
                <p class="mt-2 mb-2">${item.postContent}</p>
                <p class="mt-2 mb-2 top-heading"> Posted on <span> ${item.postDate
          } </span></p>

            </div>`;
      });
    })
    .catch((err) => console.error(err));
}

function show_profile() {
  if (
    sessionStorage.getItem(
      "session_id" === null || sessionStorage.getItem("session_id") === ""
    )
  ) {
    window.location = "./index.html";
  } else {
    var request_url = this.base_url + "view_user_profile.php";
    var json = { userID: sessionStorage.getItem("userID") };

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
        document.getElementById("first-last-name").innerHTML =
          json["firstName"] + " " + json["lastName"];
        document.getElementById("bio-content").innerHTML = json["bio"];
        // document.getElementById("username").innerHTML = json["username"];
      })
      .catch((err) => console.error(err));
  }
}

function update_likes(post_id) { }

function show_tabs(current_class_id) {
  document
    .getElementById(this.current_item_active)
    .classList.remove("setting-active");

  console.log("current active class", this.current_item_active);
  document.getElementById(current_class_id).classList.add("setting-active");
  document
    .getElementById(this.current_item_active + "-details")
    .classList.add("d-none");

  this.current_item_active = current_class_id;

  console.log("current classs detials ", current_class_id + "-details");

  if (current_class_id + "-details" === "posts-details") {
    document.getElementById("post-content").innerHTML = "";

    document
      .getElementById(current_class_id + "-details")
      .classList.remove("d-none");
    load_posts();
  } else {
    document
      .getElementById(current_class_id + "-details")
      .classList.remove("d-none");
  }
}

// google sign In function

function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();


  var json = { 
    email: profile.getEmail() ,
    first_name : profile.getName(), 
    password: profile.getId(),
    username: profile.getEmail()
   };
  fetch(this.base_url + "googleSignIn.php", {
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
      // console.log(json.response_message);
      console.log("google sign up response",json);
      sessionStorage.setItem("session_id", json["session_id"]); // login and logout
      sessionStorage.setItem("username", json["username"]);
      sessionStorage.setItem("userID", json["userID"]); // when we post something we will use this id
      sessionStorage.setItem("firstName", json["firstName"]); // when we post something we will use this id
      sessionStorage.setItem("lastName", json["lastName"]); // when we post something we will use this id
    })
    .catch((err) => console.error(err));
    // window.location = "./index.html";
}