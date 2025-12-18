<script setup lang="ts">
import PageTitle from '../components/PageTitle.vue';


</script>
<template>
    <PageTitle heading="Privacy Policy" tagline="Privacy Policy." :breadcrumb-links="[
        { label: 'Home', href: '/' },
        { label: 'Privacy Policy', disabled: true }
    ]" />
    <section class="policy-section">
        <h1>Privacy Policy</h1>
        <p class="last-updated">Last Updated: 18-12-2025</p>

        <h2>1. Information We Collect</h2>
        <p>We collect information necessary to provide a personalized learning experience:</p>
        <ul>
            <li><strong>Personal Data:</strong> Name, email, and phone number.</li>
            <li><strong>Academic Data:</strong> Mock test scores, progress reports, and subject preferences.</li>
            <li><strong>Technical Data:</strong> IP address and device identifiers to ensure account security.</li>
        </ul>

        <h2>2. How We Use Data</h2>
        <p>We use your data to:</p>
        <ul>
            <li>Manage your subscription and provide access to materials.</li>
            <li>Generate performance analytics and rank leaderboards.</li>
            <li>Send exam alerts and transaction receipts.</li>
            <li>Prevent unauthorized account sharing and piracy.</li>
        </ul>

        <h2>3. Data Security</h2>
        <p>We implement SSL encryption and secure payment gateways (via [e.g., Stripe/Razorpay]) to protect your
            information. We do not store full credit card details on our servers.</p>

        <h2>4. Third-Party Sharing</h2>
        <p>We do not sell your personal data. Data is only shared with trusted service providers (hosting, email,
            payment) necessary to operate the platform, or when required by law.</p>

        <h2>5. Your Rights</h2>
        <p>You have the right to access, correct, or request the deletion of your personal data. To exercise these
            rights, please contact us at the email provided below.</p>

        <h2>6. Contact Information</h2>
        <p>For any legal or privacy concerns, please contact us at:</p>
        <p>
            <strong>Email:</strong> support@apaarsambhavana.com<br>
            <strong>Address:</strong> Nirmal, Bharat Nagar, Nagpur, Maharashtra INDIA
        </p>
    </section>
</template>
<style scoped>
body {
    font-family: sans-serif;
    line-height: 1.6;
    color: #333;
    max-width: 800px;
    margin: 40px auto;
    padding: 0 20px;
}

h1 {
    color: #2c3e50;
    border-bottom: 2px solid #eee;
    padding-bottom: 10px;
}

h2 {
    color: #2980b9;
    margin-top: 30px;
}

h3 {
    color: #34495e;
}

ul {
    margin-bottom: 20px;
}

li {
    margin-bottom: 8px;
}

hr {
    border: 0;
    border-top: 1px solid #eee;
    margin: 40px 0;
}

.last-updated {
    font-style: italic;
    color: #7f8c8d;
    margin-bottom: 30px;
}

.policy-section {
    margin-bottom: 50px;
    padding: 20px;
    border: 1px solid #eee;
    border-radius: 8px;
}
</style>