<script setup>
import { onMounted, onUnmounted } from "vue";
import gsap from "gsap";
import { ScrollToPlugin, ScrollTrigger } from "gsap/all";

// Enregistrer les plugins GSAP
gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

let tween;
let anchors = [];

onMounted(() => {
    const panelsSection = document.querySelector("#panels");
    const panelsContainer = document.querySelector("#panels-container");

    anchors = document.querySelectorAll(".anchor");

    anchors.forEach((anchor) => {
        anchor.addEventListener("click", onAnchorClick);
    });

    const panels = gsap.utils.toArray("#panels-container .panel");
    tween = gsap.to(panels, {
        xPercent: -100 * (panels.length - 1),
        ease: "none",
        scrollTrigger: {
            trigger: "#panels-container",
            pin: true,
            start: "top top",
            scrub: 1,
            snap: {
                snapTo: 1 / (panels.length - 1),
                inertia: false,
                duration: { min: 0.1, max: 0.1 },
            },
            end: () => "+=" + (panelsContainer.offsetWidth - window.innerWidth),
        },
    });

    function onAnchorClick(e) {
        e.preventDefault();
        const targetElem = document.querySelector(
            e.target.getAttribute("href")
        );
        let y = targetElem;
        if (
            targetElem &&
            panelsContainer.isSameNode(targetElem.parentElement)
        ) {
            const totalScroll =
                tween.scrollTrigger.end - tween.scrollTrigger.start;
            const totalMovement = (panels.length - 1) * targetElem.offsetWidth;
            y = Math.round(
                tween.scrollTrigger.start +
                    (targetElem.offsetLeft / totalMovement) * totalScroll
            );
        }
        gsap.to(window, {
            scrollTo: {
                y: y,
                autoKill: false,
            },
            duration: 1,
        });
    }
});

onUnmounted(() => {
    // Nettoyer les écouteurs d'événements
    anchors.forEach((anchor) => {
        anchor.removeEventListener("click", onAnchorClick);
    });

    // Nettoyer les instances de GSAP
    if (tween) {
        tween.scrollTrigger.kill();
        tween.kill();
    }
});
</script>

<template>
    <div id="page" class="site">
        <div id="feather" class="feather"></div>

        <!-- <header id="masthead" class="site-header" role="banner">
      <nav class="anchor-nav" role="navigation">
        <a href="#intro" class="anchor">Home</a>
        <a href="#panel-1" class="anchor">Panel 1</a>
        <a href="#panel-3" class="anchor">Panel 3</a>
        <a href="#panel-5" class="anchor">Panel 5</a>
        <a href="#map" class="anchor">Map</a>
      </nav>
    </header> -->

        <main id="content" class="site-content" role="main">
            <section id="panels">
                <div id="panels-container" style="width: 310%">
                    <section
                        class="h-screen w-full flex bg-secondary panel full-screen"
                    >
                        <div class="md:pt-52 md:px-10 pl-3 text-white">
                            <h1 class="text-xl" v-animate="'backInDown'">
                                Votre santé, Notre priorité
                            </h1>
                            <h1
                                class="text-4xl font-bold lg:text-7xl my-10 uppercase lg:leading-snug"
                                v-animate="'zoomIn'"
                            >
                                Notre expertise médicale à votre service.
                            </h1>
                            <div class="" v-animate="'backInUp'">
                                <p class="text-gray-200">
                                    L'équipe du Centre Hospitalier Nganda
                                    s'engage à vous offrir les meilleurs soins
                                    de santé à Kinshasa.
                                </p>
                                <div class="py-6">
                                    <button
                                        type="button"
                                        class="m-1 h-12 transform rounded-md bg-primary px-6 py-2 text-secondary transition-colors duration-200 focus:bg-secondary focus:outline-none hover:bg-secondary"
                                    >
                                        Contactez-nous
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="w-full h-screen top-0">
                            <img
                                src="/assets/images/BRU_9885.jpg"
                                class="curve"
                                alt=""
                            />
                        </div>
                    </section>
                    <section
                        class="h-screen w-full flex bg-[#ad808c] panel full-screen"
                        id="panel-2"
                    >
                        <div class="md:pt-52 md:px-10 pl-3 text-white">
                            <h1 class="text-xl" v-animate="'backInDown'">
                                Centre Hospitalier Nganda : l'espoir d'une
                                guérison
                            </h1>
                            <h1
                                class="text-4xl font-bold lg:text-7xl my-10 uppercase lg:leading-snug"
                                v-animate="'zoomIn'"
                            >
                                Votre allié dans la lutte contre le cancer
                            </h1>
                            <div class="" v-animate="'backInUp'">
                                <p class="text-gray-200">
                                    Le Centre Hospitalier Nganda est un
                                    établissement médical privé de Kinshasa, en
                                    République Démocratique du Congo, reconnu
                                    pour son expertise dans le diagnostic et le
                                    traitement du cancer. Depuis plus de 30 ans,
                                    nous mettons tout en œuvre pour offrir à nos
                                    patients une prise en charge médicale de
                                    qualité, humaine et personnalisée.
                                </p>
                                <div class="py-6">
                                    <button
                                        type="button"
                                        class="m-1 h-12 transform rounded-md bg-primary px-6 py-2 text-secondary transition-colors duration-200 focus:bg-secondary focus:outline-none hover:bg-secondary"
                                    >
                                        Contactez-nous
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="w-full h-screen top-0">
                            <img
                                src="/assets/images/cancer.jpg"
                                class="curve2"
                                alt=""
                            />
                        </div>
                    </section>

                    <section id="panel-3" class="panel full-screen">
                        <div class="w-full">
                            <div
                                class="relative isolate overflow-hidden bg-gray-900 w-full h-screen"
                            >
                                <img
                                    src="/assets/images/BRU_0013.jpg"
                                    alt=""
                                    class="absolute inset-0 -z-10 h-full w-full object-cover opacity-20"
                                />
                                <div
                                    class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                                    aria-hidden="true"
                                >
                                    <div
                                        class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                                        style="
                                            clip-path: polygon(
                                                74.1% 44.1%,
                                                100% 61.6%,
                                                97.5% 26.9%,
                                                85.5% 0.1%,
                                                80.7% 2%,
                                                72.5% 32.5%,
                                                60.2% 62.4%,
                                                52.4% 68.1%,
                                                47.5% 58.3%,
                                                45.2% 34.5%,
                                                27.5% 76.7%,
                                                0.1% 64.9%,
                                                17.9% 100%,
                                                27.6% 76.8%,
                                                76.1% 97.7%,
                                                74.1% 44.1%
                                            );
                                        "
                                    ></div>
                                </div>
                                <div
                                    class="w-full px-6 lg:px-8"
                                    v-animate="'slideInRight'"
                                >
                                    <div
                                        class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56"
                                    >
                                        <div class="text-center">
                                            <h1
                                                class="text-4xl font-bold tracking-tight text-white sm:text-6xl pt-32 md:pt-40"
                                            >
                                                Prenez soin de votre santé dans
                                                le confort de votre foyer
                                            </h1>
                                            <p
                                                class="mt-6 text-sm text-start text-gray-300"
                                            >
                                                Nganda Home Care est un service
                                                de soins de santé à domicile qui
                                                offre une prise en charge
                                                médicale et paramédicale de
                                                qualité aux patients de tous
                                                âges. Notre équipe d'infirmiers,
                                                d'aides-soignants et de
                                                professionnels de santé
                                                qualifiés est à votre
                                                disposition pour vous prodiguer
                                                les soins dont vous avez besoin,
                                                dans le confort et la sécurité
                                                de votre domicile.
                                            </p>
                                            <div
                                                class="mt-10 flex items-center justify-center gap-x-6"
                                            >
                                                <a
                                                    href="#"
                                                    class="rounded-md bg-primary -500 px-3.5 py-2.5 text-sm font-semibold text-secondary shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400"
                                                    >Contactez-nous</a
                                                >
                                                <a
                                                    href="#"
                                                    class="text-sm font-semibold leading-6 text-white"
                                                    >Savoir plus
                                                    <span aria-hidden="true"
                                                        >→</span
                                                    ></a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                                    aria-hidden="true"
                                >
                                    <div
                                        class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                                        style="
                                            clip-path: polygon(
                                                74.1% 44.1%,
                                                100% 61.6%,
                                                97.5% 26.9%,
                                                85.5% 0.1%,
                                                80.7% 2%,
                                                72.5% 32.5%,
                                                60.2% 62.4%,
                                                52.4% 68.1%,
                                                47.5% 58.3%,
                                                45.2% 34.5%,
                                                27.5% 76.7%,
                                                0.1% 64.9%,
                                                17.9% 100%,
                                                27.6% 76.8%,
                                                76.1% 97.7%,
                                                74.1% 44.1%
                                            );
                                        "
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>

            <!-- <section id="map" class="full-screen gradient-orange"></section> -->
        </main>
    </div>
</template>

<style>
/* Ajoutez vos styles CSS ici */
</style>
