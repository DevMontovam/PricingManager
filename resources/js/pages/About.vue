<template>
    <div class="page-container">
        <Navbar current-page="about" />

        <div class="page-header">
            <h1>About Pricing Manager</h1>
            <p>Understand how pricing is structured and managed across municipalities and districts.</p>
        </div>

        <div class="about-grid">
            <!-- LEFT CARD -->
            <div class="about-card">
                <h2>Overview</h2>

                <p>
                    Pricing Manager is a system built to centralize and simplify the management of pricing rules
                    across municipalities and their respective districts.
                </p>

                <p>
                    It allows administrators to define flexible pricing strategies based on usage duration and location hierarchy.
                </p>
            </div>

            <!-- RIGHT CARD -->
            <div class="about-card highlight">
                <h2>Key Features</h2>

                <ul>
                    <li>Municipality-level pricing management</li>
                    <li>District-specific pricing overrides</li>
                    <li>Duration-based pricing tiers (1h, 2h, 4h, 8h)</li>
                    <li>Default fallback pricing per municipality</li>
                    <li>Scalable pricing structure for large regions</li>
                </ul>
            </div>

            <!-- FULL WIDTH CARD -->
            <div class="about-card full">
                <h2>How it works</h2>

                <p>
                    The system follows a hierarchical pricing logic: district pricing has priority over municipality pricing.
                    If no district rule exists, the system falls back to the municipality default pricing.
                </p>

                <p>
                    This ensures consistency while still allowing granular control when needed.
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import Navbar from '../components/Navbar.vue'
</script>

<style scoped>
.about-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
    margin-top: 2rem;
}

@media (max-width: 900px) {
    .about-grid {
        grid-template-columns: 1fr;
    }
}

.about-card {
    background: #242933;
    border: 1px solid #374151;

    border-radius: 16px;

    padding: 2rem;

    color: #f3f4f6;

    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
}

.about-card h2 {
    margin-top: 0;
    color: white;
    font-size: 1.2rem;
}

.about-card p {
    color: #d1d5db;
    line-height: 1.6;
}

.about-card ul {
    padding-left: 1.2rem;
}

.about-card li {
    margin-bottom: 0.6rem;
    color: #e5e7eb;
}

/* destaque */
.highlight {
    border: 1px solid #2563eb;
    background: linear-gradient(135deg, #1f2937, #1e293b);
}

/* card maior */
.full {
    grid-column: span 2;
}

@media (max-width: 900px) {
    .full {
        grid-column: span 1;
    }
}
</style>