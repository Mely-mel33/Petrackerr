document.addEventListener('DOMContentLoaded', function () {
    // Like button click handler
    document.querySelectorAll('.like-button').forEach(button => {
        button.addEventListener('click', function () {
            const postId = this.dataset.postId;
            axios.post('/likes', { post_id: postId })
                .then(response => {
                    // Handle the response (e.g., update the like count or button text)
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        });
    });

    // Comment form submit handler
    const commentForm = document.querySelector('#comment-form');
    if (commentForm) {
        commentForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const postId = document.querySelector('input[name="post_id"]').value;
            const content = document.querySelector('textarea[name="content"]').value;
            axios.post('/comments', { post_id: postId, content: content })
                .then(response => {
                    // Handle the response (e.g., append the new comment to the comment list)
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        });
    }
});
