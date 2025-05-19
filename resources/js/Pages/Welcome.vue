<script setup>
import { Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import SeoHead from "@/Components/SeoHead.vue";
import HeaderSection from "./Sections/HeaderSection.vue";
import HeroSection from "./Sections/HeroSection.vue";
import ServicesSection from "./Sections/ServicesSection.vue";
import CancerSection from "./Sections/CancerSection.vue";
import QualitySection from "./Sections/QualitySection.vue";
import RadiotherapySection from "./Sections/RadiotherapySection.vue";
import HomeCareSection from "./Sections/HomeCareSection.vue";
import DoctorsSection from "./Sections/DoctorsSection.vue";
import BlogSection from "./Sections/BlogSection.vue";
import ContactSection from "./Sections/ContactSection.vue";



defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <SeoHead page="home" />
    <GuestLayout>
        <!-- <HeaderSection /> -->
        <HeroSection />
        <ServicesSection />
        <CancerSection />
        <QualitySection />
        <RadiotherapySection />
        <HomeCareSection />
        <DoctorsSection />
        <BlogSection />
        <ContactSection class=" mb-10" />
    </GuestLayout>
</template>

<style>
.bg1 {
    background-image: linear-gradient(
            45deg,
            transparent 0%,
            transparent 55%,
            rgba(64, 64, 64, 0.04) 55%,
            rgba(64, 64, 64, 0.04) 76%,
            transparent 76%,
            transparent 100%
        ),
        linear-gradient(
            135deg,
            transparent 0%,
            transparent 14%,
            rgba(64, 64, 64, 0.04) 14%,
            rgba(64, 64, 64, 0.04) 41%,
            transparent 41%,
            transparent 100%
        ),
        linear-gradient(
            45deg,
            transparent 0%,
            transparent 2%,
            rgba(64, 64, 64, 0.04) 2%,
            rgba(64, 64, 64, 0.04) 18%,
            transparent 18%,
            transparent 100%
        ),
        linear-gradient(
            135deg,
            transparent 0%,
            transparent 61%,
            rgba(64, 64, 64, 0.04) 61%,
            rgba(64, 64, 64, 0.04) 71%,
            transparent 71%,
            transparent 100%
        ),
        linear-gradient(90deg, rgb(255, 255, 255), rgb(255, 255, 255));
}

.bg2 {
    background-image: linear-gradient(
            158deg,
            rgba(84, 84, 84, 0.03) 0%,
            rgba(84, 84, 84, 0.03) 20%,
            rgba(219, 219, 219, 0.03) 20%,
            rgba(219, 219, 219, 0.03) 40%,
            rgba(54, 54, 54, 0.03) 40%,
            rgba(54, 54, 54, 0.03) 60%,
            rgba(99, 99, 99, 0.03) 60%,
            rgba(99, 99, 99, 0.03) 80%,
            rgba(92, 92, 92, 0.03) 80%,
            rgba(92, 92, 92, 0.03) 100%
        ),
        linear-gradient(
            45deg,
            rgba(221, 221, 221, 0.02) 0%,
            rgba(221, 221, 221, 0.02) 14.286%,
            rgba(8, 8, 8, 0.02) 14.286%,
            rgba(8, 8, 8, 0.02) 28.572%,
            rgba(52, 52, 52, 0.02) 28.572%,
            rgba(52, 52, 52, 0.02) 42.858%,
            rgba(234, 234, 234, 0.02) 42.858%,
            rgba(234, 234, 234, 0.02) 57.144%,
            rgba(81, 81, 81, 0.02) 57.144%,
            rgba(81, 81, 81, 0.02) 71.42999999999999%,
            rgba(239, 239, 239, 0.02) 71.43%,
            rgba(239, 239, 239, 0.02) 85.71600000000001%,
            rgba(187, 187, 187, 0.02) 85.716%,
            rgba(187, 187, 187, 0.02) 100.002%
        ),
        linear-gradient(
            109deg,
            rgba(33, 33, 33, 0.03) 0%,
            rgba(33, 33, 33, 0.03) 12.5%,
            rgba(147, 147, 147, 0.03) 12.5%,
            rgba(147, 147, 147, 0.03) 25%,
            rgba(131, 131, 131, 0.03) 25%,
            rgba(131, 131, 131, 0.03) 37.5%,
            rgba(151, 151, 151, 0.03) 37.5%,
            rgba(151, 151, 151, 0.03) 50%,
            rgba(211, 211, 211, 0.03) 50%,
            rgba(211, 211, 211, 0.03) 62.5%,
            rgba(39, 39, 39, 0.03) 62.5%,
            rgba(39, 39, 39, 0.03) 75%,
            rgba(55, 55, 55, 0.03) 75%,
            rgba(55, 55, 55, 0.03) 87.5%,
            rgba(82, 82, 82, 0.03) 87.5%,
            rgba(82, 82, 82, 0.03) 100%
        ),
        linear-gradient(
            348deg,
            rgba(42, 42, 42, 0.02) 0%,
            rgba(42, 42, 42, 0.02) 20%,
            rgba(8, 8, 8, 0.02) 20%,
            rgba(8, 8, 8, 0.02) 40%,
            rgba(242, 242, 242, 0.02) 40%,
            rgba(242, 242, 242, 0.02) 60%,
            rgba(42, 42, 42, 0.02) 60%,
            rgba(42, 42, 42, 0.02) 80%,
            rgba(80, 80, 80, 0.02) 80%,
            rgba(80, 80, 80, 0.02) 100%
        ),
        linear-gradient(
            120deg,
            rgba(106, 106, 106, 0.03) 0%,
            rgba(106, 106, 106, 0.03) 14.286%,
            rgba(67, 67, 67, 0.03) 14.286%,
            rgba(67, 67, 67, 0.03) 28.572%,
            rgba(134, 134, 134, 0.03) 28.572%,
            rgba(134, 134, 134, 0.03) 42.858%,
            rgba(19, 19, 19, 0.03) 42.858%,
            rgba(19, 19, 19, 0.03) 57.144%,
            rgba(101, 101, 101, 0.03) 57.144%,
            rgba(101, 101, 101, 0.03) 71.42999999999999%,
            rgba(205, 205, 205, 0.03) 71.43%,
            rgba(205, 205, 205, 0.03) 85.71600000000001%,
            rgba(53, 53, 53, 0.03) 85.716%,
            rgba(53, 53, 53, 0.03) 100.002%
        ),
        linear-gradient(
            45deg,
            rgba(214, 214, 214, 0.03) 0%,
            rgba(214, 214, 214, 0.03) 16.667%,
            rgba(255, 255, 255, 0.03) 16.667%,
            rgba(255, 255, 255, 0.03) 33.334%,
            rgba(250, 250, 250, 0.03) 33.334%,
            rgba(250, 250, 250, 0.03) 50.001000000000005%,
            rgba(231, 231, 231, 0.03) 50.001%,
            rgba(231, 231, 231, 0.03) 66.668%,
            rgba(241, 241, 241, 0.03) 66.668%,
            rgba(241, 241, 241, 0.03) 83.33500000000001%,
            rgba(31, 31, 31, 0.03) 83.335%,
            rgba(31, 31, 31, 0.03) 100.002%
        ),
        linear-gradient(
            59deg,
            rgba(224, 224, 224, 0.03) 0%,
            rgba(224, 224, 224, 0.03) 12.5%,
            rgba(97, 97, 97, 0.03) 12.5%,
            rgba(97, 97, 97, 0.03) 25%,
            rgba(143, 143, 143, 0.03) 25%,
            rgba(143, 143, 143, 0.03) 37.5%,
            rgba(110, 110, 110, 0.03) 37.5%,
            rgba(110, 110, 110, 0.03) 50%,
            rgba(34, 34, 34, 0.03) 50%,
            rgba(34, 34, 34, 0.03) 62.5%,
            rgba(155, 155, 155, 0.03) 62.5%,
            rgba(155, 155, 155, 0.03) 75%,
            rgba(249, 249, 249, 0.03) 75%,
            rgba(249, 249, 249, 0.03) 87.5%,
            rgba(179, 179, 179, 0.03) 87.5%,
            rgba(179, 179, 179, 0.03) 100%
        ),
        linear-gradient(
            241deg,
            rgba(58, 58, 58, 0.02) 0%,
            rgba(58, 58, 58, 0.02) 25%,
            rgba(124, 124, 124, 0.02) 25%,
            rgba(124, 124, 124, 0.02) 50%,
            rgba(254, 254, 254, 0.02) 50%,
            rgba(254, 254, 254, 0.02) 75%,
            rgba(52, 52, 52, 0.02) 75%,
            rgba(52, 52, 52, 0.02) 100%
        ),
        linear-gradient(90deg, #ffffff, #ffffff);
}

.bg3 {
    background-image: radial-gradient(
            circle at center center,
            rgba(217, 217, 217, 0.05) 0%,
            rgba(217, 217, 217, 0.05) 15%,
            rgba(197, 197, 197, 0.05) 15%,
            rgba(197, 197, 197, 0.05) 34%,
            rgba(178, 178, 178, 0.05) 34%,
            rgba(178, 178, 178, 0.05) 51%,
            rgba(237, 237, 237, 0.05) 51%,
            rgba(237, 237, 237, 0.05) 75%,
            rgba(138, 138, 138, 0.05) 75%,
            rgba(138, 138, 138, 0.05) 89%,
            rgba(158, 158, 158, 0.05) 89%,
            rgba(158, 158, 158, 0.05) 100%
        ),
        radial-gradient(
            circle at center center,
            rgb(255, 255, 255) 0%,
            rgb(255, 255, 255) 6%,
            rgb(255, 255, 255) 6%,
            rgb(255, 255, 255) 12%,
            rgb(255, 255, 255) 12%,
            rgb(255, 255, 255) 31%,
            rgb(255, 255, 255) 31%,
            rgb(255, 255, 255) 92%,
            rgb(255, 255, 255) 92%,
            rgb(255, 255, 255) 97%,
            rgb(255, 255, 255) 97%,
            rgb(255, 255, 255) 100%
        );
    background-size: 42px 42px;
}
</style>
