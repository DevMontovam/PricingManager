<template>
    <div class="pricing-container">
        <Navbar currentPage="pricing" />
        <div class="page-header">
            <h1>District Pricing Management</h1>

            <p>
                Configure municipality and district pricing by duration.
            </p>
        </div>
        <div class="cards">
            <div
                v-for="municipality in groupedMunicipalities"
                :key="municipality.id"
                class="card"
            >
                <h2>{{ municipality.name }}</h2>

                <div class="selector">
                    <label>District</label>

                    <select
                        v-model="selectedPricing[municipality.id]"
                    >
                        <option
                            :value="getDefaultPricing(municipality)?.id"
                        >
                            Default
                        </option>

                        <option
                            v-for="pricing in municipality.pricings.filter(
                                pricing => pricing.district
                            )"
                            :key="pricing.id"
                            :value="pricing.id"
                        >
                            {{ pricing.district.name }}
                        </option>
                    </select>
                </div>

                <table
                    v-if="getCurrentPricing(municipality)"
                >
                    <thead>
                        <tr>
                            <th>Hours</th>
                            <th>Value</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr
                            v-for="time in getCurrentPricing(municipality).times"
                            :key="time.id"
                        >
                            <td class="hours-cell">
                                {{ time.hours }}h
                            </td>

                            <td>
                                <div class="value-container">
                                    <input
                                        v-model="time.value"
                                        type="number"
                                        step="0.01"
                                    />

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="actions">
                    <button
                        @click="updatePricing(
                            getCurrentPricing(municipality)
                        )"
                    >
                        Save Pricing
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Navbar from './Navbar.vue'
import { computed, ref, watchEffect } from 'vue'
import axios from 'axios'

const props = defineProps({
    pricings: {
        type: Array,
        required: true,
    },
})

const selectedPricing = ref({})

const groupedMunicipalities = computed(() => {
    const municipalities = {}

    props.pricings.forEach((pricing) => {
        const municipalityId = pricing.municipality.id

        if (!municipalities[municipalityId]) {
            municipalities[municipalityId] = {
                id: municipalityId,
                name: pricing.municipality.name,
                pricings: [],
            }
        }

        municipalities[municipalityId].pricings.push(pricing)
    })

    return Object.values(municipalities)
})

const getDefaultPricing = (municipality) => {
    return municipality.pricings.find(
        pricing => !pricing.district
    )
}

const getCurrentPricing = (municipality) => {
    const selectedId =
        selectedPricing.value[municipality.id]

    return municipality.pricings.find(
        pricing => pricing.id === selectedId
    )
}

watchEffect(() => {
    groupedMunicipalities.value.forEach(
        (municipality) => {
            if (
                !selectedPricing.value[
                    municipality.id
                ]
            ) {
                selectedPricing.value[
                    municipality.id
                ] = getDefaultPricing(
                    municipality
                )?.id
            }
        }
    )
})

const updatePricing = async (pricing) => {
    try {

        await axios.put(
            `/pricing/${pricing.id}`,
            {
                times: pricing.times,
            }
        )

        alert('Saved!')
    }
    catch (error) {
        console.error(error)
    }
}
</script>

<style scoped>

</style>