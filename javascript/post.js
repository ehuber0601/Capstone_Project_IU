function post(){
    const element = document.getElementById("post-form");
    const data = new FormData(element);
    const form = Array.from(data.entries());
    console.log(form)
}