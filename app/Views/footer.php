<hr />
    <footer>
      <p>GreatZone 2022 copyright all rights reserved</p>

      <ul>
        <li>
          <i class="fa fa-instagram"></i>
        </li>
        <li>
          <i class="fa fa-twitter"></i>
        </li>
        <li>
          <i class="fab fa-linkedin"></i>
        </li>
      </ul>
    </footer>
    <script>
      $(document).ready(() => {
  
        $(document).on("click", "#likeBtn", function (e) {
            e.preventDefault();

            const button = $(this);
            const postId = button.data("post-id");

            // Prevent duplicate requests while processing.
            if (button.prop("disabled")) {
                return;
            }

            button.prop("disabled", true);

            $.ajax({
                type: "POST",
                url: "<?= $commonPath ?>like",
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                },

                data: {
                    post_id: postId
                },

                dataType: "json",

                success: function (response) {
                    if (!response.success) {
                        alert(
                            response.message ||
                            "Unable to update like."
                        );
                        return;
                    }

                    // Update the total count.
                    $("#likeCount").text(response.like_count);

                    // Update the button label.
                    button.find(".like-label").text(
                        response.liked == true
                            ? "❤️ Liked"
                            : "🤍 Like"
                    );

                    // Update the visual state.
                    button.toggleClass(
                        "liked",
                        response.liked
                    );
                    console.log(response);
                },

                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.status === 401) {
                        const response = xhr.responseJSON;

                        window.location.href =
                            response?.redirect || "/PHP-Blog/public/login";
                    } else {
                        console.log(xhr.responseText);
                        alert("Request failed.");
                    }
                },

                complete: function () {
                    // Allow the next click.
                    button.prop("disabled", false);
                }
            });
        });

        $(document).on("click", "#commentBtn", function (e) {
            e.preventDefault();

            const postId = $("#commentBtn").data("post-id");

            const comment = $("#commentInput").val();

            $.ajax({
                type:"POST",
                url: "<?= $commonPath ?>comment",
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                },

                data: {
                    post_id: postId,
                    comment: comment
                },

                dataType: "json",
                
                success:function(response) {
                    $(".error").text(response?.message).show();
                    setTimeout(function() {
                        $(".error").fadeOut('slow');
                    }, 1000);
                    $(".comments").empty();
                    $("#commentInput").val("");
                    if(response.comments) {
                        response.comments.forEach(item => {
                            const newHeading = $("<h3>", {
                                text:item.username
                            })
                            const newPara = $("<p>", {
                                text:item.comment
                            })
                            const newLine = $("<hr>");
                            $(".comments").append(newHeading, newPara, newLine);
                        });
                    }
                },

                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.status === 401) {
                        const response = xhr.responseJSON;

                        window.location.href = response?.redirect || "/PHP-Blog/public/login";
                    } else {
                        console.log(xhr.responseText);
                        alert("Request failed.");
                    }
                },
            })

        });
});
    </script>
  </body>
</html>