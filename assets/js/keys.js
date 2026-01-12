/**
 * Keyses Posts Grid with Load More functionality
 * Author: WordPress Developer
 * Version: 1.0
 */

document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.getElementById('keysesLoadMorePosts');
    
    if (!loadMoreBtn) return;
    
    const gridInner = document.getElementById('keysesPostsGridInner');
    const btnText = loadMoreBtn.querySelector('.keyses-btn-text');
    const btnLoading = loadMoreBtn.querySelector('.keyses-btn-loading');
    
    loadMoreBtn.addEventListener('click', function(e) {
        e.preventDefault();
        
        const currentPage = parseInt(this.dataset.keysesPage);
        const totalPages = parseInt(this.dataset.keysesTotalPages);
        
        // Показываем индикатор загрузки
        btnText.style.display = 'none';
        btnLoading.style.display = 'inline-block';
        this.disabled = true;
        
        // Подготавливаем данные для AJAX
        const data = new URLSearchParams();
        data.append('action', 'keyses_load_more_posts');
        data.append('page', currentPage + 1);
        data.append('nonce', window.keysesPostsGridAjax.nonce);
        
        // Отправляем AJAX запрос
        fetch(window.keysesPostsGridAjax.ajax_url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Добавляем новые посты
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = data.data.html;
                
                tempDiv.querySelectorAll('.keyses-post-card').forEach((post, index) => {
                    post.style.opacity = '0';
                    post.style.transform = 'translateY(30px)';
                    gridInner.appendChild(post);
                    
                    setTimeout(() => {
                        post.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                        post.style.opacity = '1';
                        post.style.transform = 'translateY(0)';
                    }, 100 * index);
                });
                
                // Обновляем номер страницы
                this.dataset.keysesPage = currentPage + 1;
                
                // Скрываем кнопку если больше нет постов
                if (currentPage + 1 >= totalPages) {
                    this.style.opacity = '0';
                    this.style.pointerEvents = 'none';
                }
            } else {
                console.error('Error:', data);
                alert('Ошибка: ' + data.data);
            }
        })
        .catch(error => {
            console.error('AJAX Error:', error);
            alert('Ошибка соединения');
        })
        .finally(() => {
            btnText.style.display = 'inline-block';
            btnLoading.style.display = 'none';
            this.disabled = false;
        });
    });
});