<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <!--  cancer -->
    <section class="py-16 md:py-24 w-full bg1">
        <div class="container mx-auto px-4 md:px-6 lg:px-8">
            <div
                class="w-full justify-start items-center xl:gap-12 gap-10 grid lg:grid-cols-2 grid-cols-1"
            >
                <div
                    class="w-full flex-col justify-center lg:items-start items-center gap-10 inline-flex"
                >
                    <div
                        class="w-full flex-col justify-center items-start gap-8 flex"
                    >
                        <div
                            class="flex-col justify-start lg:items-start items-center gap-4 flex"
                        >

                            <div
                                class="w-full flex-col justify-start lg:items-start items-center gap-3 flex"
                            >
                                <h2
                                    v-motion
                                    :initial="{ opacity: 0, y: -30 }"
                                    :visible="{ opacity: 1, y: 0, transition: { delay: 100, duration: 800 } }"
                                    class="text-3xl md:text-5xl font-bold text-blue-dark mb-6 lg:text-start text-center"
                                >
                                A propos de nous
                                </h2>
                                <p
                                    v-motion
                                    :initial="{ opacity: 0, y: 20 }"
                                    :visible="{ opacity: 1, y: 0, transition: { delay: 300, duration: 800 } }"
                                    class="text-lg md:text-xl text-gray-600 mb-8 lg:text-start text-center"
                                >
                                    Le Centre Hospitalier Nganda est un
                                    établissement médical privé de Kinshasa,
                                    en République Démocratique du Congo,
                                    reconnu pour son expertise dans le
                                    diagnostic et le traitement du cancer.
                                    Depuis plus de 30 ans, nous mettons tout
                                    en œuvre pour offrir à nos patients une
                                    prise en charge médicale de qualité,
                                    humaine et personnalisée.
                                </p>
                            </div>
                        </div>
                        <div
                            class="w-full flex-col justify-center items-start gap-6 flex"
                        >
                            <p
                                v-motion
                                :initial="{ opacity: 0, y: 20 }"
                                :visible="{ opacity: 1, y: 0, transition: { delay: 500, duration: 800 } }"
                                class="text-gray-600 mb-4 lg:text-start text-center"
                            >
                                Le Centre Hospitalier Nganda est un
                                établissement médical privé de Kinshasa, en
                                République Démocratique du Congo, reconnu
                                pour son expertise dans le diagnostic et le
                                traitement du cancer. Depuis plus de 30 ans,
                                nous mettons tout en œuvre pour offrir à nos
                                patients une prise en charge médicale de
                                qualité, humaine et personnalisée.
                            </p>
                        </div>
                    </div>
                    <Link
                        v-motion
                        :initial="{ opacity: 0, scale: 0.9 }"
                        :visible="{ opacity: 1, scale: 1, transition: { delay: 700, duration: 600 } }"
                        :href="route('about')"
                        class="sm:w-fit w-full group px-3.5 py-2 bg-blue-light/10 hover:bg-blue-light/20 rounded-lg shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] transition-all duration-700 ease-in-out justify-center items-center flex"
                    >
                        <span
                            class="px-1.5 text-blue-dark text-sm font-medium leading-6 group-hover:-translate-x-0.5 transition-all duration-700 ease-in-out"
                            >A propos de nous
                        </span>
                        <svg
                            class="group-hover:translate-x-0.5 transition-all duration-700 ease-in-out"
                            xmlns="http://www.w3.org/2000/svg"
                            width="18"
                            height="18"
                            viewBox="0 0 18 18"
                            fill="none"
                        >
                            <path
                                d="M6.75265 4.49658L11.2528 8.99677L6.75 13.4996"
                                stroke="#1c338c"
                                stroke-width="1.6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </Link>
                </div>
                <div
                    v-motion
                    :initial="{ opacity: 0, x: 50 }"
                    :visible="{ opacity: 1, x: 0, transition: { delay: 200, duration: 1000 } }"
                    class="w-full lg:justify-start justify-center items-start flex"
                >
                    <div
                        class="sm:w-[564px] w-full sm:h-[646px] h-full sm:bg-blue-light/10 rounded-3xl sm:border border-blue-medium/20 relative"
                    >
                        <img
                            v-motion
                            :initial="{ opacity: 0, scale: 0.9 }"
                            :visible="{ opacity: 1, scale: 1, transition: { delay: 400, duration: 1200 } }"
                            class="sm:mt-5 sm:ml-5 w-full h-full rounded-3xl object-cover"
                            src="/assets/images/IMG_1004.jpg"
                            alt="about Us image"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
