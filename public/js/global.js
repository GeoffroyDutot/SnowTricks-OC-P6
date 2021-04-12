document.getElementById('show-medias-btn').addEventListener('click', function () {
     let trickMedias = document.getElementById('trick-medias');
    if (trickMedias.classList.contains('hidden')) {
        trickMedias.classList.remove('hidden');
        trickMedias.classList.add('flex');
        this.innerHTML = 'Hide medias';
    } else {
        trickMedias.classList.add('hidden');
        this.innerHTML = 'Show medias';
    }
});
