$(document).ready(() => {
  console.log("g");
  $(document).on("click", "#likeBtn", (e) => {
    e.preventDefault();
    $.ajax({
          type: "GET",
          url: "http://localhost/PHP-Blog/public/posts",
          dataType: "json",
          success: function (res) {
            console.log(res);
          },
          error: function (xhr, status, error) {
            alert("Error loading users: " + xhr.responseJSON.message);
          },
        });
  });
});
