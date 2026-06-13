import { createApp } from 'vue'

import PricingTable from './components/PricingTable.vue'
import About from './pages/About.vue'

const appElement = document.getElementById('app')

const page = appElement.dataset.page

if (page === 'pricing') {
    createApp(PricingTable, {
        pricings: JSON.parse(
            appElement.dataset.pricings
        ),
    }).mount('#app')
}

if (page === 'about') {
    createApp(About)
        .mount('#app')
}