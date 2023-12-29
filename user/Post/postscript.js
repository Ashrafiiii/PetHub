document.addEventListener('DOMContentLoaded', function () {
    const commentInput = document.getElementById('comment-input');
    const postCommentButton = document.getElementById('post-comment-button');
    const commentsContainer = document.querySelector('.comments-container');

    // Simulate loading initial comments
    loadComments();

    postCommentButton.addEventListener('click', function () {
        const commentText = commentInput.value.trim();
        if (commentText !== '') {
            addComment(commentText);
            commentInput.value = '';
        }
    });

    function addComment(commentText) {
        const newComment = document.createElement('div');
        newComment.classList.add('comment');
        newComment.innerHTML = `<strong>User:</strong> ${commentText}`;
        commentsContainer.appendChild(newComment);
    }

    function loadComments() {
        // Simulate loading comments from the server
        const initialComments = ['This is a great post!', 'Awesome content!'];

        initialComments.forEach(commentText => {
            addComment(commentText);
        });
    }
});
