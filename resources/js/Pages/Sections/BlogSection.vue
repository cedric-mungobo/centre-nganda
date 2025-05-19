<script setup>
// Pas de props nécessaires pour ce composant
</script>

<template>
    <section class="px-5">
        <!--  blog -->

        <!-- Card Blog -->
        <div
            class="max-w-screen-xl px-3 py-10 sm:px-6 lg:px-0 lg:py-14 mx-auto"
        >
            <!-- Title -->
            <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                <h2
                    class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white"
                >
                    Blog et Actualités
                </h2>
                <p class="mt-1 text-gray-600">
                    Restez informé et connecté avec nous pour un bien-être
                    optimal.
                </p>
            </div>
            <!-- End Title -->

            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card -->
                <div
                    class="group relative flex flex-col w-full min-h-80 bg-[url('/assets/images/BRU99781.png')] bg-center bg-cover rounded-custom hover:shadow-lg transition"
                >
                    <!-- Overlay ajouté ici -->
                    <div
                        class="absolute inset-0 bg-black bg-opacity-70 rounded-custom"
                    ></div>
                    <div
                        class="absolute inset-0 flex-auto p-4 md:p-6 flex items-center justify-center"
                    >
                        <h3
                            class="text-xl text-white group-hover:text-white"
                        >
                            <span class="font-bold"
                                >Prendre Rendez-vous en Ligne</span
                            >
                            <br />
                            <br />
                            Pour vous faciliter la vie, le Centre
                            Hospitalier Nganda vous propose de prendre
                            rendez-vous en ligne.
                        </h3>
                    </div>
                    <div
                        class="pt-0 p-4 md:p-6 absolute inset-0 flex items-end justify-start"
                    >
                        <div
                            class="inline-flex items-center gap-2 text-sm font-medium bg-secondary px-6 py-2 rounded-custom text-white group-hover:text-white/70"
                        >
                            Prenez Rendez-vous
                            <svg
                                class="flex-shrink-0 size-4"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Card Blog -->
    </section>
</template>
