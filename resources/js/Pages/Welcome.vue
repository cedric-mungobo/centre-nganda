<script setup>
import { Head, Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import HeaderSection from "./Sections/HeaderSection.vue";

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

const services1 = [
    {
        title: "Oncologie",
        description:
            "Nous avons soigneusement sélectionné nos équipes d'experts en oncologie, qui s'appuient sur les dernières avancées scientifiques pour fournir des soins personnalisés et de haute qualité aux patients atteints de cancer.",
    },
    {
        title: "Radiothérapie",
        description:
            "Nous sommes fiers de posséder le meilleur centre de radiothérapie à Kinshasa, offrant des traitements efficaces des tumeurs grâce à des rayonnements ciblés pour détruire les cellules cancéreuses. Notre service utilise des techniques de pointe et fournit un soutien émotionnel complet pour accompagner les patients et leurs familles tout au long de leur parcours de guérison.",
    },
    {
        title: "Urgences",
        description:
            "Notre service des urgences, disponible 24/7, garantit une prise en charge rapide et efficace des situations critiques grâce à une équipe qualifiée et des infrastructures modernes.",
    },
];

const services2 = [
    {
        title: "Pédiatrie",
        description:
            "Notre service de pédiatrie se concentre sur l'étude du développement neuro-sensori-moteur et physiologique normal de l'enfant, ainsi que sur le diagnostic et le traitement des pathologies infantiles, allant de la naissance à la période postpubertaire.",
    },
    {
        title: "Médecine interne",
        description:
            "Nous adoptons une approche holistique pour évaluer l'état de santé du patient, en mettant particulièrement l'accent sur les maladies systémiques et les affections auto-immunes.",
    },
    {
        title: "Chirurgie",
        description:
            "Notre équipe chirurgicale prend en charge les patients tout au long de leur parcours, y compris les soins préopératoires et postopératoires, pour garantir une récupération optimale.",
    },
];
</script>

<template>
    <GuestLayout>
        <!-- // header section -->

        <!-- <HeaderSection /> -->

        <!--  home hero -->
        <section class="w-full h-[100vh] flex bg-secondary">
            <div class="md:pt-52 pt-24 md:px-10 pl-3 text-white">
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
                        L'équipe du Centre Hospitalier Nganda s'engage à vous
                        offrir les meilleurs soins de santé à Kinshasa.
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
                    class="curve object-cover object-center"
                    alt=""
                />
            </div>
        </section>

        <!--  nos service -->
        <section class="ezy__service13 light py-5 md:py-8 bg2 text-zinc-900">
            <div class="container px-4 mx-auto">
                <div class="flex items-center justify-center mb-2 sm:mb-">
                    <div
                        class="w-full max-w-xl text-center"
                        v-animate="'zoomIn'"
                    >
                        <h2
                            class="text-3xl leading-none md:text-[45px] font-bold mb-4"
                        >
                            Nos services
                        </h2>
                        <p class="text-lg opacity-80 mb-6">
                            Nous accordons la plus haute importance à fournir
                            des soins et des services médicaux de haute qualité
                            à nos patients
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6 lg:gap-12 pt-2">
                    <div class="col-span-3 lg:col-span-1 lg:order-2">
                        <div
                            class="bg-center bg-no-repeat bg-cover rounded-2xl h-full min-h-[200px]"
                            style="
                                background-image: url(/assets/images/BRU_9885.jpg);
                            "
                        ></div>
                    </div>
                    <div class="col-span-3 lg:col-span-1 ezy__service13-list">
                        <div class="lg:my-5">
                            <div
                                class="flex mt-12 lg:text-end"
                                v-for="item in services1"
                                :key="item.title"
                                v-animate="'zoomIn'"
                            >
                                <div class="mr-4 lg:mr-0 lg:ml-4 lg:order-2">
                                    <span
                                        class="bg-red-500 text-white w-16 h-16 rounded-full text-3xl inline-flex justify-center items-center mb-6"
                                        ><i class="fas fa-cannabis"></i
                                    ></span>
                                </div>
                                <div>
                                    <h4 class="text-2xl font-medium mb-4">
                                        {{ item.title }}
                                    </h4>
                                    <p class="opacity-80">
                                        {{ item.description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-span-3 lg:col-span-1 ezy__service13-list lg:order-3"
                    >
                        <div class="lg:my-5">
                            <div
                                class="flex mt-12 lg:text-end"
                                v-for="item in services2"
                                :key="item.title"
                                v-animate="'zoomIn'"
                            >
                                <div class="mr-4 lg:mr-0 lg:ml-4 lg:order-2">
                                    <span
                                        class="bg-red-500 text-white w-16 h-16 rounded-full text-3xl inline-flex justify-center items-center mb-6"
                                        ><i class="fas fa-cannabis"></i
                                    ></span>
                                </div>
                                <div>
                                    <h4 class="text-2xl font-medium mb-4">
                                        {{ item.title }}
                                    </h4>
                                    <p class="opacity-80">
                                        {{ item.description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <button
                    class="bg-secondary text-xl text-white py-1 px-4 rounded"
                >
                    voir tous les services
                </button>
            </div>
        </section>

        <!--  cancer -->

        <section class="py-24 w-full xl:mr-0 lg:mr-5 mr-0 bg1">
            <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
                <div
                    class="w-full justify-start items-center xl:gap-12 gap-10 grid lg:grid-cols-2 grid-cols-1"
                >
                    <div
                        v-animate="'backInLeft'"
                        class="w-full flex-col justify-center lg:items-start items-center gap-10 inline-flex"
                    >
                        <div
                            class="w-full flex-col justify-center items-start gap-8 flex"
                        >
                            <div
                                class="flex-col justify-start lg:items-start items-center gap-4 flex"
                            >
                                <h6
                                    class="text-gray-400 text-base font-normal leading-relaxed"
                                >
                                    Centre Hospitalier Nganda : l'espoir d'une
                                    guérison
                                </h6>
                                <div
                                    class="w-full flex-col justify-start lg:items-start items-center gap-3 flex"
                                >
                                    <h2
                                        class="text-indigo-700 text-4xl font-bold font-manrope leading-normal lg:text-start text-center"
                                    >
                                        Votre allié dans la lutte contre le
                                        cancer
                                    </h2>
                                    <p
                                        class="text-gray-500 text-base font-normal leading-relaxed lg:text-start text-center"
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
                                    class="text-gray-500 text-base font-normal leading-relaxed lg:text-start text-center"
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
                        <button
                            class="sm:w-fit w-full group px-3.5 py-2 bg-indigo-50 hover:bg-indigo-100 rounded-lg shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] transition-all duration-700 ease-in-out justify-center items-center flex"
                        >
                            <span
                                class="px-1.5 text-indigo-600 text-sm font-medium leading-6 group-hover:-translate-x-0.5 transition-all duration-700 ease-in-out"
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
                                    stroke="#4F46E5"
                                    stroke-width="1.6"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </button>
                    </div>
                    <div
                        v-animate="'backInRight'"
                        class="w-full lg:justify-start justify-center items-start flex"
                    >
                        <div
                            class="sm:w-[564px] w-full sm:h-[646px] h-full sm:bg-gray-100 rounded-3xl sm:border border-gray-200 relative"
                        >
                            <img
                                class="sm:mt-5 sm:ml-5 w-full h-full rounded-3xl object-cover"
                                src="/assets/images/IMG_1004.jpg"
                                alt="about Us image"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="lg:py-20 py-5 lg:pl-8 h-full">
            <div
                class="rounded-2xl bg-indigo-50 py-10 overflow-hidden sm:pl-5 m-5 lg:m-0 2xl:py-16 xl:py-8 lg:rounded-tl-2xl lg:rounded-bl-2xl"
            >
                <div class="mx-auto max-w-7xl pl-4 sm:px-0 lg:px-0">
                    <div
                        class="grid grid-cols-1 gap-14 items-center lg:grid-cols-12 lg:gap32"
                    >
                        <div
                            v-animate="'zoomIn'"
                            class="w-full xl:col-span-5 lg:col-span-6 2xl:-mx-5 xl:-mx-0 pr-4"
                        >
                            <div
                                class="flex items-center text-sm font-medium text-gray-500 justify-center lg:justify-start"
                            >
                                <span
                                    class="bg-indigo-600 py-1 px-3 rounded-2xl text-xs font-medium text-white mr-3"
                                    >#CHN</span
                                >
                                centre hospitaliere nganda
                            </div>
                            <h1
                                class="py-8 text-center uppercase text-gray-900 font-bold font-manrope md:text-3xl text-xl lg:text-left leading-[40px]"
                            >
                                Nous Offrons des Soins <br />
                                <span class="text-indigo-600"
                                    >de Qualité Pour Tous</span
                                >
                            </h1>
                            <p
                                class="text-gray-500 text-lg text-center lg:text-left"
                            >
                                Nous offrons des soins primaires quand vous en
                                avez besoin. Recevez des soins personnalisés et
                                de haute qualité en consultant les meilleurs
                                médecins.
                            </p>

                            <div
                                class="grid grid-cols-1 md:grid-cols-3 py-5 gap-2"
                            >
                                <!--  personnele  -->
                                <div
                                    class="flex items-center font-semibold justify-center border border-solid border-indigo-500 flex-col lg:flex-row bg-white p-2 rounded-xl"
                                >
                                    <h1>Personnels</h1>
                                </div>
                                <div
                                    class="flex items-center font-semibold justify-center border border-solid border-indigo-500 flex-col lg:flex-row bg-white p-2 rounded-xl"
                                >
                                    <h1>Familles</h1>
                                </div>
                                <div
                                    class="flex items-center font-semibold justify-center border border-solid border-indigo-500 flex-col lg:flex-row bg-white p-2 rounded-xl"
                                >
                                    <h1>Entreprises</h1>
                                </div>
                            </div>

                            <!-- <div class="flex items-center flex-col lg:flex-row">
                                <div class="flex items-center">
                                    <img
                                        src="https://pagedone.io/asset/uploads/1694846673.png"
                                        alt="Rounded image "
                                        class="border-2 border-solid border-indigo-50 rounded-full relative z-50 object-cover"
                                    />
                                    <img
                                        src="https://pagedone.io/asset/uploads/1694846691.png"
                                        alt="Rounded image"
                                        class="border-2 border-solid border-indigo-50 rounded-full relative z-30 -ml-3 object-cover"
                                    />
                                    <img
                                        src="https://pagedone.io/asset/uploads/1694846704.png"
                                        alt="Rounded image"
                                        class="border-2 border-solid border-indigo-50 rounded-full relative z-20 -ml-3 object-cover"
                                    />
                                </div>
                                <span
                                    class="mt-3 text-base text-gray-600 font-medium lg:ml-3"
                                    >People have joined</span
                                >
                            </div> -->
                        </div>
                        <div class="w-full xl:col-span-7 lg:col-span-6 block">
                            <div
                                class="w-full sm:w-auto lg:w-[60.8125rem] xl:ml-16"
                            >
                                <img
                                    src="/assets/images/IMG_5881.jpg"
                                    alt="Dashboard image"
                                    class="rounded-l-3xl object-cover w-full lg:h-auto"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--  cta  extended  -->

        <section
            class="bg3 light py-14 md:py-24 mb-4 bg-white dark:bg-[#0b1727] text-zinc-900 dark:text-white relative overflow-hidden z-10"
        >
            <div class="container px-4 mx-auto">
                <div class="grid grid-cols-12">
                    <!--  heading-->
                    <div class="col-span-12 md:col-span-8">
                        <div class="mb-12">
                            <h1
                                class="text-2xl font-bold leading-tight md:text-[35px] mb-4"
                            >
                                Excellence en Radiothérapie à Kinshasa
                            </h1>
                            <p class="text-lg opacity-80 leading-7">
                                Le Centre Hospitalier Nganda offre des soins de
                                radiothérapie de pointe, alliant technologie
                                avancée et suivi personnalisé.
                            </p>
                        </div>
                    </div>
                    <!-- img -->
                    <div
                        v-animate="'zoomIn'"
                        class="col-span-12 lg:col-span-6 text-center lg:order-2"
                    >
                        <div
                            class="bg-center bg-no-repeat bg-cover rounded-xl h-full min-h-[400px] lg:min-h-[550px]"
                            style="
                                background-image: url(assets/images/IMG_5912.jpg);
                            "
                        ></div>
                    </div>
                    <!-- cards -->
                    <div
                        v-animate="'zoomIn'"
                        class="col-span-12 lg:col-span-6 flex flex-col justify-center xl:mr-20"
                    >
                        <!-- card starts -->
                        <div class="flex justify-center p-6">
                            <div
                                class="bg-blue-600 text-white min-w-[60px] h-12 rounded-xl text-lg flex justify-center items-center mb-6"
                            >
                                <i class="fa-solid fa-radiation"></i>
                            </div>
                            <div class="p-4">
                                <h5 class="text-xl font-bold mb-4">
                                    Technologie avancée
                                </h5>
                                <p class="text-base font-light leading-snug">
                                    Des équipements modernes pour des
                                    traitements précis et efficaces.
                                </p>
                            </div>
                        </div>
                        <!-- card ends -->
                        <!-- card starts -->
                        <div class="flex items-center justify-center p-6">
                            <div
                                class="bg-blue-600 text-white min-w-[60px] h-12 rounded-xl text-lg flex justify-center items-center mb-6"
                            >
                                <i class="fa-solid fa-user-md"></i>
                            </div>
                            <div class="p-4">
                                <h5 class="text-xl font-bold mb-4">
                                    Soins personnalisés
                                </h5>
                                <p class="text-base font-light leading-snug">
                                    Un suivi individualisé pour chaque patient,
                                    adapté à ses besoins spécifiques.
                                </p>
                            </div>
                        </div>
                        <!-- card ends -->
                        <!-- card starts -->
                        <div class="flex justify-center p-6">
                            <div
                                class="bg-blue-600 text-white min-w-[60px] h-12 rounded-xl text-lg flex justify-center items-center mb-6"
                            >
                                <i class="fa-solid fa-bone"></i>
                            </div>
                            <div class="p-4">
                                <h5 class="text-xl font-bold mb-4">
                                    Confort et accompagnement
                                </h5>
                                <p class="text-base font-light leading-snug">
                                    Un accompagnement attentif à chaque étape,
                                    pour un traitement en toute sérénité.
                                </p>
                            </div>
                        </div>
                        <!-- card ends -->
                    </div>
                </div>
            </div>
        </section>

        <section
            class="ezy__featured28 light py-14 md:py-24 bg-white dark:bg-[#0b1727] text-zinc-900 dark:text-white relative overflow-hidden"
        >
            <div
                class="rounded-tl-[40px] rounded-bl-[40px] absolute left-[55%] bottom-0 top-0 w-[50vw] bg-indigo-50 hidden lg:block"
            ></div>
            <div class="container px-4 mx-auto relative">
                <div
                    class="flex flex-col md:flex-row gap-6 md:gap-12 items-center justify-between"
                >
                    <div
                        v-animate="'backInLeft'"
                        class="w-full md:w-1/2 xl:pr-12 text-center lg:text-start my-12"
                    >
                        <h2 class="text-xl md:text-[25px] font-bold mb-6">
                            Nganda Home Care Service de Soins à Domicile à
                            Kinshasa
                        </h2>
                        <p
                            class="text-sm md:text-[16px] leading-normal opacity-80"
                        >
                            nous vous offrons des services de soins à domicile
                            professionnels et sur mesure à Kinshasa. Notre
                            équipe qualifiée veille au bien-être de vos proches
                            en leur fournissant des soins personnalisés, tout en
                            leur permettant de rester dans le confort et la
                            sécurité de leur propre maison.
                        </p>
                        <!-- <div class="mt-12">
                            <a
                                href=""
                                class="bg-blue-600 hover:bg-opacity-90 text-white border border-blue-600 rounded transition py-4 px-8 font-normal mb-6 sm:mb-0"
                                >Explore more
                                <i class="fas fa-arrow-right ml-1"></i
                            ></a>
                        </div> -->
                    </div>
                    <div v-animate="'backInRight'" class="w-full md:w-1/2">
                        <img
                            src="/assets/images/BRU_0013.jpg"
                            alt=""
                            class="mx-auto rounded-md shadow-md"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section>
            <!-- Features -->
            <div
                class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto"
            >
                <!-- Grid -->
                <div
                    class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32"
                >
                    <div
                        class="w-full lg:justify-start justify-center items-start flex"
                        v-animate="'backInLeft'"
                    >
                        <div
                            class="sm:w-[564px] w-full sm:h-[646px] h-full sm:bg-primary rounded-3xl sm:border border-secondary relative"
                        >
                            <img
                                class="sm:mt-10 sm:ml-10 w-full h-full object-cover rounded-custom"
                                src="/assets/images/BRU_9978.jpg"
                                alt="about Us image"
                            />
                        </div>
                    </div>

                    <!-- End Col -->

                    <div
                        class="mt-5 sm:mt-10 lg:mt-0"
                        v-animate="'backInRight'"
                    >
                        <div class="space-y-6 sm:space-y-8">
                            <!-- Title -->
                            <div class="space-y-2 md:space-y-4">
                                <h2
                                    class="font-bold text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200"
                                >
                                    Nous avons les meilleurs Médecins de la
                                    ville de Kinshasa
                                </h2>
                                <p class="text-gray-500 dark:text-neutral-500">
                                    Nos médecins sont parmi les meilleurs
                                    disponibles dans la ville. Pour des soins
                                    d'urgence, des consultations avec des
                                    experts, et des services dans un centre
                                    moderne, nous sommes à votre disposition 24
                                    heures sur 24, 7 jours sur 7.
                                </p>
                            </div>
                            <!-- End Title -->

                            <!-- List -->
                            <ul class="space-y-2 sm:space-y-4">
                                <li class="flex space-x-3">
                                    <span
                                        class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500"
                                    >
                                        <svg
                                            class="flex-shrink-0 size-3.5"
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
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </span>

                                    <span
                                        class="text-sm sm:text-base text-gray-500 font-semibold"
                                    >
                                        Cas d'Urgence
                                    </span>
                                </li>

                                <li class="flex space-x-3">
                                    <span
                                        class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500"
                                    >
                                        <svg
                                            class="flex-shrink-0 size-3.5"
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
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </span>

                                    <span
                                        class="text-sm sm:text-base text-gray-500 font-semibold"
                                    >
                                        Médecins Experts
                                    </span>
                                </li>
                                <li class="flex space-x-3">
                                    <span
                                        class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500"
                                    >
                                        <svg
                                            class="flex-shrink-0 size-3.5"
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
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </span>

                                    <span
                                        class="text-sm sm:text-base text-gray-500 font-semibold"
                                    >
                                        Centre Moderne
                                    </span>
                                </li>
                                <li class="flex space-x-3">
                                    <span
                                        class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500"
                                    >
                                        <svg
                                            class="flex-shrink-0 size-3.5"
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
                                            <polyline points="20 6 9 17 4 12" />
                                        </svg>
                                    </span>

                                    <span
                                        class="text-sm sm:text-base text-gray-500 font-semibold"
                                    >
                                        Centre d'Aide 24/7
                                    </span>
                                </li>
                            </ul>
                            <!-- End List -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Grid -->
            </div>
            <!-- End Features -->
        </section>

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
                    <!-- <a
                        class="group"
                        href="#"
                        v-animate="'zoomIn'"
                        v-for="(item, index) in 2"
                        :key="index"
                    >
                        <div
                            class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden"
                        >
                            <img
                                class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl"
                                src="https://images.unsplash.com/photo-1586232702178-f044c5f4d4b7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1035&q=80"
                                alt="Image Description"
                            />
                        </div>

                        <div class="mt-7">
                            <h3
                                class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white"
                            >
                                Studio by Preline
                            </h3>
                            <p class="mt-3 text-gray-800 dark:text-neutral-200">
                                Produce professional, reliable streams easily
                                leveraging Preline's innovative broadcast studio
                            </p>
                            <p
                                class="mt-5 inline-flex items-center gap-x-1 text-blue-600 decoration-2 group-hover:underline font-medium"
                            >
                                Lire la suite
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
                            </p>
                        </div>
                    </a> -->
                    <!-- End Card -->

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
