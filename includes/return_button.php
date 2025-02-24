<style>
.return-button {
    position: fixed;
    top: 2rem;
    left: 2rem;
    padding: 0.75rem 1.5rem;
    background: #2C3E50;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    z-index: 1000;
}

.return-button:hover {
    background: #3498DB;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.return-button svg {
    width: 20px;
    height: 20px;
}

@media (max-width: 768px) {
    .return-button {
        top: 1rem;
        left: 1rem;
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
}
</style>

<a href="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>" class="return-button">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="19" y1="12" x2="5" y2="12"></line>
        <polyline points="12 19 5 12 12 5"></polyline>
    </svg>
    Return to Website
</a>