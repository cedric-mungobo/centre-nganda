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
    <Head>
        <!-- Meta Tags -->
        <meta charset="UTF-8" />
        <meta
            name="description"
            content="Le Centre Nganda est un établissement médical spécialisé dans les soins contre le cancer, la radiothérapie, la pédiatrie, la médecine interne et bien d'autres services à Kinshasa."
        />
        <meta
            name="keywords"
            content="Centre Nganda, Kinshasa, radiothérapie, oncologie, soins médicaux, traitement du cancer, pédiatrie, chirurgie, médecine interne"
        />
        <meta name="author" content="Centre Nganda" />

        <!-- Open Graph Meta Tags -->
        <meta
            property="og:title"
            content="Centre Nganda - Spécialistes en Radiothérapie et Soins Médicaux à Kinshasa"
        />
        <meta
            property="og:description"
            content="Découvrez les services de santé spécialisés du Centre Nganda, notamment la radiothérapie, oncologie, pédiatrie, chirurgie et plus encore à Kinshasa."
        />
        <meta property="og:image" content="URL_DE_L'IMAGE_ACCUEIL.jpg" />
        <meta property="og:url" content="URL_DE_LA_PAGE_ACCUEIL" />
        <meta property="og:type" content="website" />

        <!-- Title -->
        <title>
            Centre Nganda - Radiothérapie et Soins Médicaux à Kinshasa
        </title>
    </Head>
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
                <img src="/assets/images/BRU_9885.jpg" class="curve" alt="" />
            </div>
        </section>

        <!--  nos service -->
        <section
            class="ezy__service13 light py-5 md:py-8 bg-white text-zinc-900"
        >
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

        <section class="w-full flex h-[100vh] bg-[#ad808c]">
            <div
                class="md:pt-52 pt-6 max-w-60 md:max-w-full md:px-10 px-1 pl-3 text-white"
            >
                <h1 class="text-xl" v-animate="'backInDown'">
                    Centre Hospitalier Nganda : l'espoir d'une guérison
                </h1>
                <h1
                    class="text-4xl font-bold lg:text-7xl my-10 uppercase lg:leading-snug"
                    v-animate="'zoomIn'"
                >
                    Votre allié dans la lutte contre le cancer
                </h1>
                <div class="" v-animate="'backInUp'">
                    <p class="text-gray-200">
                        Le Centre Hospitalier Nganda est un établissement
                        médical privé de Kinshasa, en République Démocratique du
                        Congo, reconnu pour son expertise dans le diagnostic et
                        le traitement du cancer. Depuis plus de 30 ans, nous
                        mettons tout en œuvre pour offrir à nos patients une
                        prise en charge médicale de qualité, humaine et
                        personnalisée.
                    </p>
                    <div class="py-6">
                        <button
                            type="button"
                            class="m-1 h-12 transform rounded-md bg-primary px-6 py-2 text-secondary hover:bg-slate-200 transition-colors duration-200 focus:outline-none"
                        >
                            Contactez-nous
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full h-screen top-0">
                <img src="/assets/images/cancer.jpg" class="curve2" alt="" />
            </div>
        </section>

        <section class="lg:py-20 py-5 lg:pl-8 h-full">
            <div
                class="rounded-2xl bg-indigo-50 py-10 overflow-hidden m-5 lg:m-0 2xl:py-16 xl:py-8 lg:rounded-tl-2xl lg:rounded-bl-2xl"
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

        <!-- <section>
            <div
                class="mx-auto mt-20 px-4 sm:max-w-xl md:max-w-full md:px-10 lg:max-w-screen-xl lg:px-8 lg:h-screen"
            >
                <div
                    class="flex flex-col items-center justify-between lg:flex-row"
                >
                    <div class="lg:max-w-lg lg:pr-5">
                        <div
                            class="max-w-screen-xl py-16"
                            v-animate="'backInLeft'"
                        >
                            <h2
                                class="mb-6 max-w-xl text-3xl leading-snug tracking-tight text-blue-600 sm:text-5xl sm:leading-snug"
                            >
                                <span
                                    class="my-1 inline-block font-serif font-bold text-blue-600"
                                    >Nous Offrons des Soins
                                </span>
                                de Qualité Pour Tous
                            </h2>
                            <p class="text-base text-gray-700">
                                Nous offrons des soins primaires quand vous en
                                avez besoin. Recevez des soins personnalisés et
                                de haute qualité en consultant les meilleurs
                                médecins.
                            </p>
                            <div
                                class="mt-8 sm:flex space-y-3 sm:space-y-0 sm:space-x-3"
                            >
                                <div
                                    class="flex rounded-xl border-2 border-blue-600 bg-white shadow"
                                >
                                    <div class="py-4 px-4">
                                        <div class="flex items-center">
                                            <h3
                                                class="relative inline-block text-2xl font-bold leading-none"
                                            >
                                                Personnel
                                            </h3>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="flex rounded-xl border-2 border-blue-600 bg-white shadow"
                                >
                                    <div class="py-4 px-6">
                                        <div class="flex items-center">
                                            <h3
                                                class="relative inline-block text-2xl font-bold leading-none"
                                            >
                                                Famille
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="rounded-xl border-2 border-blue-600 bg-white shadow flex"
                                >
                                    <div class="py-4 px-6">
                                        <div class="flex items-center">
                                            <h3
                                                class="relative inline-block text-2xl font-bold leading-none"
                                            >
                                                Entreprise
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="relative text-secondary lg:ml-10 lg:w-1/2 lg:block"
                        v-animate="'backInRight'"
                    >
                        <div
                            class="border-b-8 border-b-blue-600 max-w-lg mx-auto mb-1"
                        >
                            <img
                                class="w-full h-full object-contain"
                                src="/assets/images/md.png"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!--  home care -->

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
                    <div class="w-full px-6 lg:px-8" v-animate="'slideInRight'">
                        <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                            <div class="text-center">
                                <h1
                                    class="text-4xl font-bold tracking-tight text-white sm:text-6xl pt-32 md:pt-40"
                                >
                                    Prenez soin de votre santé dans le confort
                                    de votre foyer
                                </h1>
                                <p
                                    class="mt-6 text-sm text-start text-gray-300"
                                >
                                    Nganda Home Care est un service de soins de
                                    santé à domicile qui offre une prise en
                                    charge médicale et paramédicale de qualité
                                    aux patients de tous âges. Notre équipe
                                    d'infirmiers, d'aides-soignants et de
                                    professionnels de santé qualifiés est à
                                    votre disposition pour vous prodiguer les
                                    soins dont vous avez besoin, dans le confort
                                    et la sécurité de votre domicile.
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
                                        <span aria-hidden="true">→</span></a
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

        <!-- Hero section
    <section v-animate="'zoomIn'">
      <div class="">
        <div class="mx-auto max-w-screen-xl md:px-3 lg:px-0 mb-5 p-2 lg:p-0">
          <div
            class="lg:min-h-[520px] md:min-h-[500px] h-full gap-y-10 items-center bg-primary shadow-sm rounded-xl px-5 md:px-16 grid grid-cols-1 lg:grid-cols-2"
          >
            <div class="w-full">
              <div class="mt-10">
                <p class="mb-4">Votre santé, Notre prioripriorité</p>
                <h1
                  class="font-[900] text-3xl text-secondary lg:text-6xl lg:leading-snug"
                >
                  Notre expertise médicale à votre service.
                </h1>

                <div class="mt-8 space-y-5 text-lg text-gray-600 lg:pr-8">
                  L'équipe du Centre Hospitalier Nganda s'engage à vous offrir
                  les meilleurs soins de santé à Kinshasa.
                </div>
              </div>

              <div class="mt-8 w-full rounded-md bg-transparent lg:max-w-md">
                <form class="flex flex-col sm:flex-row">
                  <button
                    type="button"
                    class="m-1 h-12 transform rounded-md bg-secondary px-4 py-2 text-white transition-colors duration-200 focus:bg-secondary focus:outline-none hover:bg-secondary"
                  >
                    Contactez-nous
                  </button>
                </form>
              </div>
            </div>

            <div
              class="h-full w-full items-center justify-center mb-10 lg:mb-0 flex py-10"
            >
              <img
                class="rounded-custom w-full h-full object-cover"
                src="assets/images/BRU_9885.jpg"
                alt=""
              />
            </div>
          </div>
        </div>
      </div>
    </section> -->

        <!-- <section v-animate="'backInUp'">
      <div class="bg-white">
        <div class="mx-auto max-w-screen-xl px-2 py-2 sm:px- sm:py-3 lg:px-0">
          <div
            class="relative isolate overflow-hidden bg-secondary px-6 py-12 text-center shadow-2xl rounded-custom sm:px-16"
          >
            <h2
              class="mx-auto max-w-2xl text-3xl font-bold tracking-tight text-white sm:text-5xl"
            >
              Prendre Rendez-vous en Ligne
            </h2>
            <p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-gray-200">
              Pour vous faciliter la vie, le Centre Hospitalier Nganda vous
              propose de prendre rendez-vous en ligne.
            </p>
            <p class="mx-auto mt-2 max-w-xl text-sm leading-8 text-gray-300">
              Planifiez votre consultation en quelques clics, rapidement et
              simplement.
            </p>
            <div class="mt-5 flex items-center justify-center gap-x-6">
              <a
                href="#"
                class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                >Avec un Spécialiste
              </a>
              <a href="#" class="text-sm font-semibold leading-6 text-white"
                >Avec un généraliste <span aria-hidden="true">→</span></a
              >
            </div>
            <svg
              viewBox="0 0 1024 1024"
              class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2 [mask-image:radial-gradient(closest-side,white,transparent)]"
              aria-hidden="true"
            >
              <circle
                cx="512"
                cy="512"
                r="512"
                fill="url(#827591b1-ce8c-4110-b064-7cb85a0b1217)"
                fill-opacity="0.7"
              />
              <defs>
                <radialGradient id="827591b1-ce8c-4110-b064-7cb85a0b1217">
                  <stop stop-color="#7775D6" />
                  <stop offset="1" stop-color="#E935C1" />
                </radialGradient>
              </defs>
            </svg>
          </div>
        </div>
      </div>
    </section> -->

        <!--  nos  services  -->

        <section>
            <div class="relative bg-white py-16 px-3">
                <div
                    class="absolute inset-x-0 top-0 hidden h-1/2 lg:block"
                    aria-hidden="true"
                ></div>
                <div
                    class="mx-auto max-w-screen-xl rounded-custom bg-secondary lg:bg-transparent lg:px-0"
                >
                    <div class="lg:grid lg:grid-cols-12">
                        <div
                            class="relative z-10 lg:col-span-4 lg:col-start-1 lg:row-start-1 lg:bg-transparent py-10 lg:py-36"
                        >
                            <div
                                class="absolute inset-x-0 h-1/2 bg-gray-50 hidden"
                                aria-hidden="true"
                            ></div>
                            <div
                                v-animate="'zoomInRight'"
                                class="mx-auto max-w-md px-6 sm:max-w-3xl lg:max-w-none lg:p-0"
                            >
                                <div
                                    class="aspect-h-6 aspect-w-10 sm:aspect-h-1 sm:aspect-w-2 lg:aspect-w-1"
                                >
                                    <img
                                        class="rounded-3xl object-cover object-center shadow-2xl"
                                        src="/assets/images/radio.png"
                                        alt=""
                                    />
                                </div>
                            </div>
                        </div>

                        <div
                            class="relative bg-secondary lg:col-span-10 lg:col-start-3 lg:row-start-1 lg:grid lg:grid-cols-10 lg:items-center lg:rounded-3xl"
                        >
                            <div
                                class="absolute inset-0 hidden overflow-hidden rounded-3xl lg:block"
                                aria-hidden="true"
                            >
                                <svg
                                    class="absolute bottom-full left-full -translate-x-2/3 translate-y-1/3 transform xl:bottom-auto xl:top-0 xl:translate-y-0"
                                    width="404"
                                    height="384"
                                    fill="none"
                                    viewBox="0 0 404 384"
                                    aria-hidden="true"
                                >
                                    <defs>
                                        <pattern
                                            id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d"
                                            x="0"
                                            y="0"
                                            width="20"
                                            height="20"
                                            patternUnits="userSpaceOnUse"
                                        >
                                            <rect
                                                x="0"
                                                y="0"
                                                width="4"
                                                height="4"
                                                class="text-indigo-500"
                                                fill="currentColor"
                                            />
                                        </pattern>
                                    </defs>
                                    <rect
                                        width="404"
                                        height="384"
                                        fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"
                                    />
                                </svg>
                                <svg
                                    class="absolute top-full -translate-x-1/3 -translate-y-1/3 transform xl:-translate-y-1/2"
                                    width="404"
                                    height="384"
                                    fill="none"
                                    viewBox="0 0 404 384"
                                    aria-hidden="true"
                                >
                                    <defs>
                                        <pattern
                                            id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d"
                                            x="0"
                                            y="0"
                                            width="20"
                                            height="20"
                                            patternUnits="userSpaceOnUse"
                                        >
                                            <rect
                                                x="0"
                                                y="0"
                                                width="4"
                                                height="4"
                                                class="text-indigo-500"
                                                fill="currentColor"
                                            />
                                        </pattern>
                                    </defs>
                                    <rect
                                        width="404"
                                        height="384"
                                        fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"
                                    />
                                </svg>
                            </div>
                            <div
                                v-animate="'zoomInLeft'"
                                class="relative mx-auto max-w-md space-y-6 px-6 py-12 sm:max-w-3xl sm:py-16 lg:col-span-6 lg:col-start-4 lg:max-w-none lg:p-0"
                            >
                                <h2
                                    class="text-3xl font-bold tracking-tight text-white"
                                    id="join-heading"
                                >
                                    Excellence en Radiothérapie à Kinshasa
                                </h2>
                                <p class="text-lg text-white">
                                    Découvrez le meilleur centre de
                                    radiothérapie de Kinshasa au Centre
                                    Hospitalier Nganda. Avec notre technologie
                                    de pointe et notre équipe dévouée, nous vous
                                    offrons des soins exceptionnels pour votre
                                    bien-être et votre santé. Faites-nous
                                    confiance pour un traitement efficace et
                                    personnalisé, où chaque étape est pensée
                                    pour vous assurer confort et guérison
                                    optimale.
                                </p>
                                <a
                                    class="block w-full rounded-md border border-transparent bg-primary px-5 py-3 text-center text-base font-medium text-indigo-700 shadow-md hover:bg-gray-50 sm:inline-block sm:w-auto"
                                    href="#"
                                    >Contactez-nous</a
                                >
                            </div>
                        </div>
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

        <section>
            <div
                v-animate="'zoomIn'"
                class="relative mx-auto px-4 pt-16 sm:max-w-xl md:max-w-full md:px-5 lg:py-32 xl:px-10"
            >
                <div class="mx-auto max-w-xl lg:max-w-screen-xl">
                    <div
                        class="mb-16 text-center lg:mb-0 lg:max-w-lg lg:text-left"
                    >
                        <div class="mb-6 max-w-xl">
                            <div>
                                <p
                                    class="bg-teal-accent-400 mb-4 rounded-full bg-blue-200 px-3 py-1 flex justify-center items-center text-sm font-semibold tracking-wider text-blue-900"
                                >
                                    Nganda Home Care Service de Soins à Domicile
                                    à Kinshasa
                                </p>
                            </div>
                            <h2
                                class="mb-6 max-w-lg font-sans text-3xl font-bold tracking-tight text-slate-700 sm:text-5xl sm:leading-snug"
                            >
                                Prenez soin de vos proches dans le confort
                                <br />

                                <span class="inline-block text-blue-500"
                                    >de leur foyer</span
                                >
                            </h2>
                            <p class="text-base text-gray-700 md:text-lg">
                                Vous cherchez un service de soins à domicile
                                fiable et professionnel à Kinshasa ? Ne cherchez
                                pas plus loin que NGANDA HOME CARE. Nous offrons
                                une large gamme de services de soins à domicile
                                pour répondre aux besoins de vos proches, leur
                                permettant ainsi de vivre en toute sécurité et
                                confortablement dans leur propre maison.
                            </p>
                        </div>
                        <div
                            class="flex flex-col items-center justify-center space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2 lg:justify-start"
                        >
                            <a
                                href="/"
                                class="inline-flex h-12 w-full items-center justify-center rounded-full bg-secondary px-6 font-medium tracking-wide text-white shadow-md outline-none transition duration-200 hover:bg-secondary focus:ring sm:w-auto"
                            >
                                Contactez-vous
                            </a>
                            <a
                                href="/"
                                class="inline-flex h-12 w-full items-center justify-center rounded-full border-2 border-secondary bg-500 px-4 font-semibold text-secondary shadow-md outline-600 transition-colors duration-200 hover:border-y-secondary- hover:text-secondary sm:w-auto"
                            >
                                Appeler Maintenant
                            </a>
                        </div>
                    </div>
                    <div
                        class="h-full justify-center overflow-hidden lg:absolute lg:bottom-0 lg:right-0 lg:flex lg:w-1/2 lg:items-end lg:justify-start"
                    >
                        <svg
                            class="h-full w-full"
                            viewBox="0 0 200 200"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <defs>
                                <pattern
                                    id="img1"
                                    x="0"
                                    y="0"
                                    width="1"
                                    height="1"
                                >
                                    <image
                                        x="0"
                                        y="0"
                                        width="100%"
                                        height="100%"
                                        preserveAspectRatio="xMaxYMax slice"
                                        href="/assets/images/BRU_0013.jpg"
                                    />
                                </pattern>
                            </defs>

                            <path
                                fill="url(#img1)"
                                d="M40,-62.6C52.2,-54.5,62.5,-43.9,66.9,-31.4C71.3,-18.9,69.6,-4.6,65.9,8.3C62.2,21.1,56.4,32.5,49.2,45.2C42.1,57.9,33.7,72.1,22.2,75.3C10.7,78.5,-3.9,70.7,-14.8,62.1C-25.7,53.5,-32.8,44.1,-44.9,35.8C-57,27.5,-74,20.3,-82.1,7.7C-90.3,-4.8,-89.5,-22.7,-80.8,-34.8C-72,-46.9,-55.2,-53.3,-40.4,-60.2C-25.6,-67,-12.8,-74.3,0.6,-75.2C13.9,-76.1,27.9,-70.6,40,-62.6Z"
                                transform="translate(100 100)"
                            />
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <section v-animate="'zoomIn'">
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
                    <a class="group" href="#">
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
                    </a>
                    <!-- End Card -->

                    <!-- Card -->
                    <a class="group" href="#">
                        <div
                            class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden"
                        >
                            <img
                                class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl"
                                src="https://images.unsplash.com/photo-1542125387-c71274d94f0a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                                alt="Image Description"
                            />
                        </div>

                        <div class="mt-7">
                            <h3
                                class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white"
                            >
                                Onsite
                            </h3>
                            <p class="mt-3 text-gray-800 dark:text-neutral-200">
                                Optimize your in-person experience with
                                best-in-class capabilities like badge printing
                                and lead retrieval
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
                    </a>
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
