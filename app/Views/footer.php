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
                    if (xhr.status === 401) {
                        alert("Please log in to like a post.");
                    } else {
                        alert(
                            "Unable to update the like. Please try again."
                        );
                    }
                },

                complete: function () {
                    // Allow the next click.
                    button.prop("disabled", false);
                }
            });
        });
        
});
    </script>
  </body>
</html>