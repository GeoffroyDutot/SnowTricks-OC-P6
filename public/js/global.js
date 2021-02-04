// show medias on trick details page responsive
function showMedias() {
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
}
// Load an alert message with animation
function loadAlert() {
    document.getElementById('alert').classList.remove('opacity-0');
    document.getElementById('alert').classList.add('opacity-100');
}

// Remove alert message with animation
function removeAlert() {
    document.getElementById('alert').classList.remove('ease-in');
    document.getElementById('alert').classList.add('ease-out');
    document.getElementById('alert').classList.remove('opacity-100');
    document.getElementById('alert').classList.add('opacity-0');
    setTimeout(hiddeAlert, 1000)
}

// Remove space blank after hidding alert message
function hiddeAlert() {
    document.getElementById('alert').classList.add('hidden')
}

// Run removeAlert after some time
function loadDisappearAlert() {
    setTimeout(removeAlert, 5000);
}
