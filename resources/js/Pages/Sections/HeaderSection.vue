<script  setup>
</script>
<template>
  <div class="scroll">
    <section class="w-full flex sec bg-[#ad808c]">
      <div class="md:pt-52 md:px-10 pl-3 text-white">
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
            Le Centre Hospitalier Nganda est un établissement médical privé de
            Kinshasa, en République Démocratique du Congo, reconnu pour son
            expertise dans le diagnostic et le traitement du cancer. Depuis plus
            de 30 ans, nous mettons tout en œuvre pour offrir à nos patients une
            prise en charge médicale de qualité, humaine et personnalisée.
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
        <img src="/assets/images/cancer.jpg" class="curve2" alt="" />
      </div>
    </section>
  </div>
</template>


<style scoped>
.scroll {
  height: 100vh;
  overflow-y: scroll;
  scroll-snap-type: y mandatory;
}

.sec {
  height: 100vh;
  scroll-snap-align: center;
}
</style>
