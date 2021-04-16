var baseURL = "https://cgi.sice.indiana.edu/~team12/backend/";

function showGroupPosts() {
    var url = baseURL + "showGroupPosts.php";

    var json = {
        session_id: sessionStorage.getItem("session_id"),
        groupID: sessionStorage.getItem("groupID"),
        userID: sessionStorage.getItem("userID"),
    };

    fetch(url, {
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
        .then(function(json) {
            console.log(json);
            document.getElementById("group-posts-section").innerHTML = "";
            var myPosts = json['groupPosts'];
            myPosts.forEach(item => {
                document.getElementById("group-posts-section").innerHTML += `<div class="post p-2 border mt-2 mb-2">
      <P class="top-heading mb-2">Posted-by <span>${item.postedBy
          }</span></P>
      <p class="top-heading mb-2">Post Content</p>
      <p class="mt-2 mb-2">${item.postContent}</p>
      <p class="mt-2 mb-2 top-heading"> Posted on <span> ${item.postDate
          } </span></p>

      <div class="d-flex justify-content-between mt-2 mb-2">
          <p onclick="update_likes(${item.postID
          })">Like<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span> ${item.likes
          }</span> </p>
          <p>comments <i class="fa fa-comment" aria-hidden="true"></i> <span></span> </p>
          <p>Total Views <span>${item.likes * 2}</span> </p>
      </div>
  </div>`
            });
            console.log(json);
        })
        .catch((err) => console.log(err));
}

function addGroupPosts(groupID) {

    const postForm = `
          <div class="create-group-posts group-setting">
              <form action="" onsubmit="event.preventDefault(); groupPostResponse(${groupID});">
                <input class="d-block w-100 mt-2 mb-2" type="text" name="groupPostContent" required id="newGroupPost" placeholder="Enter Content for group posts">
                <button class="button button-primary"> Create Post</button>
              </form>
              <p id="create-groupPost-response" class="response-message"></p>
          </div>`;

    showPopUpMessage(postForm);
}

function groupPostResponse(groupID) {
    var url = baseURL + "addGroupPosts.php";
    var json = {
        userID: sessionStorage.getItem("userID"),
        session_id: sessionStorage.getItem("session_id"),
        groupID: groupID,
        postContent: document.getElementById("newGroupPost").value
    };

    fetch(url, {
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
        .then(function(json) {

            console.log(json);
            document.getElementById("create-groupPost-response").innerHTML = json.response_message;

        })
        .catch((err) => {
            console.log(err);
            document.getElementById("create-groupPost-response").innerHTML = err;
        });
}

function searchGroup() {
    console.log("Search is called");
    document.querySelector(".search-result").innerHTML = "";
    var url = baseURL + "searchGroup.php";
    var json = {
        searchQuery: document.getElementById("groupName").value,
        userID: sessionStorage.getItem("userID"),
        session_id: sessionStorage.getItem("session_id"),
    };

    fetch(url, {
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
        .then(function(json) {
            console.log("Search result", json);
            if (json["status_code"] === 200) {
                var groups = json['groups'];
                var userID = sessionStorage.getItem("userID");

                groups.forEach(element => {
                    var buttonHTML;
                    // user is already a part of group
                    if (element.group_status === "joined") {
                        //  buttonHTML = 
                        buttonHTML = `<button class="btn btn-primary" onclick="leaveGroup(${element.groupID} , ${userID})">Leave -</button>`;
                    } else {
                        // user is not a part of group
                        buttonHTML = `<button class="btn btn-primary" onclick="joinGroup(${element.groupID} , ${userID})">Join +</button>`;
                    }

                    document.querySelector("#search-result-section").innerHTML += `<div class="group-setting">
            <P>Group name <span>${element.groupName}</span></P>
            <P>Created By <span>${element.owner}</span></P>
            ${buttonHTML}
        </div>`;
                });

            }
            console.log(json);
        })
        .catch((err) => console.log(err));
}

function joinGroup(groupID, userID) {
    var url = baseURL + "joinGroup.php";
    var json = { groupID: groupID, userID: userID }

    fetch(url, {
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
        .then(function(json) {
            console.log(json.response_message);
            showPopUpMessage(json.response_message);
            showMyGroups();
            showGroupPosts();

        })
        .catch((err) => console.log(err));
}

function showMyGroups() {
    // my-groups-section
    var userID = sessionStorage.getItem('userID');
    var url = baseURL + "showMyGroups.php";
    var json = { userID: sessionStorage.getItem('userID'), session_id: sessionStorage.getItem("session_id") }
    document.getElementById("my-groups-section").innerHTML = "";
    fetch(url, {
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
        .then(function(json) {
            console.log(json);
            if (json.status_code == 200) {
                var myGroups = json.groupsList;
                if (myGroups.length === 0) {
                    document.querySelector(".create-group-posts").style.display = 'none';
                }

                myGroups.forEach(element => {
                    document.getElementById("my-groups-section").innerHTML += `<div id = '${element.groupID}' onclick = activeGroup(${element.groupID}) class="group-setting">
          <p>${element['groupName']}</p> <button class="button button-danger" onclick="leaveGroup(${element.groupID} , ${userID})">Leave -</button>
          <button class="button button-primary" onclick="addGroupPosts(${element.groupID})">Create Post</button>
      </div>`;
                });
                console.log(json);
            }

        })
        .catch((err) => console.log(err));
}

function leaveGroup(groupid, user_id) {
    var url = baseURL + "leaveGroup.php";
    var json = { groupID: groupid, userID: user_id }

    fetch(url, {
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
        .then(function(json) {
            console.log(json.response_message);
            showPopUpMessage(json.response_message);
            showMyGroups();
            showGroupPosts();

        })
        .catch((err) => console.log(err));

}

function createGroup() {
    var url = baseURL + "createGroup.php";
    var json = { userID: sessionStorage.getItem("userID"), groupName: document.getElementById("newGroupName").value }

    fetch(url, {
            method: "POST",
            mode: "no-cors",
            body: JSON.stringify(json),
            headers: {
                "Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
            },
        }).then((response) => {
            if (!response.ok) {
                throw new Error("Could not reach website.");
            }
            return response.json();
        })
        .then(function(json) {
            showPopUpMessage(json.response_message);
            // document.getElementById("create-group-response").innerHTML = json.response_message;
            console.log(json.response_message);

        }).catch((err) => console.log(err));
}


function activeGroup(groupID) {
    var previous_group = sessionStorage.getItem("groupID");

    document.getElementById(previous_group).classList.remove("setting-active");
    document.getElementById(groupID).classList.add("setting-active");
    sessionStorage.setItem("groupID", groupID);

}

function closePopUpMessage() {
    document.querySelector(".modal-content p").innerHTML = "";
    document.getElementById("myModal").style.display = "none";
    console.log("Popup closed");
}

function showPopUpMessage(response_message) {
    console.log("hi");
    var modal = document.getElementById("myModal");
    document.querySelector(".modal-content p").innerHTML = response_message;


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    modal.style.display = "block";

    window.onclick = function(event) {
        if (event.target == modal) {
            closePopUpMessage();
        }
    }

}

showMyGroups();

showGroupPosts();