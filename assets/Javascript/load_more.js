const loadMoreBtn = document.querySelector('.load-more-btn');
const postList = document.querySelector('.post-list');

loadMoreBtn.addEventListener('click',async function(e){
    const response = await fetch('user-posts.php?page=2&ajax=1');
    const data = await response.json();
    console.log({ data });
});