<script setup lang="ts">
import PageTitle from '../components/PageTitle.vue';


</script>
<template>
    <PageTitle heading="Term of Service" tagline="Term of Service." :breadcrumb-links="[
        { label: 'Home', href: '/' },
        { label: 'Term of Service', disabled: true }
    ]" />
    <section class="policy-section">
        <h1>Terms of Service</h1>
        <p class="last-updated">Last Updated: 18-12-2025</p>

        <p>By registering for an account or purchasing study materials from <strong>ApaarSambhavana</strong> ("The
            Competition Booster"), you agree to be bound by these Terms of Service.</p>

        <h2>1. No Guarantee of Results</h2>
        <p>The Platform provides mock tests and study materials designed to assist in exam preparation. However, we
            <strong>do not guarantee</strong> success, specific scores, or qualification in any official examination.
            Your performance is dependent on individual effort and external factors beyond our control.
        </p>

        <h2>2. Intellectual Property Rights</h2>
        <p>All content, including but not limited to question banks, video lectures, and PDF notes, is the exclusive
            property of ApaarSambhavana.</p>
        <ul>
            <li><strong>License:</strong> You are granted a personal, non-exclusive, non-transferable license for study
                purposes only.</li>
            <li><strong>Prohibitions:</strong> You may not copy, record, distribute, or resell any materials. Sharing
                login credentials is strictly prohibited.</li>
        </ul>

        <h2>3. User Accounts</h2>
        <p>You are responsible for maintaining the confidentiality of your account. We reserve the right to limit the
            number of devices used to access a single account to prevent unauthorized sharing. Violation of these terms
            will result in immediate termination without a refund.</p>

        <h2>4. Payments and Refunds</h2>
        <p>All fees are payable in advance. Due to the digital nature of our content, [Insert Refund Policy, e.g., "all
            sales are final" OR "refunds are only issued within 24 hours of purchase"].</p>

        <h2>5. Limitation of Liability</h2>
        <p>The Service is provided on an "as is" basis. ApaarSambhavana shall not be liable for any indirect damages
            or loss of career opportunities resulting from the use or inability to use our platform.</p>

        <h2>6. Governing Law</h2>
        <p>These terms are governed by the laws of Maharashtra/India. Any disputes shall be subject to the exclusive
            jurisdiction of the courts in Nagpur.</p>
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