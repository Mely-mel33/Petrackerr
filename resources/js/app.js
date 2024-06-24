import './bootstrap';
import './postInteractions';

window.Echo.channel('posts')
    .listen('PostCreated', (e) => {
        console.log(e.post);
        // Mettre à jour l'interface utilisateur avec le nouveau post
        let postsContainer = document.querySelector('.row');
        let postElement = document.createElement('div');
        postElement.classList.add('col-md-4');
        postElement.innerHTML = `
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">${e.post.body}</h5>
                    <p class="card-text">${e.post.media_type}</p>
                    ${e.post.media_type === 'image' ? `<img src="/storage/${e.post.media_link}" alt="Image" class="img-fluid">` : ''}
                    ${e.post.media_type === 'video' ? `<video controls class="img-fluid"><source src="/storage/${e.post.media_link}" type="video/mp4"></video>` : ''}
                </div>
            </div>
        `;
        postsContainer.prepend(postElement);
    });