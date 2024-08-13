var data = "email=mynewemail%40mydomain.com&first_name=John&last_name=Doe";

var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === 4) {
    console.log(this.responseText);
  }
});

xhr.open("POST", "https://<your_app_subdomain>.user.com/api/public/users/");
xhr.setRequestHeader("authorization", "Token <your_64_char_api_key>");
xhr.setRequestHeader("content-type", "application/json");

xhr.send(data);