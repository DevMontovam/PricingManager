<template>
    <nav class="navbar">
        <div class="navbar-brand">
            Pricing Manager
        </div>

        <div class="navbar-links">
            <a
                href="/pricing"
                :class="{
                    active: currentPage === 'pricing'
                }"
            >
                Pricing
            </a>

            <a
                href="#"
                @click.prevent="showUnavailable"
            >
                Municipalities
            </a>

            <a
                href="#"
                @click.prevent="showUnavailable"
            >
                Districts
            </a>

            <a
                href="/about"
                :class="{
                    active: currentPage === 'about'
                }"
            >
                About
            </a>
        </div>
    </nav>
</template>

<script setup>
const props = defineProps({
    currentPage: {
        type: String,
        required: true,
    },
})

const showUnavailable = () => {
    alert(
        'This feature is not available yet.'
    )
}
</script>

<style scoped>
.navbar {
    position: sticky;
    top: 0;
    z-index: 1000;

    display: flex;
    justify-content: space-between;
    align-items: center;

    margin-bottom: 2rem;
    padding: 1rem 1.5rem;

    background: #242933;
    border: 1px solid #374151;
    border-radius: 16px;

    box-shadow:
        0 10px 25px rgba(
            0,
            0,
            0,
            0.15
        );
}

.navbar-brand {
    color: white;
    font-size: 1.2rem;
    font-weight: 700;
}

.navbar-links {
    display: flex;
    gap: 1rem;
}

.navbar-links a {
    text-decoration: none;
    color: #d1d5db;
    padding: .6rem 1rem;
    border-radius: 8px;
    transition: all .2s ease;
}

.navbar-links a:hover {
    background: #1f2937;
    color: white;
}

.navbar-links a.active {
    background: #2563eb;
    color: white;
}
</style>