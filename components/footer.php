<footer class="footer-container">
    <div class="footer-col">
        <h4>Customer Service</h4>
        <ul>
            <li>Help Centre</li>
            <li>How To Buy</li>
            <li>How To Sell</li>
            <li>Payment Methods</li>
        </ul>
    </div>

    <div class="footer-col">
        <h4>About RasaSpot</h4>
        <ul>
            <li>About Us</li>
            <li>RasaSpot Careers</li>
            <li>Policies</li>
            <li>RasaSpot Privacy Policy</li>
        </ul>
    </div>

    <div class="footer-col">
        <h4>Pembayaran</h4>
        <div class="payment-methods-grid">
            <?php foreach ($payments as $payment): ?>
                <img src="<?= e(app_url('assets/image/' . $payment)) ?>" alt="Metode pembayaran">
            <?php endforeach; ?>
        </div>
    </div>

    <div class="footer-col">
        <h4>Follow Us</h4>
        <ul class="social-links">
            <li><i class="fa-brands fa-facebook" aria-hidden="true"></i> Facebook</li>
            <li><i class="fa-brands fa-instagram" aria-hidden="true"></i> Instagram</li>
            <li><i class="fa-brands fa-linkedin" aria-hidden="true"></i> LinkedIn</li>
        </ul>
    </div>
</footer>
