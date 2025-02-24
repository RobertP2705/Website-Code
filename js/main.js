function openModal(imageSrc, imageDesc) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImage');
    const modalDesc = document.getElementById('modalDescription');
    modal.style.display = 'flex';
    modalImg.src = imageSrc;
    modalImg.alt = imageDesc;
    modalDesc.textContent = imageDesc;
    modalImg.onload = function() {
        const maxWidth = window.innerWidth * 0.7; 
        const maxHeight = window.innerHeight * 0.6; 
        
        const imgWidth = this.naturalWidth;
        const imgHeight = this.naturalHeight;
        
        const widthRatio = maxWidth / imgWidth;
        const heightRatio = maxHeight / imgHeight;
        
        const scale = Math.min(1, widthRatio, heightRatio);
        
        this.style.width = `${imgWidth * scale}px`;
        this.style.height = `${imgHeight * scale}px`;
    };
}

document.querySelector('.modal-close').addEventListener('click', () => {
    document.getElementById('imageModal').style.display = 'none';
});

document.getElementById('imageModal').addEventListener('click', (e) => {
    if (e.target === document.getElementById('imageModal')) {
        document.getElementById('imageModal').style.display = 'none';
    }
});

document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        document.getElementById('imageModal').style.display = 'none';
    }
});

document.querySelectorAll('.project-image').forEach(img => {
    img.addEventListener('load', function() {
        this.classList.add('loaded');
    });
});